
<!DOCTYPE html>
<html lang="de">

<?php
/*
Plugin Name: Solarkonfigurator Plugin
Description: Ein Plugin eines Solarkonfigurators.
Version: 1.0
Entwickler: Fabian Koch und Benedikt Schmuker
*/

// Verhindert direkten Zugriff auf die Datei
if (!defined('ABSPATH')) {
    exit;
}

// Plugin aktivieren: Datenbanktabelle erstellen
function solarkonfigurator_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'solarkonfigurator';
    $charset_collate = $wpdb->get_charset_collate();

    // Tabelle erstellen, falls sie nicht existiert
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'solarkonfigurator_install');

// Plugin deaktivieren: Datenbanktabelle löschen (optional)
function solarkonfigurator_uninstall() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'solarkonfigurator';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook(__FILE__, 'solarkonfigurator_uninstall');

// Shortcode für den Konfigurator anzeigen
function solarkonfigurator_shortcode() {
ob_start();}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistent</title>
    <script>
        // JavaScript-Funktion für Entweder-Oder Stromverbrauch
        function toggleFieldsStromverbrauch() {
            var verbrauch = document.getElementById('stromverbrauch');
            var personen = document.getElementById('personen');

            // Wenn Stromverbrauch eingegeben wird, deaktiviert das Personenfeld und umgekehrt
            if (verbrauch.value !== '') {
                personen.disabled = true;
            } else {
                personen.disabled = false;
            }

            if (personen.value !== '') {
                verbrauch.disabled = true;
            } else {
                verbrauch.disabled = false;
            }
        }

        function toggleFieldsModule() {
            var verbrauch = document.getElementById('dachflaeche');
            var personen = document.getElementById('anzahlModule');

            // Wenn Dachfläche eingegeben wird, deaktiviert das Modulfeld und umgekehrt
            if (dachflaeche.value !== '') {
                anzahlModule.disabled = true;
            } else {
                anzahlModule.disabled = false;
            }

            if (anzahlModule.value !== '') {
                dachflaeche.disabled = true;
            } else {
                dachflaeche.disabled = false;
            }
        }
        function toggleSpeicherFeld() {
    var speicherCheckbox = document.getElementById('speicherCheckbox');
    var speicherGroesse = document.getElementById('speicherGroesse');
    
    // Überprüfen, ob die Checkbox aktiviert ist
    if (speicherCheckbox.checked) {
        speicherGroesse.disabled = false; // Wenn die Checkbox aktiviert ist, aktiviere das Eingabefeld
    } else {
        speicherGroesse.disabled = true; // Wenn die Checkbox deaktiviert ist, deaktiviere das Eingabefeld
    }
}
function toggleWallboxFeld() {
    var wallboxCheckbox = document.getElementById('wallboxCheckbox');
    var wallboxTyp = document.getElementById('wallboxTyp');
    
    // Überprüfen, ob die Checkbox aktiviert ist
    if (wallboxCheckbox.checked) {
        wallboxTyp.disabled = false; // Wenn die Checkbox aktiviert ist, aktiviere das Eingabefeld
    } else {
        wallboxTyp.disabled = true; // Wenn die Checkbox deaktiviert ist, deaktiviere das Eingabefeld
    }
}
function toggleFoerderungFeld() {
    var foerderungCheckbox = document.getElementById('foerderungCheckbox');
    var foerderungHoehe = document.getElementById('foerderungHoehe');
    
    // Überprüfen, ob die Checkbox aktiviert ist
    if (foerderungCheckbox.checked) {
        foerderungHoehe.disabled = false; // Wenn die Checkbox aktiviert ist, aktiviere das Eingabefeld
    } else {
        foerderungHoehe.disabled = true; // Wenn die Checkbox deaktiviert ist, deaktiviere das Eingabefeld
    }
}

        </script>

