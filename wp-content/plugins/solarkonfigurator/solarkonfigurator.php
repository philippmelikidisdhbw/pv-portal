<?php
/*
Plugin Name: Solarkonfigurator Plugin
Description: Ein Plugin eines Solarkonfigurators (mit Datenbankanbindung zur Tabelle wp_assistentendb) inkl. PDF-Download, E-Mail-Bericht und Google Maps Auswahl.
Version: 1.2-mod7
Author: Fabian Koch und Benedikt Schmuker
*/

/* ------------------------------------------------------------------------
   1) Plugin-Aktivierung: Tabelle wp_assistentendb erstellen
------------------------------------------------------------------------ */

function solarkonfigurator_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'assistentendb';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
      KundenName VARCHAR(255) NOT NULL,
      Mail VARCHAR(255) NOT NULL,
      Telefonnummer VARCHAR(255) NOT NULL,
      Adresse TEXT NOT NULL,
      Dachtyp VARCHAR(100) NOT NULL,
      Dachneigung INT NOT NULL,
      Stromverbrauch FLOAT NOT NULL,
      Personen INT NOT NULL,
      SpeicherGroesse FLOAT NOT NULL,
      WallboxTyp VARCHAR(100) NOT NULL,
      FoerderungHoehe FLOAT NOT NULL,
      Modultyp VARCHAR(100) NOT NULL,
      Gesamtpreis FLOAT NOT NULL,
      Datenschutz VARCHAR(1) NOT NULL,
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
      PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'solarkonfigurator_install');

/* ------------------------------------------------------------------------
   2) Plugin-Deaktivierung: Tabelle ggf. löschen (optional)
------------------------------------------------------------------------ */

function solarkonfigurator_uninstall() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'assistentendb';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook(__FILE__, 'solarkonfigurator_uninstall');

/* ------------------------------------------------------------------------
   3) Einbindung des Stylesheets design.css
------------------------------------------------------------------------ */

function solarkonfigurator_enqueue_styles() {
    wp_enqueue_style('solarkonfigurator-style', plugin_dir_url(__FILE__) . 'design.css');
}
add_action('wp_enqueue_scripts', 'solarkonfigurator_enqueue_styles');

/* ------------------------------------------------------------------------
   4) Einbindung von FPDF und PDF-Funktionalitäten
------------------------------------------------------------------------ */

if ( ! class_exists('FPDF') ) {
    require_once plugin_dir_path(__FILE__) . 'fpdf/fpdf.php';
}

function pdf_conv($text) {
    return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $text);
}

class PDF extends FPDF {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10, pdf_conv("Solar Solutions | Musterstraße 10, Berlin, 12345 | Tel: +49 123 4567890 | E-Mail: info@solar-solutions.de"), 0, 0, 'C');
    }
}

