
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

// Funktion zum Einbinden des Stylesheets
function solarkonfigurator_enqueue_styles() {
    // CSS-Datei im gleichen Verzeichnis wie das PHP-File einbinden
    wp_enqueue_style('solarkonfigurator-style', plugin_dir_url(__FILE__) . 'design.css');
}

// Den Hook 'wp_enqueue_scripts' verwenden, um die Styles zu laden
add_action('wp_enqueue_scripts', 'solarkonfigurator_enqueue_styles');


// Shortcode für den Konfigurator anzeigen
function solarkonfigurator_shortcode() {
ob_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistent</title>
    <link href="design.css" rel="stylesheet">
</head>
<body>
    <?php
        //default-Werte setzen
        $formularSeite = 1;
        $adresse = "";
        $dachtyp = "";
        $dachneigung = 45;
        $dachflaeche = 0;
        $stromverbrauch = $personen = 0;
        $speicherCheckbox = $wallboxCheckbox = $foerderungCheckbox = $datenschutz = '';
        $foerderungHoehe = 0;
        $speicherGroesse = $wallboxTyp = '';
        $modultyp = "Basismodul";
        $vornameNachname = $email = $telefonnummer = '';
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

            //Dachfläche setzen
            if (isset($_POST['dachflaeche'])) {
                $dachflaeche = $_POST['dachflaeche'];
            }

            //Dachtyp- und Dachneigung setzen
            if (isset($_POST['dachtyp']) && isset($_POST['dachneigung'])) {
                $dachtyp = $_POST['dachtyp'];
                $dachneigung = $_POST['dachneigung'];
            }

            //Stromverbrauch und Personenzahl setzenn
            if (isset($_POST['stromverbrauch'])) {
                $stromverbrauch = $_POST['stromverbrauch'];
            }
            if (isset($_POST['personen'])) {
                $personen = $_POST['personen'];
            }

            //Speicher-Checkbox setzen
            if (isset($_POST['speicherCheckbox']) && $_POST['speicherCheckbox'] == '1') {
                $speicherCheckbox = '1'; // Checkbox ist angekreuzt
            } else {
                $speicherCheckbox = '0'; // Checkbox ist nicht angekreuzt
            }
            
             //Wallbox-Checkbox setzen
            if (isset($_POST['wallboxCheckbox']) && $_POST['wallboxCheckbox'] == '1') {
                $wallboxCheckbox = '1'; // Checkbox ist angekreuzt
            } else {
                $wallboxCheckbox = '0'; // Checkbox ist nicht angekreuzt
            }

             //Förderung-Checkbox setzen
            if (isset($_POST['foerderungCheckbox']) && $_POST['foerderungCheckbox'] == '1') {
                $foerderungCheckbox = '1'; // Checkbox ist angekreuzt
            } else {
                $foerderungCheckbox = '0'; // Checkbox ist nicht angekreuzt
            }

            if (isset($_POST['datenschutz']) && $_POST['datenschutz'] == '1') {
                $datenschutz = '1'; // Checkbox ist angekreuzt
            } else {
                $datenschutz = '0'; // Checkbox ist nicht angekreuzt
            }

            //Speichergröße setzen
            if (isset($_POST['speicherGroesse'])) {
                if ($speicherCheckbox === '1') {
                    $speicherGroesse = $_POST['speicherGroesse'];
                } else {
                    $speicherGroesse = "-";
                }
            }

            //Wallboxtyp setzen
            if (isset($_POST['wallboxTyp'])) {
                if ($wallboxCheckbox === '1') {
                    $wallboxTyp = $_POST['wallboxTyp'];
                } else {
                    $wallboxTyp = "-";
                }
            }
            
            //Förderungshöhe setzen
            if (isset($_POST['foerderungHoehe'])) {
                if ($foerderungCheckbox === '1') {
                    $foerderungHoehe = $_POST['foerderungHoehe'];
                } else {
                    $foerderungHoehe = "-";
                }
            }
            
            //Modultyp setzen
            if (isset($_POST['modultyp'])) {
                $modultyp = $_POST['modultyp'];
            }

            //Gesamtpreis setzen
            if (isset($_POST['gesamtpreis'])) {
                $gesamtpreis = $_POST['gesamtpreis'];
            }

            //Name setzen
            if (isset($_POST['vornameNachname'])) {
                $vornameNachname = $_POST['vornameNachname'];
            }

            //Email setzen
            if(isset($_POST['email'])){
                $email = $_POST['email'];
            }

            //Telefonnummer setzen
            if (isset($_POST['telefonnummer'])) {
                $telefonnummer = $_POST['telefonnummer'];
                if (empty($telefonnummer) || $telefonnummer === '' || $telefonnummer === 0) {
                    $telefonnummer = "-";
                }
            }
        }
    ?>