</head>
<body>
    <?php
   
        $formularSeite = 1;
        $ueberschrift = $beschreibung = '';
        $adresse = '';
        $dachtyp = $dachneigung = '';
        $dachflaeche = 50;
        $stromverbrauch = $personen = '';
        $speicherCheckbox = $speicherGroesse = $wallboxCheckbox = $wallboxTyp = $foerderungCheckbox = $foerderungHoehe = '';
        $modultyp =  '';
        $name = $email = $telefonnummer = $datenschutz = '';
        $abschluss = '';
        $gesamtpreis = 0;
        

      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['formularSeite'])) {
                $formularSeite = $_POST['formularSeite'] + 1;
            }

            if (isset($_POST['adresse'])) {
                $adresse = $_POST['adresse'];
            }

            if (isset($_POST['dachtyp']) && isset($_POST['dachneigung'])) {
                $dachtyp = $_POST['dachtyp'];
                $dachneigung = $_POST['dachneigung'];
            }
      
            if (isset($_POST['stromverbrauch']) && $_POST['stromverbrauch'] !== '') {
                $stromverbrauch = $_POST['stromverbrauch'];
               
            } elseif (isset($_POST['personen']) && $_POST['personen'] !== '') {
                $personen = $_POST['personen'];
               
            }
            if (isset($_POST['speicherGroesse'])) {
                $speicherGroesse = !empty($_POST['speicherGroesse']) ? $_POST['speicherGroesse'] : '-';
            }
            
            if (isset($_POST['wallboxTyp'])) {
                $wallboxTyp = !empty($_POST['wallboxTyp']) ? $_POST['wallboxTyp'] : '-';
            }
            
            if (isset($_POST['foerderungHoehe'])) {
                $foerderungHoehe = !empty($_POST['foerderungHoehe']) ? $_POST['foerderungHoehe'] : '-';
            }
            
            
            if (isset($_POST['modultyp'])) {
                $modultyp = $_POST['modultyp'];
                
            }
            if (isset($_POST['gesamtpreis'])) {
                $gesamtpreis = $_POST['gesamtpreis'];
                
            }
            if (isset($_POST['name']) && isset($_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $telefonnummer = !empty($_POST['telefonnummer']) ? $_POST['telefonnummer'] : '-';
               
            }
            if (isset($_POST['abschluss'])) {
                $abschluss = $_POST['abschluss'];
               
            }
        }
    
    ?>

<?php if ($formularSeite == 1) : ?>
    <form method="POST" action="">
        <h1>Adresse</h1>
        <h2>Geben Sie Ihre Adresse ein, um den Standort für die Solaranlage festzulegen.</h2>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $adresse; ?>" required><br><br>
        <input type="hidden" name="formularSeite" value="1">
        <input type="submit" name="Weiter" value="Weiter">
       
    </form>
<?php endif; ?>

<?php if ($formularSeite == 2) : ?>
    <form method="POST" action="">
        <h1>Dachtyp und Neigung</h1>
        <h2>Wählen Sie den Dachtyp und die Dachneigung aus.</h2>
        <label for="dachtyp">Dachtyp:</label>
        <select id="dachtyp" name="dachtyp" required>
            <option value="Flachdach" <?php if($dachtyp == 'Flachdach') echo 'selected'; ?>>Flachdach</option>
            <option value="Satteldach" <?php if($dachtyp == 'Satteldach') echo 'selected'; ?>>Satteldach</option>
            <option value="Pultdach" <?php if($dachtyp == 'Pultdach') echo 'selected'; ?>>Pultdach</option>
        </select><br><br>
        <label for="dachneigung">Dachneigung (in Grad):</label>
        <input type="number" id="dachneigung" name="dachneigung" value="<?php echo $dachneigung; ?>" required><br><br>
        <input type="hidden" name="formularSeite" value="2">
        <input type="submit" name="Weiter" value="Weiter">
        <input type="hidden" name="adresse" value="<?php echo $adresse; ?>">
       
    </form>
<?php endif; ?>

<?php if ($formularSeite == 3) : ?>
    <form method="POST" action="">
        <h1>Energieverbrauch</h1>
        <h2>Geben Sie Ihren Jahresverbrauch oder die Haushaltsgröße an.</h2>
        <label for="stromverbrauch">Jährlicher Stromverbrauch:</label>
        <input type="number" id="stromverbrauch" name="stromverbrauch" value="<?php echo $stromverbrauch; ?>" onchange="toggleFieldsStromverbrauch()"><br><br>
        <label for="personen">Anzahl der Personen im Haushalt:</label>
        <input type="number" id="personen" name="personen" value="<?php echo $personen; ?>" onchange="toggleFieldsStromverbrauch()"><br><br>
        <input type="hidden" name="formularSeite" value="3">
        <input type="submit" name="Weiter" value="Weiter">
        <input type="hidden" name="adresse" value="<?php echo $adresse; ?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp; ?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung; ?>">
        
     </form>