function solarkonfigurator_generate_pdf($data) {
    global $euro;
    $pdf = new PDF('P','mm','A4');
    $pdf->AddPage();

    $euro = pdf_conv(" €");
    $fontName = 'Arial';
    $pdf->SetFont($fontName, '', 11);

    // --- Seite 1: Titel-Layout ---
    $logoPath = 'https://solarsolutionsgmbh.com/wp-content/uploads/2025/01/logo.png';
    if ($logoPath) {
        $pdf->Image($logoPath, 140, 10, 50);
    }
    $pdf->SetFillColor(40,167,69);
    $pdf->Rect(0,35,210,120,'F');

    $txt = "Kostenkalkulation";
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFont($fontName, 'B', 26);
    $pdf->SetXY(10,50);
    $pdf->Cell(0,10, pdf_conv($txt), 0, 1);

    $txt = "Photovoltaikanlage";
    $pdf->SetFont($fontName, '', 16);
    $pdf->SetX(10);
    $pdf->Cell(0,8, pdf_conv($txt), 0, 1);

    $pdf->SetFont($fontName, 'B', 12);
    $pdf->SetXY(10,80);
    $pdf->Cell(0,6, pdf_conv("Solar Solutions"),0,1);
    $pdf->SetFont($fontName, '', 11);
    $pdf->SetX(10);
    $pdf->Cell(0,6, pdf_conv("Musterstraße 10"),0,1);
    $pdf->SetX(10);
    $pdf->Cell(0,6, pdf_conv("Berlin, 12345"),0,1);
    $pdf->SetXY(70,80);
    $pdf->Cell(0,6, pdf_conv("Telefon: +49 123 4567890"),0,1);
    $pdf->SetX(70);
    $pdf->Cell(0,6, pdf_conv("E-Mail: info@solar-solutions.de"),0,1);

    $pdf->SetTextColor(40,167,69);
    $pdf->SetFont($fontName, 'I', 14);
    $pdf->SetXY(10,140);
    $pdf->Cell(0,10, pdf_conv("WEIL DIE ZUKUNFT SONNIG IST"),0,1);

    // --- Seite 2: Kundenangaben ---
    $pdf->AddPage();
    $pdf->SetFont($fontName, 'B', 18);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0,10, pdf_conv("Kundenangaben"),0,1);
    $pdf->SetFont($fontName, '', 11);
    $pdf->Cell(40,7, pdf_conv("Datum:"),0,0);
    $pdf->Cell(0,7, pdf_conv(date("d.m.Y")),0,1);
    $pdf->Cell(40,7, pdf_conv("Name:"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['vornameNachname']),0,1);
    $pdf->Ln(4);
    $pdf->SetFont($fontName, 'B', 12);
    $pdf->Cell(0,7, pdf_conv("Kontaktdaten:"),0,1);
    $pdf->SetFont($fontName, '', 11);
    $pdf->Cell(40,7, pdf_conv("Telefon:"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['telefonnummer']),0,1);
    $pdf->Cell(40,7, pdf_conv("E-Mail:"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['email']),0,1);
    $pdf->Cell(40,7, pdf_conv("Adresse:"),0,0);
    $pdf->MultiCell(0,8, pdf_conv($data['adresse']));
    $pdf->Ln(4);

    $pdf->SetFont($fontName, 'B', 12);
    $pdf->Cell(0,7, pdf_conv("Haushalts- & Energieverbrauch:"),0,1);
    $pdf->SetFont($fontName, '', 11);
    $pdf->Cell(40,7, pdf_conv("Haushaltsgröße:"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['personen']),0,1);
    $pdf->Cell(40,7, pdf_conv("Energieverbrauch:"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['stromverbrauch'] . " kWh"),0,1);
    $pdf->Ln(4);

    $pdf->SetFont($fontName, 'B', 12);
    $pdf->Cell(0,7, pdf_conv("Ladeinfrastruktur:"),0,1);
    $pdf->SetFont($fontName, '', 11);
    $ladeinfrastruktur = ($data['wallboxCheckbox'] === '1' ? "Ja" : "Nein");
    $pdf->Cell(40,7, pdf_conv("Für E-Auto:"),0,0);
    $pdf->Cell(0,7, pdf_conv($ladeinfrastruktur),0,1);
    $preisWallbox = "-";
    if($data['wallboxCheckbox'] === '1'){
        if($data['wallboxTyp'] === 'Standard-Wallbox'){
            $preisWallbox = "1500" . $euro;
        } elseif($data['wallboxTyp'] === 'Bidirektionale Wallbox'){
            $preisWallbox = "3500" . $euro;
        }
    }
    $pdf->Cell(40,7, pdf_conv("Wallbox Preis:"),0,0);
    $pdf->Cell(0,7, pdf_conv($preisWallbox),0,1);

    // --- Seite 3: Produktinformation ---
    $modulanzahl = "-";
    $preisModule = "-";
    if($data['dachflaeche'] >= 15){
        if($data['modultyp'] == "Basismodul"){
            $modulFlaeche = 1.925;
            $wpProModul = 400.0;
        } elseif($data['modultyp'] == "Premium-Modul"){
            $modulFlaeche = 2.225;
            $wpProModul = 500.0;
        } elseif($data['modultyp'] == "All-Inclusive-Modul"){
            $modulFlaeche = 2.425;
            $wpProModul = 600.0;
        }
        $modulanzahl = floor($data['dachflaeche'] / $modulFlaeche);
        if($modulanzahl >= 6 && $modulanzahl <= 8){
            $preisProWp = 1.80;
        } elseif($modulanzahl >= 9 && $modulanzahl <= 12){
            $preisProWp = 1.60;
        } elseif($modulanzahl >= 13 && $modulanzahl <= 15){
            $preisProWp = 1.50;
        } elseif($modulanzahl >= 16 && $modulanzahl <= 20){
            $preisProWp = 1.35;
        } elseif($modulanzahl >= 21 && $modulanzahl <= 30){
            $preisProWp = 1.25;
        } elseif($modulanzahl >= 31 && $modulanzahl <= 40){
            $preisProWp = 1.20;
        } elseif($modulanzahl >= 41){
            $preisProWp = 1.15;
        }
        $preisModule = round($preisProWp * $modulanzahl * $wpProModul,2);
    }
    $pdf->AddPage();
    $pdf->SetFont($fontName, 'B', 18);
    $pdf->Cell(0,10, pdf_conv("Produktinformation"),0,1);
    $pdf->Ln(4);
    $pdf->SetFont($fontName, '', 11);
    $pdf->Cell(50,7, pdf_conv("Modultyp:"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['modultyp']),0,1);
    $pdf->Cell(50,7, pdf_conv("Modulanzahl:"),0,0);
    $pdf->Cell(0,7, pdf_conv($modulanzahl),0,1);
    $pdf->Cell(50,7, pdf_conv("Preis (Modultyp):"),0,0);
    $pdf->Cell(0,7, (is_numeric($preisModule) ? pdf_conv($preisModule.$euro) : pdf_conv($preisModule)),0,1);
    $pdf->Ln(4);
    
    // --- Seite 3 (Fortsetzung): Produkt- & Kosteninformationen ---
    $preisDach = 0;
    if($data['dachtyp'] == "Flachdach") { $preisDach = 1000; }
    elseif($data['dachtyp'] == "Satteldach") { $preisDach = 1500; }
    elseif($data['dachtyp'] == "Pultdach") { $preisDach = 1200; }
    
    $preisDachflaeche = (is_numeric($data['dachflaeche']) ? round($data['dachflaeche'] * 30,2) : 0);
    $preisSpeicher = 0;
    if($data['speicherCheckbox'] == "1"){
        $preisSpeicher = round($data['speicherGroesse'] * 475, 2);
    }
    $preisLade = 0;
    if($data['wallboxCheckbox'] == "1"){
        if($data['wallboxTyp'] == "Standard-Wallbox"){
            $preisLade = 1500;
        } elseif($data['wallboxTyp'] == "Bidirektionale Wallbox"){
            $preisLade = 3500;
        }
    }
    $preisFoerderung = (is_numeric($data['foerderungHoehe']) && $data['foerderungHoehe'] > 0) ? $data['foerderungHoehe'] : 0;
    
    $total = $preisModule + $preisDach + $preisDachflaeche + $preisSpeicher + $preisLade;
    $gesamtpreis = round($total - $preisFoerderung, 2);
    
    $rabattPreis = round($gesamtpreis * 0.98,2);
    
    $pdf->SetFont($fontName, 'B', 18);
    $pdf->Cell(0,10, pdf_conv("Produkt- & Kosteninformationen"),0,1);
    $pdf->Ln(4);
    $pdf->SetFont($fontName, '', 11);
    $pdf->Cell(60,7, pdf_conv("Dachtyp:"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['dachtyp']),0,1);
    $pdf->Cell(60,7, pdf_conv("Preis Dachtyp:"),0,0);
    $pdf->Cell(0,7, pdf_conv($preisDach.$euro),0,1);
    $pdf->Cell(60,7, pdf_conv("Dachfläche (m²):"),0,0);
    $pdf->Cell(0,7, pdf_conv($data['dachflaeche']),0,1);
    $pdf->Cell(60,7, pdf_conv("Preis Dachfläche:"),0,0);
    $pdf->Cell(0,7, pdf_conv($preisDachflaeche.$euro),0,1);
    $pdf->Cell(60,7, pdf_conv("Speicher:"),0,0);
    $pdf->Cell(0,7, pdf_conv($preisSpeicher.$euro),0,1);
    $pdf->Cell(60,7, pdf_conv("Ladeinfrastruktur:"),0,0);
    $pdf->Cell(0,7, pdf_conv($preisLade.$euro),0,1);
    $pdf->Cell(60,7, pdf_conv("Förderung:"),0,0);
    $pdf->Cell(0,7, pdf_conv($preisFoerderung ? $preisFoerderung.$euro : "Keine Förderung"),0,1);
    $pdf->Ln(4);
    $pdf->SetFont($fontName, 'B', 12);
    $pdf->Cell(80,10, pdf_conv("Voraussichtliche Kosten:"),0,0);
    $pdf->Cell(0,10, pdf_conv($gesamtpreis.$euro),0,1);
    $pdf->Cell(80,10, pdf_conv("Nach Abzug 2% Rabatt:"),0,0);
    $pdf->Cell(0,10, pdf_conv($rabattPreis.$euro),0,1);
    
    $pdf->Output('D','Kostenkalkulation_Solar.pdf');
}

/* ------------------------------------------------------------------------
   5) Shortcode definieren: [solarkonfigurator]
------------------------------------------------------------------------*/