<?php
//Seite 1
if ($formularSeite == 1) : ?>
<form method="POST" action="">
        <div class="progress-container">
            <div class="progress-bar1"></div>
            <span class="progress-text">10%</span>
        </div>
        <h1>Kontaktinformationen</h1>
        <h2>Damit wir Ihnen die Ergebnisse zusenden können, tragen Sie bitte Ihre Kontaktdaten ein.</h2>

        <div class="form-grid">
            <div class="form-group">
                <label for="vornameNachname">Vor- und Nachname*:</label>
                <input type="text" id="vornameNachname" name="vornameNachname" value="<?php echo $vornameNachname; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail*:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="telefonnummer">Telefonnummer:</label>
            <input type="number" id="telefonnummer" name="telefonnummer" value="<?php echo $telefonnummer; ?>">
        </div>

    <div class="form-grid">
        <label for="datenschutz">Ich stimme den <a href="./agb" target="_blank">AGB</a> und den Datenschutzbestimmungen zu.</label>
        <input type="checkbox" id="datenschutz" name="datenschutz" value="1" <?php echo isset($datenschutz) && $datenschutz == '1' ? 'checked' : ''; ?>><br>
    </div>

        <input type="hidden" name="formularSeite" value="1">
        <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" class="btn btn-back"> &larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter  &rarr;</button>
        </div>
    </form>
<?php endif; ?>
<?php
//Seite 2
 if ($formularSeite == 2) : ?>
    <form method="POST" action="">
        <div class="progress-container">
            <div class="progress-bar2"></div>
            <span class="progress-text">20%</span>
        </div>
        <h1>Adresse</h1>
        <h2>Geben Sie Ihre Adresse ein, um den Standort für die Solaranlage festzulegen.</h2>
        <label>Adresse:</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $adresse; ?>" required><br><br>
        <label>Dachfläche:</label>
        <input type="number" id="dachflaeche" name="dachflaeche" value="<?php echo $dachflaeche; ?>" required><br><br>

        <input type="hidden" name="formularSeite" value="2">
        <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" class="btn btn-back"> &larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter  &rarr;</button>
        </div>

        <input type="hidden" name="vornameNachname" value="<?php echo $vornameNachname;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="telefonnummer" value="<?php echo $telefonnummer;?>">
        <input type="hidden" name="datenschutz" value="<?php echo $datenschutz;?>">
    </form>
<?php endif; ?>


<?php 
//Seite 3
if ($formularSeite == 3) : ?>
    <form method="POST" action="">
        <div class="progress-container">
            <div class="progress-bar3"></div>
            <span class="progress-text">40%</span>
        </div>
        <h1>Dachtyp und Neigung</h1>
        <h2>Wählen Sie den Dachtyp und die Dachneigung aus.</h2>
        <label for="dachtyp">Dachtyp:</label><br>
        <select id="dachtyp" name="dachtyp" required>
            <option value="Flachdach" <?php if($dachtyp == 'Flachdach') echo 'selected'; ?>>Flachdach</option>
            <option value="Satteldach" <?php if($dachtyp == 'Satteldach') echo 'selected'; ?>>Satteldach</option>
            <option value="Pultdach" <?php if($dachtyp == 'Pultdach') echo 'selected'; ?>>Pultdach</option>
        </select><br><br>
        <label for="dachneigung">Dachneigung: <span id="dachneigungValue"><?php echo isset($dachneigung) ? $dachneigung : 45; ?>°</span></label><br>
        <input type="range" id="dachneigung" name="dachneigung" min="0" max="90" value="<?php echo isset($dachneigung) ? $dachneigung : 45; ?>" step="1" oninput="document.getElementById('dachneigungValue').innerText = this.value + '°'" required><br><br>
        <input type="hidden" name="formularSeite" value="3">
        <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" class="btn btn-back"> &larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter  &rarr;</button>
        </div>

        <input type="hidden" name="adresse" value="<?php echo $adresse;?>">
        <input type="hidden" name="dachflaeche" value="<?php echo $dachflaeche;?>">
        <input type="hidden" name="vornameNachname" value="<?php echo $vornameNachname;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="telefonnummer" value="<?php echo $telefonnummer;?>">
        <input type="hidden" name="datenschutz" value="<?php echo $datenschutz;?>">
    </form>