<?php endif; ?>

<?php if ($formularSeite == 4) : ?>
    <form method="POST" action="">
        <h1>Extras</h1>
        <h2>Wählen Sie zusätzliche Optionen, um Ihre Solaranlage zu erweitern.</h2>
        <label for="speicherCheckbox"> Speicher hinzufügen</label>
        <input type="checkbox" id="speicherCheckbox" name="speicherCheckbox" value="<?php echo $speicherCheckbox; ?>" onchange="toggleSpeicherFeld()"><br>
        <label for="speicherGroesse"></label>
        <input type="number" id="speicherGroesse" name="speicherGroesse" value="<?php echo $speicherGroesse; ?>" placeholder="8 kWh" min="2" max="16" step="2" disabled><br><br>
        <label for="wallboxCheckbox"> Wallbox hinzufügen</label>
        <input type="checkbox" id="wallboxCheckbox" name="wallboxCheckbox" value="<?php echo $wallboxCheckbox; ?>" onchange="toggleWallboxFeld()"><br>
        <label for="wallboxTyp"></label>
        <select id="wallboxTyp" name="wallboxTyp" disabled>
            <option value="Standard-Wallbox" <?php if($wallboxTyp == 'Standard-Wallbox') echo 'selected'; ?>>Standard-Wallbox</option>
            <option value="Bidirektionale Wallbox" <?php if($wallboxTyp == 'Bidirektionale Wallbox') echo 'selected'; ?>>Bidirektionale Wallbox</option>
        </select><br><br>
        <label for="foerderungCheckbox"> Förderung hinzufügen</label>
        <input type="checkbox" id="foerderungCheckbox" name="foerderungCheckbox" value="<?php echo $foerderungCheckbox; ?>" onchange="toggleFoerderungFeld()"><br>
        <label for="foerderungHoehe"></label>
        <input type="number" id="foerderungHoehe" name="foerderungHoehe" value="<?php echo $foerderungHoehe; ?>" placeholder="Förderungsbetrag" step="100"disabled><br><br>
        <input type="hidden" name="formularSeite" value="4">
        <input type="submit" name="Weiter" value="Weiter">

        <input type="hidden" name="adresse" value="<?php echo $adresse; ?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp; ?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung; ?>">
        <input type="hidden" name="stromverbrauch" value="<?php echo $stromverbrauch; ?>">
        <input type="hidden" name="personen" value="<?php echo $personen; ?>">  
        
    </form>
<?php endif; ?>

<?php if ($formularSeite == 5) : ?>
    <form method="POST" action="">
        <h1>Modultyp wählen</h1>
        <h2>Klicken Sie auf eines der drei Module, um dieses auszuwählen.</h2>
        <label for="basismodul">Basismodul</label>
        <input type="radio" id="basis" name="modultyp" value="Basismodul"><br><br>
        <label for="premiummodul">Premium-Modul</label>
        <input type="radio" id="premium" name="modultyp" value="Premium-Modul" required><br><br>
        <label for="all-inclusive-modul">All-Inclusive-Modul</label>
        <input type="radio" id="allInklusive" name="modultyp" value="All-Inclusive-Modul"><br><br>
        <input type="hidden" name="formularSeite" value="5">
        <input type="submit" name="Weiter" value="Weiter" onclick="berechneGesamtpreis();">
        <input type="hidden" name="adresse" value="<?php echo $adresse; ?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp; ?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung; ?>">
        <input type="hidden" name="stromverbrauch" value="<?php echo $stromverbrauch; ?>">
        <input type="hidden" name="personen" value="<?php echo $personen; ?>">  
        <input type="hidden" name="speicherGroesse" value="<?php echo $speicherGroesse; ?>">
        <input type="hidden" name="wallboxTyp" value="<?php echo $wallboxTyp; ?>">
        <input type="hidden" name="foerderungHoehe" value="<?php echo $foerderungHoehe; ?>"> 
       
    </form>
<?php endif; ?>

<?php if ($formularSeite == 6) : ?>
    <?php