function solarkonfigurator_shortcode() {
    // Formularfelder definieren
    $felder = array(
        'formularSeite',
        'vornameNachname',
        'email',
        'telefonnummer',
        'adresse',
        'dachtyp',
        'dachneigung',
        'dachflaeche',
        'stromverbrauch',
        'personen',
        'speicherCheckbox',
        'wallboxCheckbox',
        'foerderungCheckbox',
        'datenschutz',
        'speicherGroesse',
        'wallboxTyp',
        'foerderungHoehe',
        'modultyp',
        'gesamtpreis'
    );
    
    $data = array();
    foreach ($felder as $feld) {
        $data[$feld] = isset($_POST[$feld]) ? $_POST[$feld] : '';
    }
    
    $formularSeite = ($data['formularSeite'] !== '') ? (int)$data['formularSeite'] : 1;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['navigation'])) {
            if ($_POST['navigation'] == 'weiter') {
                $formularSeite++;
            } elseif ($_POST['navigation'] == 'zurueck') {
                $formularSeite--;
            }
        }
        if(isset($_POST['resetCalculator'])){
            foreach ($felder as $feld) {
                $data[$feld] = '';
            }
            $formularSeite = 1;
        }
        if(isset($_POST['redirect'])){
            header("Location: https://solarsolutionsgmbh.com");
            exit;
        }
        if(isset($_POST['requestOffer'])){
            echo '<script>alert("Ihre Anfrage wurde verschickt. Wir melden uns in Kürze!");</script>';
            $formularSeite = 8;
            $empfaenger = 'philipp.melikidis@gmail.com';
            $betreff = 'Neue Solar-Anfrage von ' . ($data['vornameNachname'] ? $data['vornameNachname'] : '-');
            $nachricht  = "<h3>Neue Anfrage über den Solarkonfigurator</h3>";
            $nachricht .= "<p><strong>Name:</strong> " . ($data['vornameNachname'] ? $data['vornameNachname'] : '-') . "</p>";
            $nachricht .= "<p><strong>E-Mail:</strong> " . ($data['email'] ? $data['email'] : '-') . "</p>";
            $nachricht .= "<p><strong>Telefon:</strong> " . ($data['telefonnummer'] ? $data['telefonnummer'] : '-') . "</p>";
            $nachricht .= "<p><strong>Adresse:</strong> " . ($data['adresse'] ? $data['adresse'] : '-') . "</p>";
            $nachricht .= "<p><strong>Dachtyp:</strong> " . ($data['dachtyp'] ? $data['dachtyp'] : '-') . "</p>";
            $nachricht .= "<p><strong>Dachneigung:</strong> " . ($data['dachneigung'] ? $data['dachneigung'] . "°" : '-') . "</p>";
            $nachricht .= "<p><strong>Dachfläche:</strong> " . ($data['dachflaeche'] ? $data['dachflaeche'] . " m²" : '-') . "</p>";
            $nachricht .= "<p><strong>Energieverbrauch:</strong> " . ($data['stromverbrauch'] ? $data['stromverbrauch'] . " kWh" : '-') . "</p>";
            $nachricht .= "<p><strong>Haushaltsgröße:</strong> " . ($data['personen'] ? $data['personen'] : '-') . " Personen</p>";
            $nachricht .= "<p><strong>Speicher:</strong> " . ($data['speicherCheckbox']==='1' ? "Ja, " . $data['speicherGroesse'] . " kWh" : "Nein") . "</p>";
            $nachricht .= "<p><strong>Wallbox:</strong> " . ($data['wallboxCheckbox']==='1' ? "Ja (" . $data['wallboxTyp'] . ")" : "Nein") . "</p>";
            $nachricht .= "<p><strong>Förderung:</strong> " . ($data['foerderungCheckbox']==='1' && $data['foerderungHoehe'] > 0 ? $data['foerderungHoehe'] . " €" : "Keine Förderung") . "</p>";
            $nachricht .= "<p><strong>Modultyp:</strong> " . ($data['modultyp'] ? $data['modultyp'] : '-') . "</p>";
            if($data['dachflaeche'] >= 15){
                if($data['modultyp'] == "Basismodul"){
                    $modulFlaeche = 1.925;
                } elseif($data['modultyp'] == "Premium-Modul"){
                    $modulFlaeche = 2.225;
                } elseif($data['modultyp'] == "All-Inclusive-Modul"){
                    $modulFlaeche = 2.425;
                }
                $modulanzahl = floor($data['dachflaeche'] / $modulFlaeche);
            } else {
                $modulanzahl = "-";
            }
            $nachricht .= "<p><strong>Modulanzahl:</strong> " . $modulanzahl . "</p>";
            $nachricht .= "<p><strong>Voraussichtliche Kosten:</strong> " . ($data['gesamtpreis'] ? $data['gesamtpreis'] . " €" : '-') . "</p>";
            $nachricht .= "<br><p>Bitte bald mit dem Kunden Kontakt aufnehmen!</p>";
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail($empfaenger, $betreff, $nachricht, $headers);
        }
        if(isset($_POST['downloadPdf'])){
            $pdfdata = array(
                'vornameNachname'    => isset($data['vornameNachname']) ? $data['vornameNachname'] : '',
                'email'              => isset($data['email']) ? $data['email'] : '',
                'telefonnummer'      => isset($data['telefonnummer']) ? $data['telefonnummer'] : '',
                'adresse'            => isset($data['adresse']) ? $data['adresse'] : '',
                'dachtyp'            => isset($data['dachtyp']) ? $data['dachtyp'] : '',
                'dachneigung'        => ($data['dachneigung'] !== '') ? (int)$data['dachneigung'] : 45,
                'dachflaeche'        => ($data['dachflaeche'] !== '') ? floatval($data['dachflaeche']) : 0,
                'stromverbrauch'     => ($data['stromverbrauch'] !== '') ? floatval($data['stromverbrauch']) : 0,
                'personen'           => ($data['personen'] !== '') ? (int)$data['personen'] : 0,
                'speicherCheckbox'   => isset($data['speicherCheckbox']) ? $data['speicherCheckbox'] : '0',
                'wallboxCheckbox'    => isset($data['wallboxCheckbox']) ? $data['wallboxCheckbox'] : '0',
                'foerderungCheckbox' => isset($data['foerderungCheckbox']) ? $data['foerderungCheckbox'] : '0',
                'speicherGroesse'    => ($data['speicherGroesse'] !== '') ? floatval($data['speicherGroesse']) : 0,
                'wallboxTyp'         => isset($data['wallboxTyp']) ? $data['wallboxTyp'] : 'Keine Wallbox',
                'foerderungHoehe'    => ($data['foerderungHoehe'] !== '') ? floatval($data['foerderungHoehe']) : 0,
                'modultyp'           => isset($data['modultyp']) ? $data['modultyp'] : '',
                'gesamtpreis'        => ($data['gesamtpreis'] !== '') ? floatval($data['gesamtpreis']) : 0,
                'datenschutz'        => isset($data['datenschutz']) ? $data['datenschutz'] : '0'
            );
            solarkonfigurator_generate_pdf($pdfdata);
            exit;
        }
        if(isset($_POST['sendEmail']) && $_POST['sendEmail'] == "An E-Mail senden") {
            if($data['dachflaeche'] >= 15){
                if($data['modultyp'] == "Basismodul"){
                    $modulFlaeche = 1.925;
                    $wpProModul = 400.0;
                } elseif($data['modultyp'] == "Premium-Modul"){
                    $modulFlaeche = 2.225;
                    $wpProModul = 500.0;
                } elseif($data['modultyp'] == "All-Inclusive-Modul"){
                    $modulFlaeche = 2.425;
                    $wpProModul = 600.0;
                }
                $modulanzahl = floor($data['dachflaeche'] / $modulFlaeche);
                if($modulanzahl >= 6 && $modulanzahl <= 8){
                    $preisProWp = 1.80;
                } elseif($modulanzahl >= 9 && $modulanzahl <= 12){
                    $preisProWp = 1.60;
                } elseif($modulanzahl >= 13 && $modulanzahl <= 15){
                    $preisProWp = 1.50;
                } elseif($modulanzahl >= 16 && $modulanzahl <= 20){
                    $preisProWp = 1.35;
                } elseif($modulanzahl >= 21 && $modulanzahl <= 30){
                    $preisProWp = 1.25;
                } elseif($modulanzahl >= 31 && $modulanzahl <= 40){
                    $preisProWp = 1.20;
                } elseif($modulanzahl >= 41){
                    $preisProWp = 1.15;
                }
                $preisModule = round($preisProWp * $modulanzahl * $wpProModul,2);
            } else {
                $modulanzahl = 0;
                $preisModule = 0;
            }
            $foerderung = (is_numeric($data['foerderungHoehe']) && $data['foerderungHoehe'] > 0) ? $data['foerderungHoehe'] : 0;
            $preisWallbox = 0;
            if($data['wallboxCheckbox'] === '1'){
                if($data['wallboxTyp'] === 'Standard-Wallbox'){
                    $preisWallbox = 1500;
                } elseif($data['wallboxTyp'] === 'Bidirektionale Wallbox'){
                    $preisWallbox = 3500;
                }
            }
            $preisSpeicher = 0;
            if($data['speicherCheckbox'] === '1'){
                $preisSpeicher = round($data['speicherGroesse'] * 475,2);
            }
            $gesamtpreis = round($preisModule + $preisSpeicher + $preisWallbox - $foerderung,2);
    
            $to = $data['email'];
            $subject = "Ihr unverbindlicher Bericht";
            $headers = array(
                'Content-Type: text/html; charset=UTF-8',
                'From: Solar Solutions <noreply@solarsolutionsgmbh.com>',
                'Reply-To: noreply@solarsolutionsgmbh.com'
            );
            $reportHtml = '<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Kostenkalkulation Photovoltaikanlage</title>
  <style>
    body { font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #333; }
    .container { width: 600px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; }
    h1 { text-align: left; color: #4CAF50; }
    h2 { text-align: left; border-bottom: 1px solid #ddd; padding-bottom: 5px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background: #f4f4f4; }
  </style>
</head>
<body>
  <div class="container">
    <div class="infotext">
      <p>Sehr geehrte/r ' . htmlspecialchars($data['vornameNachname']) . ',</p>
      <p>anbei erhalten Sie Ihren unverbindlichen Bericht zur Kostenkalkulation Ihrer Photovoltaikanlage. Alle Angaben wurden von Ihnen eingegeben und sind unverbindlich.</p>
    </div>
    
    <h2>Kundenangaben</h2>
    <table>
      <tr><th>Datum</th><td>' . date("d.m.Y") . '</td></tr>
      <tr><th>Name</th><td>' . htmlspecialchars($data['vornameNachname']) . '</td></tr>
      <tr><th>E-Mail</th><td>' . htmlspecialchars($data['email']) . '</td></tr>
      <tr><th>Telefon</th><td>' . htmlspecialchars($data['telefonnummer']) . '</td></tr>
      <tr><th>Adresse</th><td>' . htmlspecialchars($data['adresse']) . '</td></tr>
    </table>

    <h2>Haushalts- & Energieverbrauch</h2>
    <table>
      <tr><th>Haushaltsgröße</th><td>' . htmlspecialchars($data['personen']) . '</td></tr>
      <tr><th>Energieverbrauch</th><td>' . htmlspecialchars($data['stromverbrauch']) . ' kWh</td></tr>
    </table>
    
    <h2>Produktinformation (unverbindlich)</h2>
    <table>
      <tr><th>Dachtyp</th><td>' . htmlspecialchars($data['dachtyp']) . '</td></tr>
      <tr><th>Dachneigung</th><td>' . htmlspecialchars($data['dachneigung']) . '°</td></tr>
      <tr><th>Dachfläche</th><td>' . htmlspecialchars($data['dachflaeche']) . ' m²</td></tr>
      <tr><th>Speicher</th><td>' . ($data['speicherCheckbox'] === '1' ? "Ja, " . $data['speicherGroesse'] . " kWh" : "Nein") . '</td></tr>
      <tr><th>Wallbox</th><td>' . ($data['wallboxCheckbox'] === '1' ? "Ja (" . $data['wallboxTyp'] . ")" : "Nein") . '</td></tr>
      <tr><th>Förderung</th><td>' . ($data['foerderungCheckbox'] === '1' && $data['foerderungHoehe'] > 0 ? $data['foerderungHoehe'] . " €" : "Keine Förderung") . '</td></tr>
      <tr><th>Modultyp</th><td>' . htmlspecialchars($data['modultyp']) . '</td></tr>';
            if($data['dachflaeche'] >= 15){
                if($data['modultyp'] == "Basismodul"){
                    $modulFlaeche = 1.925;
                } elseif($data['modultyp'] == "Premium-Modul"){
                    $modulFlaeche = 2.225;
                } elseif($data['modultyp'] == "All-Inclusive-Modul"){
                    $modulFlaeche = 2.425;
                }
                $modulanzahl = floor($data['dachflaeche'] / $modulFlaeche);
            } else {
                $modulanzahl = "-";
            }
            $reportHtml .= '<tr><th>Modulanzahl</th><td>' . $modulanzahl . '</td></tr>
      <tr><th>Voraussichtliche Kosten</th><td>' . ($data['gesamtpreis'] ? $data['gesamtpreis'] . " €" : '-') . '</td></tr>
    </table>

    <p>Bitte beachten Sie, dass dieser Bericht unverbindlich ist und auf Grundlage Ihrer Eingaben erstellt wurde.</p>
    
    <div style="margin-top:30px; text-align:left;">
      <p>Mit freundlichen Grüßen,<br>Ihr Team von Solar Solutions GmbH</p>
    </div>

    <div style="border-top:1px solid #ddd; margin-top:20px; padding-top:10px; font-size:12px; color:#666; text-align:center;">
      <p>Solar Solutions GmbH | Musterstraße 10, 12345 Berlin | Tel: +49 123 4567890</p>
      <p>Diese Nachricht wurde von <strong>noreply@solarsolutionsgmbh.com</strong> versendet – bitte antworten Sie nicht darauf.</p>
    </div>
  </div>
</body>
</html>';
            wp_mail($to, $subject, $reportHtml, $headers);
            echo '<script>alert("Ihre E-Mail wurde erfolgreich versendet! Wir melden uns in Kürze.");</script>';
        }
    }
    
    $data['formularSeite'] = $formularSeite;
    
    // Zuweisung der Formularvariablen
    $vornameNachname    = isset($data['vornameNachname']) ? $data['vornameNachname'] : '';
    $email              = isset($data['email']) ? $data['email'] : '';
    // Ist noch kein Wert eingetragen, wird "+49" vorbefüllt:
    $telefonnummer      = isset($data['telefonnummer']) && $data['telefonnummer'] !== '' ? $data['telefonnummer'] : '+49';
    $adresse            = isset($data['adresse']) ? $data['adresse'] : '';
    $dachtyp            = isset($data['dachtyp']) ? $data['dachtyp'] : '';
    $dachneigung        = ($data['dachneigung'] !== '') ? (int)$data['dachneigung'] : 45;
    $dachflaeche        = isset($data['dachflaeche']) ? $data['dachflaeche'] : 0;
    $stromverbrauch     = isset($data['stromverbrauch']) ? $data['stromverbrauch'] : 0;
    $personen           = isset($data['personen']) ? $data['personen'] : 0;
    $speicherCheckbox   = isset($data['speicherCheckbox']) ? $data['speicherCheckbox'] : '0';
    $wallboxCheckbox    = isset($data['wallboxCheckbox']) ? $data['wallboxCheckbox'] : '0';
    $foerderungCheckbox = isset($data['foerderungCheckbox']) ? $data['foerderungCheckbox'] : '0';
    $datenschutz        = isset($data['datenschutz']) ? $data['datenschutz'] : '0';
    $speicherGroesse    = isset($data['speicherGroesse']) ? $data['speicherGroesse'] : 0;
    $wallboxTyp         = isset($data['wallboxTyp']) ? $data['wallboxTyp'] : '';
    $foerderungHoehe    = isset($data['foerderungHoehe']) ? $data['foerderungHoehe'] : 0;
    $modultyp           = isset($data['modultyp']) ? $data['modultyp'] : '';
    $gesamtpreis        = isset($data['gesamtpreis']) ? $data['gesamtpreis'] : 0;

    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Solarkonfigurator</title>
      <!-- Google Maps Extended Component Library -->
      <script type="module" src="https://ajax.googleapis.com/ajax/libs/@googlemaps/extended-component-library/0.6.11/index.min.js"></script>
      <script>
        /* Blink-Timer: Wenn der Nutzer inaktiv ist, wechselt der Dokumenttitel */
        let timeoutId;
        let blinkIntervalId;
        const originalTitle = document.title;
        const blinkTitle = "🔥 Kalkulieren Sie jetzt! 🔥";
      
        function resetTimer() {
          clearTimeout(timeoutId);
          clearInterval(blinkIntervalId);
          document.title = originalTitle;
          timeoutId = setTimeout(startBlinking, 300000);
        }
      
        function startBlinking() {
          let isOriginalTitle = true;
          blinkIntervalId = setInterval(() => {
            document.title = isOriginalTitle ? blinkTitle : originalTitle;
            isOriginalTitle = !isOriginalTitle;
          }, 1000);
        }
      
        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;
      
        document.addEventListener('visibilitychange', function() {
          if (document.visibilityState === 'visible') {
            resetTimer();
          }
        });
      
        // Google Maps Initialisierung inkl. Polygon-Zeichnung und Übernahme der ausgewählten Adresse
        let polygon;
        let googleMap;
        let polygonCoords = [];
        let markers = [];
      
        async function initMap() {
            await customElements.whenDefined('gmp-map');
            const mapElement = document.querySelector('gmp-map');
            const placePicker = document.querySelector('gmpx-place-picker');
          
            googleMap = mapElement.innerMap;
            googleMap.setOptions({
                disableDefaultUI: true,
                mapTypeControl: false,
                mapTypeId: 'hybrid'
            });
          
            placePicker.addEventListener('gmpx-placechange', () => {
                const place = placePicker.value;
                if(place && place.location){
                    googleMap.setCenter(place.location);
                    googleMap.setZoom(20);
                } else {
                    alert("Bitte wählen Sie eine gültige Adresse aus.");
                }
                if(place && place.formattedAddress){
                    const adresseInput = document.querySelector('input[name="adresse"]');
                    if(adresseInput){
                        adresseInput.value = place.formattedAddress;
                    }
                }
            });
          
            polygon = new google.maps.Polygon({
                paths: polygonCoords,
                strokeColor: "#4CAF50",
                strokeOpacity: 0.8,
                strokeWeight: 3,
                fillColor: "#4CAF50",
                fillOpacity: 0.35
            });
            polygon.setMap(googleMap);
          
            googleMap.addListener("click", function(event) {
                polygonCoords.push(event.latLng);
                polygon.setPaths(polygonCoords);
                const marker = new google.maps.Marker({
                    position: event.latLng,
                    map: googleMap
                });
                markers.push(marker);
                if (polygonCoords.length >= 3) {
                    const area = google.maps.geometry.spherical.computeArea(polygon.getPath());
                    document.getElementById('dachflaeche').value = area.toFixed(2);
                }
            });
          
            document.getElementById('resetPolygonButton').addEventListener('click', function(){
                polygonCoords = [];
                polygon.setPaths(polygonCoords);
                markers.forEach(m => m.setMap(null));
                markers = [];
                document.getElementById('dachflaeche').value = '';
            });
        }
        document.addEventListener('DOMContentLoaded', initMap);
      </script>
    </head>
    <body id="solarkonfigurator-body">
      <?php if($formularSeite == 1) : ?>
        <!-- Seite 1: Kontaktinformationen -->
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar1" style="width: 10%;"></div>
            <span class="progress-text">10%</span>
          </div>
          <h1>Kontaktinformationen</h1>
          <h2>Tragen Sie bitte Ihre Kontaktdaten ein, damit wir Ihnen den Bericht zusenden können.</h2>
          <div class="form-grid">
            <div class="form-group">
              <label for="vornameNachname">Vor- und Nachname*:</label>
              <input type="text" id="vornameNachname" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>" required>
            </div>
            <div class="form-group">
              <label for="email">E-Mail*:</label>
              <input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="telefonnummer">Telefonnummer:</label>
            <!-- Das Feld ist jetzt vom Typ tel und zeigt +49 vorbefüllt an, sofern noch kein Wert vorhanden ist -->
            <input type="tel" id="telefonnummer" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>" placeholder="+49">
          </div>
          <div class="form-grid">
            <label for="datenschutz">
              Ich stimme den <a href="./agb" target="_blank">AGB</a> und den 
              <a href="./datenschutz" target="_blank">Datenschutzbestimmungen</a> zu.*
            </label>
            <input type="checkbox" id="datenschutz" name="datenschutz" value="1" <?php echo ($datenschutz==='1') ? 'checked' : ''; ?> required>
          </div>
          <input type="hidden" name="formularSeite" value="1">
          <div class="button-container">
            <!-- Nur Vorwärtsschritt – kein Back-Button auf der ersten Seite -->
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter &rarr;</button>
          </div>
        </form>
      <?php elseif($formularSeite == 2) : ?>
        <!-- Seite 2: Adresse inkl. Google Maps Auswahl -->
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar2" style="width: 20%;"></div>
            <span class="progress-text">20%</span>
          </div>
          <h1>Adresse</h1>
          <h2>Geben Sie Ihre Adresse ein und markieren Sie per Klick die Dachfläche.</h2>
          <gmpx-api-loader key="AIzaSyDorSR66oY7OoW9Wod1crR5mFypW2VhaE8" solution-channel="GMP_GE_mapsandplacesautocomplete_v2"></gmpx-api-loader>
          <label>Adresse*:</label><br>
          <gmpx-place-picker id="adressePicker" placeholder="Geben Sie eine Adresse ein" required></gmpx-place-picker>
          <br><br>
          <label>Durch Klicken die Dachfläche markieren:</label><br>
          <gmp-map center="48.404568, 9.963099" zoom="20" id="map" style="height: 400px;"></gmp-map>
          <br>
          <button type="button" id="resetPolygonButton">Dachfläche zurücksetzen</button>
          <br><br>
          <label>Dachfläche (m²)*:</label><br>
          <input type="number" id="dachflaeche" name="dachflaeche" value="<?php echo esc_attr($dachflaeche); ?>" min="15" step="0.001" required>
          <br><br>
          <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse); ?>">
          <input type="hidden" name="formularSeite" value="2">
          <div class="button-container">
            <!-- Back-Button mit formnovalidate -->
            <button type="submit" name="navigation" value="zurueck" formnovalidate class="btn btn-back">&larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter &rarr;</button>
          </div>
          <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>">
          <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
          <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>">
          <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz); ?>">
        </form>
      <?php elseif($formularSeite == 3) : ?>
        <!-- Seite 3: Dachtyp und Neigung -->
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar3" style="width: 40%;"></div>
            <span class="progress-text">40%</span>
          </div>
          <h1>Dachtyp und Neigung</h1>
          <h2>Wählen Sie den Dachtyp und geben Sie die Dachneigung an.</h2>
          <label for="dachtyp">Dachtyp*:</label><br>
          <select id="dachtyp" name="dachtyp" required>
            <option value="Flachdach" <?php if($dachtyp=='Flachdach') echo 'selected'; ?>>Flachdach</option>
            <option value="Satteldach" <?php if($dachtyp=='Satteldach') echo 'selected'; ?>>Satteldach</option>
            <option value="Pultdach" <?php if($dachtyp=='Pultdach') echo 'selected'; ?>>Pultdach</option>
          </select>
          <br><br>
          <label for="dachneigung">Dachneigung*: <span id="dachneigungValue"><?php echo intval($dachneigung); ?>°</span></label><br>
          <input type="range" id="dachneigung" name="dachneigung" min="0" max="<?php echo ($dachtyp=='Flachdach' ? 15 : 90); ?>" value="<?php echo intval($dachneigung); ?>" step="1" oninput="document.getElementById('dachneigungValue').innerText = this.value + '°'" required>
          <br><br>
          <!-- JavaScript zur Anpassung des Dachneigungs-Sliders je nach Dachtyp -->
          <script>
            function updateDachneigungLimits() {
              const dachtypSelect = document.getElementById('dachtyp');
              const slider = document.getElementById('dachneigung');
              const sliderValue = document.getElementById('dachneigungValue');
              let min = 0, max = 90, defaultVal = 45;
              if(dachtypSelect.value === 'Flachdach') {
                min = 0; max = 15; defaultVal = 5;
              } else if(dachtypSelect.value === 'Satteldach') {
                min = 15; max = 45; defaultVal = 30;
              } else if(dachtypSelect.value === 'Pultdach') {
                min = 5; max = 25; defaultVal = 10;
              }
              slider.min = min;
              slider.max = max;
              // Falls der bisherige Wert außerhalb des neuen Bereichs liegt, wird defaultVal gesetzt
              if(parseInt(slider.value) < min || parseInt(slider.value) > max) {
                slider.value = defaultVal;
              }
              sliderValue.innerText = slider.value + '°';
            }
            document.getElementById('dachtyp').addEventListener('change', updateDachneigungLimits);
            // Beim Laden der Seite sofort Limits setzen
            document.addEventListener('DOMContentLoaded', updateDachneigungLimits);
          </script>
          <input type="hidden" name="formularSeite" value="3">
          <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" formnovalidate class="btn btn-back">&larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter &rarr;</button>
          </div>
          <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse); ?>">
          <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche); ?>">
          <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>">
          <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
          <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>">
          <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz); ?>">
        </form>
      <?php elseif($formularSeite == 4) : ?>
        <!-- Seite 4: Energieverbrauch -->
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar4" style="width: 60%;"></div>
            <span class="progress-text">60%</span>
          </div>
          <h1>Energieverbrauch</h1>
          <h2>Geben Sie Ihren Jahresverbrauch (in kWh) und die Haushaltsgröße an.</h2>
          <div class="form-grid">
            <div class="form-group">
              <label for="stromverbrauch">Jahresverbrauch (in kWh):</label><br>
              <input type="number" id="stromverbrauch" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch); ?>" min="0" step="1" placeholder="z.B. 3500">
            </div>
            <div class="form-group">
              <label for="personen">Haushaltsgröße (in Personen)*:</label><br>
              <input type="number" id="personen" name="personen" value="<?php echo esc_attr($personen); ?>" min="1" step="1" required>
            </div>
          </div>
          <input type="hidden" name="formularSeite" value="4">
          <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" formnovalidate class="btn btn-back">&larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter &rarr;</button>
          </div>
          <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse); ?>">
          <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche); ?>">
          <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp); ?>">
          <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung); ?>">
          <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>">
          <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
          <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>">
          <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz); ?>">
        </form>
      <?php elseif($formularSeite == 5) : ?>
        <!-- Seite 5: Extras -->
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar5" style="width: 70%;"></div>
            <span class="progress-text">70%</span>
          </div>
          <h1>Extras</h1>
          <h2>Wählen Sie zusätzliche Optionen, um Ihre Solaranlage zu erweitern.</h2>
          <label for="speicherCheckbox">
            Speicher hinzufügen?
            <span class="help-tooltip" title="Ein Stromspeicher speichert überschüssigen Solarstrom und erhöht Ihren Eigenverbrauch.">?</span>
          </label>
          <input type="checkbox" id="speicherCheckbox" name="speicherCheckbox" value="1" <?php echo ($speicherCheckbox==='1') ? 'checked' : ''; ?>>
          <br>
          <select id="speicherGroesse" name="speicherGroesse">
            <option value="8"  <?php if($speicherGroesse==8) echo 'selected'; ?>>8 kWh</option>
            <option value="10" <?php if($speicherGroesse==10) echo 'selected'; ?>>10 kWh</option>
            <option value="12" <?php if($speicherGroesse==12) echo 'selected'; ?>>12 kWh</option>
            <option value="14" <?php if($speicherGroesse==14) echo 'selected'; ?>>14 kWh</option>
            <option value="16" <?php if($speicherGroesse==16) echo 'selected'; ?>>16 kWh</option>
          </select>
          <br><br>
          <label for="wallboxCheckbox">
            Wallbox hinzufügen?
            <span class="help-tooltip" title="Mit einer Wallbox können Sie Ihr E-Auto direkt mit Solarstrom laden.">?</span>
          </label>
          <input type="checkbox" id="wallboxCheckbox" name="wallboxCheckbox" value="1" <?php echo ($wallboxCheckbox==='1') ? 'checked' : ''; ?>>
          <br>
          <select id="wallboxTyp" name="wallboxTyp">
            <option value="Standard-Wallbox" <?php if($wallboxTyp=='Standard-Wallbox') echo 'selected'; ?>>Standard-Wallbox</option>
            <option value="Bidirektionale Wallbox" <?php if($wallboxTyp=='Bidirektionale Wallbox') echo 'selected'; ?>>Bidirektionale Wallbox</option>
          </select>
          <br><br>
          <label for="foerderungCheckbox">
            Förderung nutzen?
            <span class="help-tooltip" title="Manche Regionen bieten finanzielle Zuschüsse.">?</span>
          </label>
          <input type="checkbox" id="foerderungCheckbox" name="foerderungCheckbox" value="1" <?php echo ($foerderungCheckbox==='1') ? 'checked' : ''; ?>>
          <br>
          <input type="number" id="foerderungHoehe" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe); ?>" min="0" max="5000" placeholder="Förderungsbetrag" step="0.01">
          <br><br>
          <input type="hidden" name="formularSeite" value="5">
          <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" formnovalidate class="btn btn-back">&larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter &rarr;</button>
          </div>
          <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse); ?>">
          <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche); ?>">
          <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp); ?>">
          <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung); ?>">
          <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch); ?>">
          <input type="hidden" name="personen" value="<?php echo esc_attr($personen); ?>">
          <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>">
          <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
          <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>">
          <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz); ?>">
        </form>
      <?php elseif ($formularSeite == 6) : ?>
        <!-- Seite 6: Modultyp wählen -->
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar6" style="width: 80%;"></div>
            <span class="progress-text">80%</span>
          </div>
          <h1>Modultyp wählen</h1>
          <h2>Wählen Sie das für Sie passende Modulpaket aus.</h2>
          <div class="module-cards">
            <label class="module-card basismodul">
              <span class="help-tooltip" title="Unsere 400-Wp-Basismodule sind preiswert.">?</span>
              <input type="radio" name="modultyp" value="Basismodul" required <?php if($modultyp=='Basismodul') echo 'checked'; ?>>
              <h3>Basismodul</h3>
              <ul>
                <li>400 Wp pro Modul</li>
                <li>Gutes Preis-Leistungs-Verhältnis</li>
                <li>Solide Technologie</li>
                <li><strong>Ab 2.000 €</strong></li>
              </ul>
            </label>
            <label class="module-card premiummodul">
              <span class="help-tooltip" title="Diese 500-Wp-Module haben höhere Effizienz.">?</span>
              <input type="radio" name="modultyp" value="Premium-Modul" <?php if($modultyp=='Premium-Modul') echo 'checked'; ?>>
              <h3>Premium-Modul</h3>
              <ul>
                <li>500 Wp pro Modul</li>
                <li>Hohe Effizienz und Zuverlässigkeit</li>
                <li>Längere Garantien</li>
                <li><strong>Ab 3.500 €</strong></li>
              </ul>
            </label>
            <label class="module-card allincludemodul">
              <span class="help-tooltip" title="600-Wp-Module mit maximaler Leistung.">?</span>
              <input type="radio" name="modultyp" value="All-Inclusive-Modul" <?php if($modultyp=='All-Inclusive-Modul') echo 'checked'; ?>>
              <h3>All-Inclusive-Modul</h3>
              <ul>
                <li>600 Wp pro Modul</li>
                <li>Höchste Leistung und Qualität</li>
                <li>Umfassende Service-Pakete</li>
                <li><strong>Ab 6.000 €</strong></li>
              </ul>
            </label>
          </div>
          <input type="hidden" name="formularSeite" value="6">
          <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" formnovalidate class="btn btn-back">&larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter &rarr;</button>
          </div>
          <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse); ?>">
          <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche); ?>">
          <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp); ?>">
          <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung); ?>">
          <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch); ?>">
          <input type="hidden" name="personen" value="<?php echo esc_attr($personen); ?>">
          <input type="hidden" name="speicherCheckbox" value="<?php echo esc_attr($speicherCheckbox); ?>">
          <input type="hidden" name="wallboxCheckbox" value="<?php echo esc_attr($wallboxCheckbox); ?>">
          <input type="hidden" name="foerderungCheckbox" value="<?php echo esc_attr($foerderungCheckbox); ?>">
          <input type="hidden" name="speicherGroesse" value="<?php echo esc_attr($speicherGroesse); ?>">
          <input type="hidden" name="wallboxTyp" value="<?php echo esc_attr($wallboxTyp); ?>">
          <input type="hidden" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe); ?>">
          <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>">
          <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
          <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>">
          <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz); ?>">
        </form>
      <?php elseif ($formularSeite == 7) : ?>
        <!-- Seite 7: Bestätigung der Daten – Alle Werte linksbündig -->
        <?php 
          if($dachflaeche >= 15){
              if($modultyp == "Basismodul"){
                  $modulFlaeche = 1.925;
                  $wpProModul = 400.0;
              } elseif($modultyp == "Premium-Modul"){
                  $modulFlaeche = 2.225;
                  $wpProModul = 500.0;
              } elseif($modultyp == "All-Inclusive-Modul"){
                  $modulFlaeche = 2.425;
                  $wpProModul = 600.0;
              }
              $modulanzahl = floor($dachflaeche / $modulFlaeche);
              if($modulanzahl >= 6 && $modulanzahl <= 8){
                  $preisProWp = 1.80;
              } elseif($modulanzahl >= 9 && $modulanzahl <= 12){
                  $preisProWp = 1.60;
              } elseif($modulanzahl >= 13 && $modulanzahl <= 15){
                  $preisProWp = 1.50;
              } elseif($modulanzahl >= 16 && $modulanzahl <= 20){
                  $preisProWp = 1.35;
              } elseif($modulanzahl >= 21 && $modulanzahl <= 30){
                  $preisProWp = 1.25;
              } elseif($modulanzahl >= 31 && $modulanzahl <= 40){
                  $preisProWp = 1.20;
              } elseif($modulanzahl >= 41){
                  $preisProWp = 1.15;
              }
              $preisModule = round($preisProWp * $modulanzahl * $wpProModul,2);
          } else {
              $modulanzahl = 0;
              $preisModule = 0;
          }
          if($dachtyp == "Flachdach"){
              $preisDach = 1000;
          } elseif($dachtyp == "Satteldach"){
              $preisDach = 1500;
          } elseif($dachtyp == "Pultdach"){
              $preisDach = 1200;
          } else {
              $preisDach = 0;
          }
          $preisDachflaeche = (is_numeric($dachflaeche)) ? round($dachflaeche * 30,2) : 0;
          $preisSpeicher = 0;
          if($speicherCheckbox === '1'){
              $preisSpeicher = round($speicherGroesse * 475,2);
          }
          $preisWallbox = 0;
          if($wallboxCheckbox === '1'){
              if($wallboxTyp === 'Standard-Wallbox'){
                  $preisWallbox = 1500;
              } elseif($wallboxTyp === 'Bidirektionale Wallbox'){
                  $preisWallbox = 3500;
              }
          }
          $foerderung = (is_numeric($foerderungHoehe) && $foerderungHoehe > 0) ? $foerderungHoehe : 0;
          $total = $preisModule + $preisDach + $preisDachflaeche + $preisSpeicher + $preisWallbox;
          $gesamtpreis = round($total - $foerderung,2);
          $rabattPreis = round($gesamtpreis * 0.98,2);
        ?>
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar7" style="width: 90%;"></div>
            <span class="progress-text">90%</span>
          </div>
          <h1 style="text-align: left;">Bestätigung der Daten</h1>
          <h2 style="text-align: left;">Prüfen Sie Ihre Angaben und die berechneten Optionen.</h2>
          <div class="confirmation-container">
            <p><strong>Vor- und Nachname:</strong> <?php echo esc_html($vornameNachname); ?></p>
            <p><strong>E-Mail:</strong> <?php echo esc_html($email); ?></p>
            <p><strong>Telefonnummer:</strong> <?php echo esc_html($telefonnummer); ?></p>
            <p><strong>Adresse:</strong> <?php echo esc_html($adresse); ?></p>
            <p><strong>Dachtyp:</strong> <?php echo esc_html($dachtyp); ?></p>
            <p><strong>Dachneigung:</strong> <?php echo intval($dachneigung); ?>°</p>
            <p><strong>Dachfläche:</strong> <?php echo esc_html($dachflaeche); ?> m²</p>
            <p><strong>Energieverbrauch:</strong> <?php echo esc_html($stromverbrauch); ?> kWh</p>
            <p><strong>Haushaltsgröße:</strong> <?php echo esc_html($personen); ?> Personen</p>
            <p><strong>Speicher:</strong> <?php echo ($speicherCheckbox==='1' ? "Ja, " . $speicherGroesse . " kWh" : "Nein"); ?></p>
            <p><strong>Wallbox:</strong> <?php echo ($wallboxCheckbox==='1' ? "Ja (" . $wallboxTyp . ")" : "Nein"); ?></p>
            <p><strong>Förderung:</strong> <?php echo ($foerderungCheckbox==='1' && $foerderungHoehe>0 ? $foerderungHoehe . " €" : "Keine Förderung"); ?></p>
            <p><strong>Modultyp:</strong> <?php echo esc_html($modultyp); ?></p>
            <p><strong>Modulanzahl:</strong> <?php echo $modulanzahl; ?></p>
            <p><strong>Voraussichtliche Kosten:</strong> <?php echo esc_html($gesamtpreis); ?> €</p>
          </div>
          <br>
          <input type="hidden" name="formularSeite" value="7">
          <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" formnovalidate class="btn btn-back">&larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Abschließen und Bericht generieren</button>
          </div>
          <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse); ?>">
          <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche); ?>">
          <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp); ?>">
          <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung); ?>">
          <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch); ?>">
          <input type="hidden" name="personen" value="<?php echo esc_attr($personen); ?>">
          <input type="hidden" name="speicherCheckbox" value="<?php echo esc_attr($speicherCheckbox); ?>">
          <input type="hidden" name="wallboxCheckbox" value="<?php echo esc_attr($wallboxCheckbox); ?>">
          <input type="hidden" name="foerderungCheckbox" value="<?php echo esc_attr($foerderungCheckbox); ?>">
          <input type="hidden" name="speicherGroesse" value="<?php echo esc_attr($speicherGroesse); ?>">
          <input type="hidden" name="wallboxTyp" value="<?php echo esc_attr($wallboxTyp); ?>">
          <input type="hidden" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe); ?>">
          <input type="hidden" name="modultyp" value="<?php echo esc_attr($modultyp); ?>">
          <input type="hidden" name="gesamtpreis" value="<?php echo esc_attr($gesamtpreis); ?>">
          <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>">
          <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
          <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>">
          <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz); ?>">
        </form>
      <?php elseif ($formularSeite == 8) : ?>
        <!-- Seite 8: Abschluss & Speicherung -->
        <?php 
          if($datenschutz==='1'){
              global $wpdb;
              $AssistentenDB = $wpdb->prefix . 'assistentendb';
              $wpdb->insert(
                  $AssistentenDB,
                  array(
                      'KundenName'      => $vornameNachname,
                      'Mail'            => $email,
                      'Telefonnummer'   => $telefonnummer,
                      'Adresse'         => $adresse,
                      'Dachtyp'         => $dachtyp,
                      'Dachneigung'     => $dachneigung,
                      'Stromverbrauch'  => $stromverbrauch,
                      'Personen'        => $personen,
                      'SpeicherGroesse' => $speicherGroesse,
                      'WallboxTyp'      => $wallboxTyp,
                      'FoerderungHoehe' => $foerderungHoehe,
                      'Modultyp'        => $modultyp,
                      'Gesamtpreis'     => $gesamtpreis,
                      'Datenschutz'     => $datenschutz,
                  )
              );
          }
        ?>
        <form method="POST" action="">
          <div class="progress-container">
            <div class="progress-bar8" style="width: 100%;"></div>
            <span class="progress-text">100%</span>
          </div>
          <h1>Ihr unverbindlicher Bericht wurde erstellt!</h1>
          <h2>Sie können den Bericht jetzt herunterladen oder per E-Mail erhalten.</h2>
          <div class="end-page-buttons">
            <button type="submit" name="requestOffer" class="btn btn-small">Angebot anfordern</button>
            <br><br>
            <input type="submit" name="downloadPdf" value="Bericht herunterladen" class="btn-small">
            <br><br>
            <input type="submit" name="sendEmail" value="An E-Mail senden" class="btn-small">
            <br><br>
            <button type="submit" name="navigation" value="zurueck" formnovalidate class="btn btn-small">Zurück</button>
          </div>
          <input type="hidden" name="formularSeite" value="8">
          <h2>Vielen Dank, dass Sie unseren Konfigurator genutzt haben! Unser Team wird sich bei Bedarf mit Ihnen in Verbindung setzen.</h2>
          <br><br>
          <div class="end-page-buttons">
            <button type="submit" name="resetCalculator" class="btn-reset">Neu starten</button>
          </div>
          <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse); ?>">
          <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche); ?>">
          <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp); ?>">
          <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung); ?>">
          <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch); ?>">
          <input type="hidden" name="personen" value="<?php echo esc_attr($personen); ?>">
          <input type="hidden" name="speicherCheckbox" value="<?php echo esc_attr($speicherCheckbox); ?>">
          <input type="hidden" name="wallboxCheckbox" value="<?php echo esc_attr($wallboxCheckbox); ?>">
          <input type="hidden" name="foerderungCheckbox" value="<?php echo esc_attr($foerderungCheckbox); ?>">
          <input type="hidden" name="speicherGroesse" value="<?php echo esc_attr($speicherGroesse); ?>">
          <input type="hidden" name="wallboxTyp" value="<?php echo esc_attr($wallboxTyp); ?>">
          <input type="hidden" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe); ?>">
          <input type="hidden" name="modultyp" value="<?php echo esc_attr($modultyp); ?>">
          <input type="hidden" name="gesamtpreis" value="<?php echo esc_attr($gesamtpreis); ?>">
          <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname); ?>">
          <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
          <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer); ?>">
          <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz); ?>">
        </form>
      <?php endif; ?>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
add_shortcode('solarkonfigurator', 'solarkonfigurator_shortcode');
?>