<?php endif; ?>


<?php 
//Seite 4
if ($formularSeite == 4) : ?>
    <form method="POST" action="">
        <div class="progress-container">
            <div class="progress-bar4"></div>
            <span class="progress-text">60%</span>
        </div>
        <h1>Energieverbrauch</h1>
        <h2>Geben Sie Ihren Jahresverbrauch oder die Haushaltsgröße an.</h2>
        <div class="form-grid">
            <div class="form-group">
                <label for="stromverbrauch">Jahresverbrauch (in kWh):</label><br>
                <input type="number" id="stromverbrauch" name="stromverbrauch" value="<?php echo $stromverbrauch; ?>" min="0" step="100" placeholder="0" /><br><br>
            </div>
            <div class="form-group">
                <label for="personen">Haushaltsgröße (in Personen):</label><br>
                <input type="number" id="personen" name="personen" value="<?php echo $personen; ?>" min="0" step="1" placeholder="0"><br><br>
            </div>
        </div>
        <input type="hidden" name="formularSeite" value="4">
        <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" class="btn btn-back"> &larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter  &rarr;</button>
        </div>

        <input type="hidden" name="adresse" value="<?php echo $adresse;?>">
        <input type="hidden" name="dachflaeche" value="<?php echo $dachflaeche;?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp;?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung;?>">
        <input type="hidden" name="vornameNachname" value="<?php echo $vornameNachname;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="telefonnummer" value="<?php echo $telefonnummer;?>">
        <input type="hidden" name="datenschutz" value="<?php echo $datenschutz;?>">
     </form>
<?php endif; ?>


<?php
//Seite 5
if ($formularSeite == 5) : ?>
    <form method="POST" action="">
        <div class="progress-container">
            <div class="progress-bar5"></div>
            <span class="progress-text">70%</span>
        </div>
        <h1>Extras</h1>
        <h2>Wählen Sie zusätzliche Optionen, um Ihre Solaranlage zu erweitern.</h2>
        <label for="speicherCheckbox"> Speicher hinzufügen:</label>
        <input type="checkbox" id="speicherCheckbox" name="speicherCheckbox" value="1" <?php echo isset($speicherCheckbox) && $speicherCheckbox == '1' ? 'checked' : ''; ?>><br>
        <select id="speicherGroesse" name="speicherGroesse">
            <option value="8" <?php if($speicherGroesse == '8') echo 'selected'; ; ?>>8 kWh</option>
            <option value="10" <?php if($speicherGroesse == '10') echo 'selected'; ; ?>>10 kWh</option>
            <option value="12" <?php if($speicherGroesse == '12') echo 'selected'; ; ?>>12 kWh</option>
            <option value="14" <?php if($speicherGroesse == '14') echo 'selected'; ; ?>>14 kWh</option>
            <option value="16" <?php if($speicherGroesse == '16') echo 'selected'; ;  ?>>16 kWh</option>
        </select><br><br>
        <label for="wallboxCheckbox"> Wallbox hinzufügen:</label>
        <input type="checkbox" id="wallboxCheckbox" name="wallboxCheckbox" value="1" <?php echo isset($wallboxCheckbox) && $wallboxCheckbox == '1' ? 'checked' : ''; ?>><br>
        <select id="wallboxTyp" name="wallboxTyp">
            <option value="Standard-Wallbox" <?php if($wallboxTyp == "Standard-Wallbox") echo 'selected'; ?>>Standard-Wallbox</option>
            <option value="Bidirektionale Wallbox" <?php if($wallboxTyp == "Bidirektionale Wallbox") echo 'selected'; ?>>Bidirektionale Wallbox</option>
        </select><br><br>
        <label for="foerderungCheckbox"> Förderung hinzufügen (in Euro):</label>
        <input type="checkbox" id="foerderungCheckbox" name="foerderungCheckbox" value="1" <?php echo isset($foerderungCheckbox) && $foerderungCheckbox == '1' ? 'checked' : ''; ?>><br>
        <input type="number" id="foerderungHoehe" name="foerderungHoehe" value="<?php echo $foerderungHoehe; ?>" min="0" max="5000" placeholder="Förderungsbetrag" step="100"><br><br>
        <input type="hidden" name="formularSeite" value="5">
        <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" class="btn btn-back"> &larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter  &rarr;</button>
        </div>

        <input type="hidden" name="adresse" value="<?php echo $adresse;?>">
        <input type="hidden" name="dachflaeche" value="<?php echo $dachflaeche;?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp;?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung;?>">
        <input type="hidden" name="stromverbrauch" value="<?php echo $stromverbrauch;?>">
        <input type="hidden" name="personen" value="<?php echo $personen;?>">
        <input type="hidden" name="vornameNachname" value="<?php echo $vornameNachname;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="telefonnummer" value="<?php echo $telefonnummer;?>">
        <input type="hidden" name="datenschutz" value="<?php echo $datenschutz;?>">
    </form>
