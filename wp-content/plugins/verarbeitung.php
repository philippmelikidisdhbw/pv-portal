
<!DOCTYPE html>
<html lang="de">
<?php
/*
Plugin Name: Solarkonfigurator Plugin
Description: Ein Plugin eines Solarkonfigurators.
Version: 1.0
Entwickler: Fabian Koch und Benedikt Schmuker
*/



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
ob_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistent</title>
</head>
<body>
    <?php
        //default-Werte setzen
        $formularSeite = 1;
        $adresse = '';
        $dachtyp = '';
        $dachneigung = 45;
        $dachflaeche = 50;
        $stromverbrauch = $personen = '';
        $speicherCheckbox = $wallboxCheckbox = $foerderungCheckbox = 0;
        $speicherGroesse = $wallboxTyp = $foerderungHoehe = 0;
        $modultyp = 'Basismodul';
        $name = $email = $telefonnummer = $datenschutz = '';
        $abschluss = '';
        $gesamtpreis = 0;
        

      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //Seitenwechsel
            if (isset($_POST['formularSeite'])) {
                $formularSeite = $_POST['formularSeite'];
            
                if (isset($_POST['navigation'])) {
                    if ($_POST['navigation'] == 'weiter') {
                        $formularSeite++; // Seite vorwärts
                    } elseif ($_POST['navigation'] == 'zurueck') {
                        $formularSeite--; // Seite rückwärts
                    }
                }
            }

            //Adresse setzen
            if (isset($_POST['adresse'])) {
                $adresse = $_POST['adresse'];
            }

            //Dachtyp- und Dachneigung setzen
            if (isset($_POST['dachtyp']) && isset($_POST['dachneigung'])) {
                $dachtyp = $_POST['dachtyp'];
                $dachneigung = $_POST['dachneigung'];
            }

            //Stromverbrauch und Personenzahl setzenn
            if (isset($_POST['stromverbrauch']) && $_POST['stromverbrauch'] !== '') {
                $stromverbrauch = $_POST['stromverbrauch'];
            } elseif (isset($_POST['personen']) && $_POST['personen'] !== '') {
                $personen = $_POST['personen'];
            }

            //Speichergröße setzen
            if (isset($_POST['speicherGroesse'])) {
                $speicherGroesse = !empty($_POST['speicherGroesse']);
            }
            
            //Wallboxtyp setzen
            if (isset($_POST['wallboxTyp'])) {
                $wallboxTyp = !empty($_POST['wallboxTyp']);
            }
            
            //Förderungshöhe setzen
            if (isset($_POST['foerderungHoehe'])) {
                $foerderungHoehe = !empty($_POST['foerderungHoehe']);
            }
            
            //Modultyp setzen
            if (isset($_POST['modultyp'])) {
                $modultyp = $_POST['modultyp'];
            }

            //Name, Email und Telefonnummer setzen
            if (isset($_POST['name']) && isset($_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $telefonnummer = !empty($_POST['telefonnummer']);
               
            }
        }
    ?>

<?php
//Seite 1
 if ($formularSeite == 1) : ?>
    <form method="POST" action="">
        <h1>Adresse</h1>
        <h2>Geben Sie Ihre Adresse ein, um den Standort für die Solaranlage festzulegen.</h2>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $adresse; ?>" required><br><br>
        <input type="hidden" name="formularSeite" value="1">
        <button type="submit" name="navigation" value="weiter">Weiter</button> 
    </form>
<?php endif; ?>


<?php 
//Seite 2
if ($formularSeite == 2) : ?>
    <form method="POST" action="">
        <h1>Dachtyp und Neigung</h1>
        <h2>Wählen Sie den Dachtyp und die Dachneigung aus.</h2>
        <label for="dachtyp">Dachtyp:</label><br>
        <select id="dachtyp" name="dachtyp" required>
            <option value="Flachdach" <?php if($dachtyp == 'Flachdach') echo 'selected'; ?>>Flachdach</option>
            <option value="Satteldach" <?php if($dachtyp == 'Satteldach') echo 'selected'; ?>>Satteldach</option>
            <option value="Pultdach" <?php if($dachtyp == 'Pultdach') echo 'selected'; ?>>Pultdach</option>
        </select><br><br>
        <label for="dachneigung">Dachneigung: <span id="dachneigungValue"><?php echo isset($dachneigung) ? $dachneigung : 45; ?>°</span></label><br>
        <input type="range" id="dachneigung" name="dachneigung" min="0" max="90" value="<?php echo isset($dachneigung) ? $dachneigung : 45; ?>" step="1" oninput="document.getElementById('dachneigungValue').innerText = this.value + '°'"><br><br>
        <input type="hidden" name="formularSeite" value="2">
        <button type="submit" name="navigation" value="zurueck">Zurück</button>
        <button type="submit" name="navigation" value="weiter">Weiter</button>  
    </form>