// Berechnet Wp pro Modul
function berechneWpProModul($varModultyp) {
    $wpProModul = 0;

    // Berechnung des Wp pro Modul basierend auf dem Modultyp
    if ($varModultyp === 'Basismodul') {
        $wpProModul = 350;
    } elseif ($varModultyp === 'Premium-Modul') {
        $wpProModul = 410;
    } elseif ($varModultyp === 'All-Inclusive-Modul') {
        $wpProModul = 450;
    } else {
        echo "Unbekannter Modultyp!";
    }
    return $wpProModul;
}

// Berechnet die Anzahl der Module, die aufs Dach passen
function berechneModulanzahl($varDachflaeche) {
    $modulFlaeche = 1.925;  // Fläche eines einzelnen Moduls in m²
    $modulanzahl = 0;

    // Überprüfen, ob eine Dachfläche eingegeben wurde
    if ($varDachflaeche && $varDachflaeche > 0) {
        // Berechnung der Modulanzahl
        $modulanzahl = ceil($varDachflaeche / $modulFlaeche);
    }
    echo $modulanzahl;

    return $modulanzahl;
}

// Berechnet den Preis aller Module
function berechnePreisModule($varModulanzahl, $varWpProModul) {
    $preisProWp = 0;

    if ($varModulanzahl >= 6 && $varModulanzahl <= 8) {
        $preisProWp = 1.80;
    } elseif ($varModulanzahl >= 9 && $varModulanzahl <= 12) {
        $preisProWp = 1.60;
    } elseif ($varModulanzahl >= 13 && $varModulanzahl <= 15) {
        $preisProWp = 1.50;
    } elseif ($varModulanzahl >= 16 && $varModulanzahl <= 20) {
        $preisProWp = 1.35;
    } elseif ($varModulanzahl >= 21 && $varModulanzahl <= 30) {
        $preisProWp = 1.25;
    } elseif ($varModulanzahl >= 31 && $varModulanzahl <= 40) {
        $preisProWp = 1.20;
    } elseif ($varModulanzahl >= 41) {
        $preisProWp = 1.15;
    }
    

    // Gesamtpreis: Preis pro Wp mal Wp pro Modul mal Anzahl der Module
    $preis = $preisProWp * $varWpProModul * $varWpProModul;
    
    return $preis;
}

// Berechnet den Wallbox-Preis
function berechneWallboxPreis($varWallboxCheckbox, $varWallboxTyp) {
    $preisWallbox = 0; // Standardpreis

    // Überprüfen, ob die Wallbox-Checkbox aktiviert ist
    if ($varWallboxCheckbox) {
        // Überprüfen, ob ein Wallbox-Typ ausgewählt wurde
        if ($varWallboxTyp) {
            // Berechnung des Preises je nach Wallbox-Typ
            if ($varWallboxTyp === 'Standard-Wallbox') {
                $preisWallbox = 1500;
            } elseif ($varWallboxTyp === 'Bidirektionale Wallbox') {
                $preisWallbox = 3500;
            }
        }
    }
    return $preisWallbox;
}

// Berechnet den Preis vom Speicher
function berechneSpeicherPreis($varSpeicherCheckbox, $varSpeicherGroesse) {
    $preisSpeicher = 0; // Standardpreis

    // Überprüfen, ob die Speicher-Checkbox aktiviert ist
    if ($varSpeicherCheckbox) {
        // Überprüfen, ob eine Speichergröße eingegeben wurde
        if ($varSpeicherGroesse && $varSpeicherGroesse > 0) {
            // Berechnung des Preises pro kWh
            $preisSpeicher = $varSpeicherGroesse * 475;
        }
    }
    return $preisSpeicher;
}