<?php endif; ?>


<?php 
//Seite 6
if ($formularSeite == 6) : ?>
    <form method="POST" action="">
        <div class="progress-container">
            <div class="progress-bar6"></div>
            <span class="progress-text">80%</span>
        </div>
        <h1>Modultyp wählen</h1>
        <h2>Klicken Sie auf eines der drei Module, um dieses auszuwählen.</h2>
        <label for="basismodul">Basismodul</label>
        <input type="radio" id="basis" name="modultyp" value="Basismodul" <?php echo isset($modultyp) && $modultyp == 'Basismodul' ? 'checked' : ''; ?>required><br><br>
        <label for="premiummodul">Premium-Modul</label>
        <input type="radio" id="premium" name="modultyp" value="Premium-Modul"  <?php echo isset($modultyp) && $modultyp == 'Premium-Modul' ? 'checked' : ''; ?>><br><br>
        <label for="all-inclusive-modul">All-Inclusive-Modul</label>
        <input type="radio" id="allInklusive" name="modultyp" value="All-Inclusive-Modul"  <?php echo isset($modultyp) && $modultyp == 'All-Inclusive-Modul' ? 'checked' : ''; ?>><br><br>
        <input type="hidden" name="formularSeite" value="6">
        <div class="button-container">
            <button type="submit" name="navigation" value="zurueck" class="btn btn-back"> &larr; Zurück</button>
            <button type="submit" name="navigation" value="weiter" class="btn btn-next">Weiter  &rarr;</button>
        </div>

        <input type="hidden" name="adresse" value="<?php echo $adresse;?>">
        <input type="hidden" name="dachflaeche" value="<?php echo $dachflaeche;?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp;?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung;?>">
        <input type="hidden" name="stromverbrauch" value="<?php echo $stromverbrauch;?>">
        <input type="hidden" name="personen" value="<?php echo $personen;?>">
        <input type="hidden" name="speicherCheckbox" value="<?php echo $speicherCheckbox;?>">
        <input type="hidden" name="wallboxCheckbox" value="<?php echo $wallboxCheckbox;?>">
        <input type="hidden" name="foerderungCheckbox" value="<?php echo $foerderungCheckbox;?>">
        <input type="hidden" name="speicherGroesse" value="<?php echo $speicherGroesse;?>">
        <input type="hidden" name="wallboxTyp" value="<?php echo $wallboxTyp;?>">
        <input type="hidden" name="foerderungHoehe" value="<?php echo $foerderungHoehe;?>">  
        <input type="hidden" name="vornameNachname" value="<?php echo $vornameNachname;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="telefonnummer" value="<?php echo $telefonnummer;?>">
        <input type="hidden" name="datenschutz" value="<?php echo $datenschutz;?>">  
    </form>