<?php endif; ?>


<?php 
//Seite 3
if ($formularSeite == 3) : ?>
    <form method="POST" action="">
        <h1>Energieverbrauch</h1>
        <h2>Geben Sie Ihren Jahresverbrauch oder die Haushaltsgröße an.</h2>
        <label for="stromverbrauch">Jahresverbrauch (in kWh):</label><br>
        <input type="number" id="stromverbrauch" name="stromverbrauch" value="<?php echo $stromverbrauch; ?>" min="0" step="100" onchange="toggleFieldsStromverbrauch()" placeholder="0" /><br><br>
        <label for="personen">Haushaltsgröße (in Personen):</label><br>
        <input type="number" id="personen" name="personen" value="<?php echo $personen; ?>" min="0" step="1" onchange="toggleFieldsStromverbrauch()" placeholder="0"><br><br>
        <input type="hidden" name="formularSeite" value="3">
        <button type="submit" name="navigation" value="zurueck">Zurück</button>
        <button type="submit" name="navigation" value="weiter">Weiter</button>
     </form>
<?php endif; ?>


<?php
//Seite 4 
if ($formularSeite == 4) : ?>
    <form method="POST" action="">
        <h1>Extras</h1>
        <h2>Wählen Sie zusätzliche Optionen, um Ihre Solaranlage zu erweitern.</h2>
        <label for="speicherCheckbox"> Speicher hinzufügen:</label>
        <input type="checkbox" id="speicherCheckbox" name="speicherCheckbox" value="<?php echo $speicherCheckbox; ?>" onchange="toggleSpeicherFeld()"><br>
        <select id="speicherGroesse" name="speicherGroesse" disabled>
            <option value="8" <?php if($speicherGroesse == '8') echo 'selected'; ; ?>>8 kWh</option>
            <option value="10" <?php if($speicherGroesse == '10') echo 'selected'; ; ?>>10 kWh</option>
            <option value="12" <?php if($speicherGroesse == '12') echo 'selected'; ; ?>>12 kWh</option>
            <option value="14" <?php if($speicherGroesse == '14') echo 'selected'; ; ?>>14 kWh</option>
            <option value="16" <?php if($speicherGroesse == '16') echo 'selected'; ;  ?>>16 kWh</option>
        </select><br><br>
        <label for="wallboxCheckbox"> Wallbox hinzufügen:</label>
        <input type="checkbox" id="wallboxCheckbox" name="wallboxCheckbox" value="<?php echo $wallboxCheckbox; ?>" onchange="toggleWallboxFeld()"><br>
        <select id="wallboxTyp" name="wallboxTyp" disabled>
            <option value="Standard-Wallbox" <?php if($wallboxTyp == 'Standard-Wallbox') echo 'selected'; ?>>Standard-Wallbox</option>
            <option value="Bidirektionale Wallbox" <?php if($wallboxTyp == 'Bidirektionale Wallbox') echo 'selected'; ?>>Bidirektionale Wallbox</option>
        </select><br><br>
        <label for="foerderungCheckbox"> Förderung hinzufügen (in Euro):</label>
        <input type="checkbox" id="foerderungCheckbox" name="foerderungCheckbox" value="<?php echo $foerderungCheckbox; ?>" onchange="toggleFoerderungFeld()"><br>
        <input type="number" id="foerderungHoehe" name="foerderungHoehe" value="<?php echo $foerderungHoehe; ?>" min="0" placeholder="Förderungsbetrag" step="100" disabled><br><br>
        <input type="hidden" name="formularSeite" value="4">
        <button type="submit" name="navigation" value="zurueck">Zurück</button>
        <button type="submit" name="navigation" value="weiter">Weiter</button>
    </form>
<?php endif; ?>


<?php 
//Seite 5
if ($formularSeite == 5) : ?>
    <form method="POST" action="">
        <h1>Modultyp wählen</h1>
        <h2>Klicken Sie auf eines der drei Module, um dieses auszuwählen.</h2>
        <label for="basismodul">Basismodul</label>
        <input type="radio" id="basis" name="modultyp" value="Basismodul"><br><br>
        <label for="premiummodul">Premium-Modul</label>
        <input type="radio" id="premium" name="modultyp" value="Premium-Modul"><br><br>
        <label for="all-inclusive-modul">All-Inclusive-Modul</label>
        <input type="radio" id="allInklusive" name="modultyp" value="All-Inclusive-Modul"><br><br>
        <input type="hidden" name="formularSeite" value="5">
        <button type="submit" name="navigation" value="zurueck">Zurück</button>
        <button type="submit" name="navigation" value="weiter">Weiter</button> 
    </form>
<?php endif; ?>