// Berechnet den Gesamtpreis
function berechneGesamtpreis($varDachflaeche, $varModultyp, $varWallboxCheckbox, $varWallboxTyp, $varSpeicherCheckbox, $varSpeicherGroesse, $varFoerderungHoehe) {
    // Berechnung der einzelnen Preise
    $modulanzahl = berechneModulanzahl($varDachflaeche);
    $wpProModul = berechneWpProModul($varModultyp);  // Berechnet das Wp pro Modul je nach Modultyp
    $preisModule = berechnePreisModule($modulanzahl, $wpProModul);  // Preis der Module
    $preisSpeicher = berechneSpeicherPreis($varSpeicherCheckbox, $varSpeicherGroesse);  // Preis für den Speicher
    $preisWallbox = berechneWallboxPreis($varWallboxCheckbox, $varWallboxTyp);  // Preis für die Wallbox

    // Förderung eingeben
    $foerderung = $varFoerderungHoehe ?: 0;  // Falls keine Förderung eingegeben wurde, 0 als Standard

    // Berechnung des Gesamtpreises
    $varGesamtpreis = $preisModule + $preisSpeicher + $preisWallbox - $foerderung;

    return $varGesamtpreis;
}
//$gesamtpreis = berechneGesamtpreis($dachflaeche, $modultyp, $wallboxCheckbox, $wallboxTyp, $speicherCheckbox, $speicherGroesse, $foerderungHoehe);
?>

    <form method="POST" action="">
        <h1>Kontaktinformationen</h1>
        <h2>Damit wir Ihnen die Ergebnisse zusenden können, tragen Sie bitte Ihre Kontaktdaten ein.</h2>
        <label for="name">Vor- und Nachname</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Max Mustermann" required><br><br>
        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="maxmustermann@gmail.com" required><br><br>
        <label for="telefonnummer">Telefonnummer</label>
        <input type="tel" id="telefonnummer" name="telefonnummer" value="<?php echo $telefonnummer; ?>" placeholder="012345678910"><br><br><br>
        <label for="datenschutz">Ich stimme der Datenspeicherung und den Datenschutzbestimmungen zu.</label>
        <input type="checkbox" id="datenschutz" name="datenschutz" value="<?php echo $datenschutz; ?>"><br>
        <input type="hidden" name="formularSeite" value="6">
        <input type="submit" name="Weiter" value="Weiter">
        <input type="hidden" name="adresse" value="<?php echo $adresse; ?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp; ?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung; ?>">
        <input type="hidden" name="stromverbrauch" value="<?php echo $stromverbrauch; ?>">
        <input type="hidden" name="personen" value="<?php echo $personen; ?>"> 
        <input type="hidden" name="speicherGroesse" value="<?php echo $speicherGroesse; ?>">
        <input type="hidden" name="wallboxTyp" value="<?php echo $wallboxTyp; ?>">
        <input type="hidden" name="foerderungHoehe" value="<?php echo $foerderungHoehe; ?>">  
        <input type="hidden" name="modultyp" value="<?php echo $modultyp; ?>">
        
    </form>
<?php endif; ?>

<?php if ($formularSeite == 7) : ?>
    <form method="POST" action="">
        <h1>Bestätigung der Daten</h1>
        <h2>Prüfen Sie Ihre Angaben und die berechneten Optionen.</h2>
        <label for="name">Vor- und Nachname: <?php echo $name; ?></label><br>
        <label for="email">E-Mail: <?php echo $email; ?></label><br>
        <label for="telefonnummer">Telefonnummer: <?php echo $telefonnummer; ?></label><br>
        <label for="adresse">Adresse: <?php echo $adresse; ?></label><br>
        <label for="dachtyp">Dachtyp: <?php echo $dachtyp; ?></label><br>
        <label for="speicherGroesse">Speicher: <?php echo $speicherGroesse; ?></label><br>
        <label for="wallboxTyp">Ladeinfrastruktur: <?php echo $wallboxTyp; ?></label><br>
        <label for="foerderungHoehe">Förderung: <?php echo $foerderungHoehe; ?></label><br>
        <label for="modultyp">Modultyp: <?php echo $modultyp; ?></label><br>
        <label for="gesamtpreis">Vorraussichtliche Kosten: <?php echo $gesamtpreis?></label><br><br>


        <input type="hidden" name="formularSeite" value="7">

        <input type="submit" name="Abschließen und Bericht generieren" value="Abschließen und Bericht generieren">
    </form>
<?php endif; ?>

    <?php if ($formularSeite == 8) : ?>
        <form method="POST" action="">
        <h1>Ihr persönliches Angebot wurde erstellt!</h1>
        <h2>Ihr individueller Bereich steht jetzt bereit. Sie können ihn direkt herunterladen oder bequem per E-Mail erhalten.</h2>
        
           
    
            <input type="button" value="Bericht herunterladen"><br><br>
            <input type="button" value="An E-Mail schicken"><br><br>

            <input type="hidden" name="formularSeite" value="8">
            <h2>Vielen Dank, dass Sie unseren Konfigurator genutzt haben! Unser Team wird sich bei Bedarf bald mit Ihnen in Verbindung setzen.</h2><br><br>
    </form>
    
    <?php endif; ?>

</body>
</html>