<?php endif; ?>

<?php
//Seite 7
if ($formularSeite == 7) : ?>
 <?php
$wpProModul = 0.0;
$modulFlaeche = 1.925; 
$modulanzahl = 0.0;
$preisProWp = 0.0;
$preisWallbox = 0.0; 
$preisModule = 0.0;
$preisSpeicher = 0.0; 
$foerderung = 0.0;

//Setzt die Stärke der Module in Abhängigkeit vom ausgewählten Modul
if ($modultyp === 'Basismodul') {
    $wpProModul = 350.0;
} elseif ($modultyp === 'Premium-Modul') {
    $wpProModul = 410.0;
} elseif ($modultyp === 'All-Inclusive-Modul') {
    $wpProModul = 450.0;
}

//Berechnet wieviele Solarmodule auf das Dach passen
if ($dachflaeche > 0) {
    $modulanzahl = (int) floor($dachflaeche / $modulFlaeche);
}

//Berechnet den Preis pro Wp in Abhängigkeit von der Anzahl der Module
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

//Berechnet den Preis der Module
$preisModule =  (float) $preisProWp *  (float) $modulanzahl *  (float) $wpProModul;

//Setzt den Preis für die Wallbox
if ($wallboxCheckbox === '1') {
    if ($wallboxTyp === 'Standard-Wallbox') {
        $preisWallbox = 1500.00;
    } 
    if ($wallboxTyp === 'Bidirektionale Wallbox') {
        $preisWallbox = 3500.00;
    }
}

//Setzt Preis für den Speicher
if ($speicherCheckbox === '1') {
        $preisSpeicher = $speicherGroesse * 475;
    }

//Setzt Förderungsbetrag    
if($foerderungCheckbox === '1'){
        $foerderung = $foerderungHoehe;
}

//Berechnet den Gesamtpreis
$gesamtpreis = round((float) $preisModule + (float) $preisSpeicher + (float) $preisWallbox - (float) $foerderung, 2);



//Eingabevalidierung
if(empty($telefonnummer || $telefonnummer === '' || $telefonnummer === 0))
{
    $telefonnummer = "-";
}

if(empty($foerderungHoehe || $foerderungHoehe === '' || $foerderungHoehe === 0))
{
    $foerderungHoehe = "-";
}

?>
   
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar7"></div>
        <span class="progress-text">90%</span>
    </div>
        <h1>Bestätigung der Daten</h1>
        <h2>Prüfen Sie Ihre Angaben und die berechneten Optionen.</h2>
        <label>Vor- und Nachname: <?php echo $vornameNachname; ?></label><br>
        <label>E-Mail: <?php echo $email; ?></label><br>
        <label>Telefonnummer: <?php echo $telefonnummer; ?></label><br>
        <label>Adresse: <?php echo $adresse; ?></label><br>
        <label>Dachtyp: <?php echo $dachtyp; ?></label><br>
        <label>Speicher: <?php echo $speicherGroesse; ?></label><br>
        <label>Ladeinfrastruktur: <?php echo $wallboxTyp; ?></label><br>
        <label>Förderung: <?php echo $foerderungHoehe; ?></label><br>
        <label>Modultyp: <?php echo $modultyp; ?></label><br>
        <label>Vorraussichtliche Kosten: <?php echo $gesamtpreis?></label><br><br>

        <input type="hidden" name="formularSeite" value="7">
    <div class="button-container">
        <button type="submit" name="navigation" value="zurueck" class="btn btn-back"> &larr; Zurück</button>
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">Abschließen und Bericht generieren</button>
    </div>

        <input type="hidden" name="adresse" value="<?php echo $adresse;?>">
        <input type="hidden" name="dachflaeche" value="<?php echo $dachflaeche;?>">
        <input type="hidden" name="dachtyp" value="<?php echo $dachtyp;?>">
        <input type="hidden" name="dachneigung" value="<?php echo $dachneigung;?>">
        <input type="hidden" name="stromverbrauch" value="<?php echo $stromverbrauch;?>">
        <input type="hidden" name="personen" value="<?php echo $personen;?>">
        <input type="hidden" name="speicherCheckbox" value="<?php echo $speicherCheckbox;?>">
        <input type="hidden" name="wallboxCheckbox" value="<?php echo $wallboxCheckbox;?>">
        <input type="hidden" name="foerderungCheckbox" value="<?php echo $foerderungCheckbox;?>">
        <input type="hidden" name="speicherGroesse" value="<?php echo $speicherGroesse;?>">
        <input type="hidden" name="wallboxTyp" value="<?php echo $wallboxTyp;?>">
        <input type="hidden" name="foerderungHoehe" value="<?php echo $foerderungHoehe;?>">
        <input type="hidden" name="modultyp" value="<?php echo $modultyp;?>">
        <input type="hidden" name="gesamtpreis" value="<?php echo $gesamtpreis;?>">
        <input type="hidden" name="vornameNachname" value="<?php echo $vornameNachname;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="telefonnummer" value="<?php echo $telefonnummer;?>">
        <input type="hidden" name="datenschutz" value="<?php echo $datenschutz;?>">