<?php if ($formularSeite == 6) : ?>
    <?php

$wpProModul = 0.0;
$modulFlaeche = 1.925; 
$modulanzahl = 0.0;
$preisProWp = 0.0;
$preisWallbox = 0.0; 
$preisModule = 0.0;
$preisSpeicher = 0.0; 


if ($modultyp === 'Basismodul') {
    $wpProModul = 350.0;
} elseif ($modultyp === 'Premium-Modul') {
    $wpProModul = 410.0;
} elseif ($modultyp === 'All-Inclusive-Modul') {
    $wpProModul = 450.0;
}

if ($dachflaeche > 0) {
    $modulanzahl = (int) ceil($dachflaeche / $modulFlaeche);
}

if ($modulanzahl >= 6 && $modulanzahl <= 8) {
    $preisProWp = 1.80;
} elseif ($modulanzahl >= 9 && $modulanzahl <= 12) {
    $preisProWp = 1.60;
} elseif ($modulanzahl >= 13 && $modulanzahl <= 15) {
    $preisProWp = 1.50;
} elseif ($modulanzahl >= 16 && $modulanzahl <= 20) {
    $preisProWp = 1.35;
} elseif ($modulanzahl >= 21 && $modulanzahl <= 30) {
    $preisProWp = 1.25;
} elseif ($modulanzahl >= 31 && $modulanzahl <= 40) {
    $preisProWp = 1.20;
} elseif ($modulanzahl >= 41) {
    $preisProWp = 1.15;
}

$preisModule =  (float) $preisProWp *  (float) $modulanzahl *  (float) $wpProModul;


if ($wallboxCheckbox === 1) {
        if ($wallboxTyp === 'Standard-Wallbox') {
            $preisWallbox = 1500;
        } 
        elseif ($wallboxTyp === 'Bidirektionale Wallbox') {
            $preisWallbox = 3500;
        }
    }

// Überprüfen, ob die Speicher-Checkbox aktiviert ist
if ($speicherCheckbox === 1) {

    if ($speicherGroesse > 0) {
        $preisSpeicher = $speicherGroesse * 475;
    }
}

$gesamtpreis = (float) $preisModule + (float) $preisSpeicher + (float) $preisWallbox - (float) $foerderungHoehe;
?>
    <form method="POST" action="">
        <h1>Kontaktinformationen</h1>
        <h2>Damit wir Ihnen die Ergebnisse zusenden können, tragen Sie bitte Ihre Kontaktdaten ein.</h2>
        <label for="name">Vor- und Nachname:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>
        <label for="telefonnummer">Telefonnummer:</label>
        <input type="tel" id="telefonnummer" name="telefonnummer" value="<?php echo $telefonnummer; ?>"><br><br><br>
        <label for="datenschutz">Ich stimme der Datenspeicherung und den Datenschutzbestimmungen zu.</label>
        <input type="checkbox" id="datenschutz" name="datenschutz" value="1"><br>
        <input type="hidden" name="formularSeite" value="6">
        <button type="submit" name="navigation" value="zurueck">Zurück</button>
        <button type="submit" name="navigation" value="weiter">Weiter</button>
    </form>


<?php endif; ?>
<?php if ($formularSeite == 7) : ?>
    
    <?php

    // Daten in DB speichern speichern
    global $wpdb; //Datenbank

    //Überprüfen ob Datenschutz akezptiert
    $datenschutz = isset($_POST['datenschutz']) && $_POST['datenschutz'] == '1';
    if ($datenschutz) {

        //Daten speichern
        $AssistentenDB = $wpdb->prefix . 'AssistentenDB';
        $wpdb->insert(
            $AssistentenDB,
            array(
                'KundenName' => $name,
                'Mail' => $email,
                'Telefonnummer' => $telefonnummer,
                'Adresse' => $adresse,
                'Dachtyp' => $dachtyp,
                'Dachneigung' => $dachneigung,
                'Stromverbrauch' => $stromverbrauch,
                'Personen' => $personen,
                'SpeicherGroesse' => $speicherGroesse,
                'WallboxTyp' => $wallboxTyp,
                'FoerderungHoehe' => $foerderungHoehe,
                'Modultyp' => $modultyp,
                'Gesamtpreis' => $gesamtpreis,
                'Datenschutz' => $datenschutz,
            )
        );
    }
    ?>

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
        <button type="submit" name="navigation" value="zurueck">Zurück</button>
        <button type="submit" name="navigation" value="weiter">Abschließen und Bericht generieren</button>

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
            <button type="submit" name="navigation" value="zurueck">Zurück</button>
    </form>
    
<?php endif; ?>

</body>
</html>

<?php
return ob_get_clean();}
add_shortcode('solarkonfigurator', 'solarkonfigurator_shortcode');
?>