</form>
<?php endif; ?>

<?php if ($formularSeite == 8) : ?>
        <form method="POST" action="">
            <div class="progress-container">
                <div class="progress-bar8"></div>
                <span class="progress-text">100%</span>
            </div>
        <h1>Ihr persönliches Angebot wurde erstellt!</h1>
        <h2>Ihr individueller Bereich steht jetzt bereit. Sie können ihn direkt herunterladen oder bequem per E-Mail erhalten.</h2>

            <input type="submit" value="Bericht herunterladen" class="btn-small"><br><br>
            <input type="submit" value="An E-Mail schicken" class="btn-small"><br><br>

            <input type="hidden" name="formularSeite" value="8">
            <h2>Vielen Dank, dass Sie unseren Konfigurator genutzt haben! Unser Team wird sich bei Bedarf bald mit Ihnen in Verbindung setzen.</h2><br><br>

            <input type="hidden" name="adresse" value="<?php echo $adresse;?>">
            <input type="hidden" name="dachflaeche" value="<?php echo $dachflaeche;?>">
            <input type="hidden" name="dachtyp" value="<?php echo $dachtyp;?>">
            <input type="hidden" name="dachneigung" value="<?php echo $dachneigung;?>">
            <input type="hidden" name="stromverbrauch" value="<?php echo $stromverbrauch;?>">
            <input type="hidden" name="personen" value="<?php echo $personen;?>">
            <input type="hidden" name="speicherCheckbox" value="<?php echo $speicherCheckbox;?>">
            <input type="hidden" name="wallboxCheckbox" value="<?php echo $wallboxCheckbox;?>">
            <input type="hidden" name="foerderungCheckbox" value="<?php echo $foerderungCheckbox;?>">
            <input type="hidden" name="speicherGroesse" value="<?php echo $speicherGroesse;?>">
            <input type="hidden" name="wallboxTyp" value="<?php echo $wallboxTyp;?>">
            <input type="hidden" name="foerderungHoehe" value="<?php echo $foerderungHoehe;?>">
            <input type="hidden" name="modultyp" value="<?php echo $modultyp;?>">
            <input type="hidden" name="gesamtpreis" value="<?php echo $gesamtpreis;?>">
            <input type="hidden" name="vornameNachname" value="<?php echo $vornameNachname;?>">
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="telefonnummer" value="<?php echo $telefonnummer;?>">
            <input type="hidden" name="datenschutz" value="<?php echo $datenschutz;?>">

    </form>
    <?php
    // Daten in DB speichern speichern
    global $wpdb; //Datenbank

    //Überprüfen ob Datenschutz akezptiert
    if ($datenschutz === '1') {
        //Daten speichern
        $AssistentenDB = $wpdb->prefix . 'AssistentenDB';
        $wpdb->insert(
            $AssistentenDB,
            array(
                'KundenName' => $vornameNachname,
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
<?php endif; ?>
</body>
</html>

<?php

return ob_get_clean();}
add_shortcode('solarkonfigurator', 'solarkonfigurator_shortcode');
?>

