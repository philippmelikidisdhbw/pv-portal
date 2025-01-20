<?php
/*
Plugin Name: Solarkonfigurator Plugin v2 (A/B-Test)
Description: Zweite Version des Solarkonfigurators (grüne Farbgebung, erweiterte Infos).
Version: 2.0
Author: Fabian Koch und Benedikt Schmuker
*/

// --------------------------------------------------------
// 1) Plugin-Aktivierung: Beispiel-Tabelle erstellen
// --------------------------------------------------------
function solarkonfigurator_v2_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'solarkonfigurator_v2';
    $charset_collate = $wpdb->get_charset_collate();

    // Tabelle erstellen, falls sie nicht existiert
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'solarkonfigurator_v2_install');

// --------------------------------------------------------
// 2) Plugin-Deaktivierung: Tabelle ggf. löschen (optional)
// --------------------------------------------------------
function solarkonfigurator_v2_uninstall() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'solarkonfigurator_v2';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook(__FILE__, 'solarkonfigurator_v2_uninstall');

// --------------------------------------------------------
// 3) Stylesheet design_v2.css einbinden
// --------------------------------------------------------
function solarkonfigurator_v2_enqueue_styles() {
    // CSS-Datei im Plugin-Verzeichnis laden (design_v2.css MUSS existieren!)
    wp_enqueue_style('solarkonfigurator_v2-style', plugin_dir_url(__FILE__) . 'design_v2.css');
}
add_action('wp_enqueue_scripts', 'solarkonfigurator_v2_enqueue_styles');

// --------------------------------------------------------
// 4) Shortcode definieren: [solarkonfigurator_v2]
// --------------------------------------------------------
function solarkonfigurator_v2_shortcode() {

    // Da wir KEINE Sessions verwenden, setzen wir am Anfang Standardwerte:
    $formularSeite = 1;

    // Variablen initialisieren
    $vornameNachname  = '';
    $email            = '';
    $telefonnummer    = '';
    $adresse          = '';
    $dachtyp          = '';
    $dachneigung      = 45;
    $dachflaeche      = 0;
    $stromverbrauch   = 0;
    $personen         = 0;

    $speicherCheckbox   = '0';
    $wallboxCheckbox    = '0';
    $foerderungCheckbox = '0';
    $datenschutz        = '0';

    $speicherGroesse  = 0;
    $wallboxTyp       = '';
    $foerderungHoehe  = 0;
    $modultyp         = '';
    $gesamtpreis      = 0;

    // -----------------------------------------------------------
    // A) Prüfen, ob reset=1 via GET => Dann ALLES zurücksetzen!
    // -----------------------------------------------------------
    if (!(isset($_GET['reset']) && $_GET['reset'] == '1')) {

        // -------------------------------------------------------
        // B) Sonst: POST-Daten verarbeiten
        // -------------------------------------------------------
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Wenn der User "Neu starten" auf Seite 8 klickt
            if (isset($_POST['resetCalculator'])) {
                // Weiterleitung auf dieselbe Seite mit ?reset=1 => alle Variablen wieder Default
                wp_redirect(add_query_arg('reset', '1', get_permalink()));
                exit;
            }

            // Formularseite (zur Navigation)
            if (isset($_POST['formularSeite'])) {
                $formularSeite = (int)$_POST['formularSeite'];

                // Navigation
                if (isset($_POST['navigation'])) {
                    if ($_POST['navigation'] == 'weiter') {
                        $formularSeite++;
                    } elseif ($_POST['navigation'] == 'zurueck') {
                        $formularSeite--;
                    }
                }
            }

            // Am Ende: Redirect zur Startseite (Beispiel-URL anpassen)
            if (isset($_POST['redirect'])) {
                header("Location: https://solarsolutionsgmbh.com");
                exit();
            }

            // Eingaben verarbeiten
            if (isset($_POST['vornameNachname'])) {
                $vornameNachname = sanitize_text_field($_POST['vornameNachname']);
            }
            if (isset($_POST['email'])) {
                $email = sanitize_email($_POST['email']);
            }
            if (isset($_POST['telefonnummer'])) {
                $telefonnummer = sanitize_text_field($_POST['telefonnummer']);
                if (empty($telefonnummer) || $telefonnummer === '0') {
                    $telefonnummer = "-";
                }
            }
            if (isset($_POST['adresse'])) {
                $adresse = sanitize_text_field($_POST['adresse']);
            }
            if (isset($_POST['dachtyp'])) {
                $dachtyp = sanitize_text_field($_POST['dachtyp']);
            }
            if (isset($_POST['dachneigung'])) {
                $dachneigung = (int)$_POST['dachneigung'];
            }
            if (isset($_POST['dachflaeche'])) {
                $dachflaeche = floatval($_POST['dachflaeche']);
            }
            if (isset($_POST['stromverbrauch'])) {
                $stromverbrauch = floatval($_POST['stromverbrauch']);
            }
            if (isset($_POST['personen'])) {
                $personen = (int)$_POST['personen'];
            }

            // Checkboxen
            $speicherCheckbox   = (isset($_POST['speicherCheckbox']) && $_POST['speicherCheckbox'] == '1') ? '1' : '0';
            $wallboxCheckbox    = (isset($_POST['wallboxCheckbox'])  && $_POST['wallboxCheckbox'] == '1') ? '1' : '0';
            $foerderungCheckbox = (isset($_POST['foerderungCheckbox']) && $_POST['foerderungCheckbox'] == '1') ? '1' : '0';
            $datenschutz        = (isset($_POST['datenschutz']) && $_POST['datenschutz'] == '1') ? '1' : '0';

            // Speichergröße als int casten, um Probleme mit "8.0" vs. "8" zu vermeiden
            if (isset($_POST['speicherGroesse'])) {
                if ($speicherCheckbox === '1') {
                    $speicherGroesse = (int)$_POST['speicherGroesse'];
                }
            }
            if (isset($_POST['wallboxTyp'])) {
                if ($wallboxCheckbox === '1') {
                    $wallboxTyp = sanitize_text_field($_POST['wallboxTyp']);
                } else {
                    $wallboxTyp = 'Keine Wallbox';
                }
            }
            if (isset($_POST['foerderungHoehe'])) {
                if ($foerderungCheckbox === '1') {
                    $foerderungHoehe = floatval($_POST['foerderungHoehe']);
                }
            }
            if (isset($_POST['modultyp'])) {
                $modultyp = sanitize_text_field($_POST['modultyp']);
            }
            if (isset($_POST['gesamtpreis'])) {
                $gesamtpreis = floatval($_POST['gesamtpreis']);
            }
        }
    }

    // -------------------------------------------------------
    // HTML-Ausgabe starten
    // -------------------------------------------------------
    ob_start();
    ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solarkonfigurator v2 (A/B-Test)</title>
    <!-- design_v2.css wird bereits via wp_enqueue_style eingebunden -->
</head>
<body id="solarkonfigurator-body-v2">

<?php
// -----------------------------------
// Seite 1
// -----------------------------------
if ($formularSeite == 1) : ?>
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar1" style="width: 10%;"></div>
        <span class="progress-text">10%</span>
    </div>
    <h1>Kontaktinformationen (v2)</h1>
    <h2>Damit wir Ihnen ein passendes Angebot senden können, benötigen wir Ihre Kontaktdaten.</h2>

    <div class="form-grid">
        <div class="form-group">
            <label for="vornameNachname">Vor- und Nachname*:</label>
            <input type="text" id="vornameNachname" name="vornameNachname"
                   value="<?php echo esc_attr($vornameNachname); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-Mail*:</label>
            <input type="email" id="email" name="email"
                   value="<?php echo esc_attr($email); ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="telefonnummer">Telefonnummer (optional):</label>
        <input type="number" id="telefonnummer" name="telefonnummer"
               value="<?php echo esc_attr($telefonnummer); ?>">
        <small>Wenn Sie eine Telefonnummer angeben, können wir Sie bei Rückfragen schneller erreichen.</small>
    </div>

    <div class="form-grid">
        <label for="datenschutz">
            Ich stimme den <a href="./agb" target="_blank">AGB</a> und den Datenschutzbestimmungen zu.*
        </label>
        <input type="checkbox" id="datenschutz" name="datenschutz" value="1"
               <?php echo ($datenschutz === '1') ? 'checked' : '';?> required>
    </div>

    <input type="hidden" name="formularSeite" value="1">
    <div class="button-container">
        <!-- Auf Seite 1 kein Zurück-Button -->
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">
            Weiter &rarr;
        </button>
    </div>
</form>

<?php
// -----------------------------------
// Seite 2
// -----------------------------------
elseif ($formularSeite == 2) : ?>
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar2" style="width: 20%;"></div>
        <span class="progress-text">20%</span>
    </div>
    <h1>Ihre Adresse (v2)</h1>
    <h2>Bitte geben Sie die Adresse ein, an der die Solaranlage installiert werden soll.</h2>

    <label>Adresse*:</label><br>
    <input type="text" id="adresse" name="adresse"
           value="<?php echo esc_attr($adresse); ?>" required><br><br>

    <label>Dachfläche (m²)*:</label><br>
    <input type="number" id="dachflaeche" name="dachflaeche"
           value="<?php echo esc_attr($dachflaeche); ?>" min="15" step="0.001" required><br><br>

    <small>
        Hinweis: Die Dachfläche kann bei Flachdach etwas größer sein als bei Satteldach. 
        Bei Unsicherheiten nutzen Sie ungefähre Werte.
    </small>

    <input type="hidden" name="formularSeite" value="2">
    <div class="button-container">
        <button type="submit" name="navigation" value="zurueck" class="btn btn-back">
            &larr; Zurück
        </button>
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">
            Weiter &rarr;
        </button>
    </div>

    <!-- Bisherige Eingaben als hidden Fields -->
    <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname);?>">
    <input type="hidden" name="email" value="<?php echo esc_attr($email);?>">
    <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer);?>">
    <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz);?>">

</form>

<?php
// -----------------------------------
// Seite 3: Dachtyp & Dachneigung
// -----------------------------------
elseif ($formularSeite == 3) : ?>
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar3" style="width: 40%;"></div>
        <span class="progress-text">40%</span>
    </div>
    <h1>Dachtyp und Neigung (v2)</h1>
    <h2>Wählen Sie den Dachtyp und passen Sie die Neigung an.</h2>

    <!-- Interaktives Info-Icon für Dachtypen -->
    <label for="dachtyp">
        Dachtyp*:
        <span class="help-tooltip" title="Ein Flachdach braucht ggf. Aufständerungen, Sattel- und Pultdächer sind geneigter.">i</span>
    </label><br>
    <select id="dachtyp" name="dachtyp" required>
        <option value="Flachdach"  <?php if($dachtyp == 'Flachdach')  echo 'selected'; ?>>Flachdach</option>
        <option value="Satteldach" <?php if($dachtyp == 'Satteldach') echo 'selected'; ?>>Satteldach</option>
        <option value="Pultdach"   <?php if($dachtyp == 'Pultdach')   echo 'selected'; ?>>Pultdach</option>
    </select><br><br>

    <!-- Visuelle Darstellung Dachneigung mittels SVG -->
    <div class="dachneigung-visual-container">
        <label for="dachneigung">
            Dachneigung*: <span id="dachneigungValue"><?php echo intval($dachneigung); ?>°</span>
        </label>
        <br>
        <input type="range" id="dachneigung" name="dachneigung"
               min="0" max="90" value="<?php echo intval($dachneigung); ?>" step="1"
               oninput="updateDachneigungVisual(this.value)"
               required>
        <div id="roofVisualization" style="margin-top:20px; height:100px;">
            <!-- Einfaches SVG-Element, das eine Dachlinie darstellt -->
            <svg id="roofSVG" width="200" height="100">
                <line id="roofLine" x1="10" y1="90" x2="190" y2="90" stroke="black" stroke-width="4" />
            </svg>
        </div>
    </div>

    <script>
    function updateDachneigungVisual(value) {
        document.getElementById('dachneigungValue').innerText = value + '°';
        var roofLine = document.getElementById('roofLine');
        // Drehung um den linken Endpunkt (10,90); negative Rotation für einen realistischen Neigungseffekt
        roofLine.setAttribute("transform", "rotate(-" + value + " 10 90)");
    }
    </script>

    <p><small>Je höher der Winkel, desto mehr Neigung hat Ihr Dach. Zwischen 20° und 50° sind typische Werte.</small></p>

    <input type="hidden" name="formularSeite" value="3">
    <div class="button-container">
        <button type="submit" name="navigation" value="zurueck" class="btn btn-back">
            &larr; Zurück
        </button>
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">
            Weiter &rarr;
        </button>
    </div>

    <!-- Bisherige Eingaben als hidden Fields -->
    <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse);?>">
    <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche);?>">
    <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname);?>">
    <input type="hidden" name="email" value="<?php echo esc_attr($email);?>">
    <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer);?>">
    <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz);?>">
</form>

<?php
// -----------------------------------
// Seite 4: Energieverbrauch (mit Balkendiagramm und Durchschnittsvergleich)
// -----------------------------------
elseif ($formularSeite == 4) : ?>
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar4" style="width: 60%;"></div>
        <span class="progress-text">60%</span>
    </div>
    <h1>Energieverbrauch (v2)</h1>
    <h2>Wie hoch ist Ihr Jahresstromverbrauch bzw. Ihre Haushaltsgröße?</h2>

    <div class="form-grid">
        <div class="form-group">
            <label for="stromverbrauch">
                Jahresverbrauch (in kWh)
                <span class="help-tooltip" title="z.B. 3500 kWh">i</span>
            </label><br>
            <input type="number" id="stromverbrauch" name="stromverbrauch"
                   value="<?php echo esc_attr($stromverbrauch); ?>" min="0" step="1"
                   placeholder="z.B. 3500">
            <small>Bitte geben Sie Ihren jährlichen Verbrauch ein.</small>
        </div>
        <div class="form-group">
            <label for="personen">Haushaltsgröße (in Personen)*:</label><br>
            <input type="number" id="personen" name="personen"
                   value="<?php echo esc_attr($personen); ?>" min="1" step="1"
                   required>
            <small>Für 2 Personen liegt der Durchschnitt z.B. bei ca. 2500 kWh/Jahr.</small>
        </div>
    </div>

    <!-- Balkendiagramm und Vergleichstext -->
    <div style="margin-top:20px;">
        <canvas id="energyChart" width="400" height="200" style="border:1px solid #ccc;"></canvas>
        <p id="energyText" style="text-align:center; font-size:0.9em;"></p>
    </div>

    <input type="hidden" name="formularSeite" value="4">
    <div class="button-container">
        <button type="submit" name="navigation" value="zurueck" class="btn btn-back">
            &larr; Zurück
        </button>
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">
            Weiter &rarr;
        </button>
    </div>

    <!-- Hidden Inputs -->
    <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse);?>">
    <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche);?>">
    <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp);?>">
    <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung);?>">
    <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname);?>">
    <input type="hidden" name="email" value="<?php echo esc_attr($email);?>">
    <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer);?>">
    <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz);?>">

</form>

<!-- JavaScript: Balkendiagramm und Vergleich des Energieverbrauchs -->
<script>
function drawEnergyChart() {
    var canvas = document.getElementById('energyChart');
    if (!canvas.getContext) return;
    var ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    var userValue = parseFloat(document.getElementById('stromverbrauch').value) || 0;
    var persons = parseInt(document.getElementById('personen').value) || 1;
    // Durchschnittlicher Verbrauch: 1250 kWh pro Person (Beispiel)
    var average = persons * 1250;
    
    // Bestimme den maximalen Wert für die Skala
    var maxVal = Math.max(userValue, average, 1000);
    var chartWidth = 300; // maximale Balkenbreite
    var barHeight = 30;
    var xStart = 50;
    
    // Berechne Balkenbreiten
    var userBarWidth = (userValue / maxVal) * chartWidth;
    var avgBarWidth = (average / maxVal) * chartWidth;
    
    // Zeichne den Balken für den eigenen Verbrauch (grün)
    ctx.fillStyle = 'green';
    ctx.fillRect(xStart, 50, userBarWidth, barHeight);
    ctx.fillStyle = 'black';
    ctx.font = '14px sans-serif';
    ctx.fillText("Dein Verbrauch: " + userValue + " kWh", xStart, 45);
    
    // Zeichne den Balken für den Durchschnitt (blau)
    ctx.fillStyle = 'blue';
    ctx.fillRect(xStart, 120, avgBarWidth, barHeight);
    ctx.fillStyle = 'black';
    ctx.fillText("Durchschnitt: " + average + " kWh", xStart, 115);
    
    // Vergleichstext unten
    var energyText = document.getElementById('energyText');
    if(userValue < average) {
        energyText.innerText = "Dein Verbrauch liegt unter dem Durchschnitt für " + persons + " Person(en).";
    } else if(userValue > average) {
        energyText.innerText = "Dein Verbrauch liegt über dem Durchschnitt für " + persons + " Person(en).";
    } else {
        energyText.innerText = "Dein Verbrauch entspricht exakt dem Durchschnitt für " + persons + " Person(en).";
    }
}

document.getElementById('stromverbrauch').addEventListener('input', drawEnergyChart);
document.getElementById('personen').addEventListener('input', drawEnergyChart);
window.addEventListener('load', drawEnergyChart);
</script>

<?php
// -----------------------------------
// Seite 5 (Extras)
// -----------------------------------
elseif ($formularSeite == 5) : ?>
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar5" style="width: 70%;"></div>
        <span class="progress-text">70%</span>
    </div>
    <h1>Extras (v2)</h1>
    <h2>Wählen Sie zusätzliche Optionen für Ihre Anlage.</h2>

    <!-- Speicher -->
    <label for="speicherCheckbox">
        Speicher hinzufügen?
        <span class="help-tooltip" 
              title="Ein Stromspeicher erhöht Ihren Eigenverbrauch und macht Sie unabhängiger vom Netz.">?</span>
    </label>
    <input type="checkbox" id="speicherCheckbox" name="speicherCheckbox" value="1"
        <?php echo ($speicherCheckbox === '1') ? 'checked' : ''; ?>><br>

    <select id="speicherGroesse" name="speicherGroesse">
        <option value="8"  <?php if($speicherGroesse == 8) echo 'selected'; ?>>8 kWh</option>
        <option value="10" <?php if($speicherGroesse == 10) echo 'selected'; ?>>10 kWh</option>
        <option value="12" <?php if($speicherGroesse == 12) echo 'selected'; ?>>12 kWh</option>
        <option value="14" <?php if($speicherGroesse == 14) echo 'selected'; ?>>14 kWh</option>
        <option value="16" <?php if($speicherGroesse == 16) echo 'selected'; ?>>16 kWh</option>
    </select>
    <br><br>

    <!-- Wallbox -->
    <label for="wallboxCheckbox">
        Wallbox hinzufügen?
        <span class="help-tooltip" 
              title="Eine Wallbox lädt Ihr E-Auto direkt mit Solarstrom vom Dach.">?</span>
    </label>
    <input type="checkbox" id="wallboxCheckbox" name="wallboxCheckbox" value="1"
        <?php echo ($wallboxCheckbox === '1') ? 'checked' : ''; ?>><br>

    <select id="wallboxTyp" name="wallboxTyp">
        <option value="Standard-Wallbox" 
            <?php if($wallboxTyp == 'Standard-Wallbox') echo 'selected'; ?>>
            Standard-Wallbox
        </option>
        <option value="Bidirektionale Wallbox"
            <?php if($wallboxTyp == 'Bidirektionale Wallbox') echo 'selected'; ?>>
            Bidirektionale Wallbox
        </option>
    </select>
    <br><br>

    <!-- Förderung -->
    <label for="foerderungCheckbox">
        Förderung nutzen?
        <span class="help-tooltip"
              title="Falls es staatliche Förderungen gibt, können Sie hier einen Betrag eintragen.">?</span>
    </label>
    <input type="checkbox" id="foerderungCheckbox" name="foerderungCheckbox" value="1"
        <?php echo ($foerderungCheckbox === '1') ? 'checked' : ''; ?>><br>
    <input type="number" id="foerderungHoehe" name="foerderungHoehe"
           value="<?php echo esc_attr($foerderungHoehe); ?>"
           min="0" max="10000" placeholder="Förderungsbetrag (z.B. 1000)" step="0.01">
    <br><br>

    <input type="hidden" name="formularSeite" value="5">
    <div class="button-container">
        <button type="submit" name="navigation" value="zurueck" class="btn btn-back">
            &larr; Zurück
        </button>
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">
            Weiter &rarr;
        </button>
    </div>

    <!-- Hidden Inputs -->
    <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse);?>">
    <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche);?>">
    <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp);?>">
    <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung);?>">
    <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch);?>">
    <input type="hidden" name="personen" value="<?php echo esc_attr($personen);?>">
    <input type="hidden" name="speicherCheckbox" value="<?php echo esc_attr($speicherCheckbox);?>">
    <input type="hidden" name="wallboxCheckbox" value="<?php echo esc_attr($wallboxCheckbox);?>">
    <input type="hidden" name="foerderungCheckbox" value="<?php echo esc_attr($foerderungCheckbox);?>">
    <input type="hidden" name="speicherGroesse" value="<?php echo esc_attr($speicherGroesse);?>">
    <input type="hidden" name="wallboxTyp" value="<?php echo esc_attr($wallboxTyp);?>">
    <input type="hidden" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe);?>">
    <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname);?>">
    <input type="hidden" name="email" value="<?php echo esc_attr($email);?>">
    <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer);?>">
    <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz);?>">
</form>

<?php
// -----------------------------------
// Seite 6 (Modultypen)
// -----------------------------------
elseif ($formularSeite == 6) : ?>
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar6" style="width: 80%;"></div>
        <span class="progress-text">80%</span>
    </div>
    <h1>Modultyp wählen (v2)</h1>
    <h2>Wählen Sie das für Sie passende Modulpaket aus.</h2>

    <div class="module-cards">
        <!-- Basismodul -->
        <label class="module-card basismodul">
            <span class="help-tooltip" 
                  title="Budgetfreundlich, gute Leistung für kleinere Dächer.">?</span>
            <input type="radio" name="modultyp" value="Basismodul" required
                   <?php if($modultyp == 'Basismodul') echo 'checked'; ?>>
            <h3>Basismodul</h3>
            <ul>
                <li>Gute Leistung</li>
                <li>Günstiger Preis</li>
                <li>Zuverlässige Technologie</li>
                <li><strong>Ab 5.000 €</strong></li>
            </ul>
        </label>

        <!-- Premium-Modul -->
        <label class="module-card premiummodul">
            <span class="help-tooltip" 
                  title="Hohe Effizienz & Langlebigkeit, perfekt für größere Dächer.">?</span>
            <input type="radio" name="modultyp" value="Premium-Modul"
                   <?php if($modultyp == 'Premium-Modul') echo 'checked'; ?>>
            <h3>Premium-Modul</h3>
            <ul>
                <li>Höchste Effizienz</li>
                <li>Lange Garantien</li>
                <li>Bewährte Markenqualität</li>
                <li><strong>Ab 8.500 €</strong></li>
            </ul>
        </label>

        <!-- All-Inclusive-Modul -->
        <label class="module-card allincludemodul">
            <span class="help-tooltip" 
                  title="Rundum-sorglos, inkl. Service und maximaler Leistung.">?</span>
            <input type="radio" name="modultyp" value="All-Inclusive-Modul"
                   <?php if($modultyp == 'All-Inclusive-Modul') echo 'checked'; ?>>
            <h3>All-Inclusive-Modul</h3>
            <ul>
                <li>Maximale Leistung</li>
                <li>Alles aus einer Hand</li>
                <li>Erweiterte Services</li>
                <li><strong>Ab 12.000 €</strong></li>
            </ul>
        </label>
    </div><!-- .module-cards -->

    <input type="hidden" name="formularSeite" value="6">
    <div class="button-container">
        <button type="submit" name="navigation" value="zurueck" class="btn btn-back">
            &larr; Zurück
        </button>
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">
            Weiter &rarr;
        </button>
    </div>

    <!-- Hidden Inputs -->
    <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse);?>">
    <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche);?>">
    <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp);?>">
    <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung);?>">
    <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch);?>">
    <input type="hidden" name="personen" value="<?php echo esc_attr($personen);?>">
    <input type="hidden" name="speicherCheckbox" value="<?php echo esc_attr($speicherCheckbox);?>">
    <input type="hidden" name="wallboxCheckbox" value="<?php echo esc_attr($wallboxCheckbox);?>">
    <input type="hidden" name="foerderungCheckbox" value="<?php echo esc_attr($foerderungCheckbox);?>">
    <input type="hidden" name="speicherGroesse" value="<?php echo esc_attr($speicherGroesse);?>">
    <input type="hidden" name="wallboxTyp" value="<?php echo esc_attr($wallboxTyp);?>">
    <input type="hidden" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe);?>">
    <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname);?>">
    <input type="hidden" name="email" value="<?php echo esc_attr($email);?>">
    <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer);?>">
    <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz);?>">
</form>

<?php
// -----------------------------------
// Seite 7 (Berechnung & Bestätigung)
// -----------------------------------
elseif ($formularSeite == 7) :

    // Beispielhafte Berechnungen
    $wpProModul    = 0.0;
    $modulFlaeche  = 0.0;
    $modulanzahl   = 0;
    $preisProWp    = 0.0;
    $preisWallbox  = 0.0;
    $preisModule   = 0.0;
    $preisSpeicher = 0.0;
    $foerderung    = 0.0;

    // Modulleistung je nach Typ
    if ($modultyp === 'Basismodul') {
        $wpProModul   = 400.0;
        $modulFlaeche = 1.925;
    } elseif ($modultyp === 'Premium-Modul') {
        $wpProModul   = 500.0;
        $modulFlaeche = 2.225;
    } elseif ($modultyp === 'All-Inclusive-Modul') {
        $wpProModul   = 600.0;
        $modulFlaeche = 2.425;
    }

    // Modulanzahl abhängig von Dachfläche
    if ($dachflaeche >= 15) {
        $modulanzahl = floor($dachflaeche / $modulFlaeche);
    }

    // Preis pro Wp (Beispielstaffel)
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

    // Preis für alle Module
    $preisModule = $preisProWp * $modulanzahl * $wpProModul;

    // Wallbox
    if ($wallboxCheckbox === '1') {
        if ($wallboxTyp === 'Standard-Wallbox') {
            $preisWallbox = 1500;
        } elseif ($wallboxTyp === 'Bidirektionale Wallbox') {
            $preisWallbox = 3500;
        }
    }

    // Speicher
    if ($speicherCheckbox === '1') {
        // Beispiel: 475 € pro kWh
        $preisSpeicher = $speicherGroesse * 475;
    }

    // Förderung
    if ($foerderungCheckbox === '1') {
        $foerderung = $foerderungHoehe;
    }

    // Gesamtpreis
    $gesamtpreis = round($preisModule + $preisSpeicher + $preisWallbox - $foerderung, 2);

    ?>
<form method="POST" action="">
    <div class="progress-container">
        <div class="progress-bar7" style="width: 90%;"></div>
        <span class="progress-text">90%</span>
    </div>
    <h1>Bestätigung der Daten (v2)</h1>
    <h2>Prüfen Sie Ihre Angaben und die berechneten Optionen.</h2>

    <label>Vor- und Nachname: <?php echo esc_html($vornameNachname); ?></label><br>
    <label>E-Mail: <?php echo esc_html($email); ?></label><br>
    <label>Telefonnummer: <?php echo esc_html($telefonnummer); ?></label><br>
    <label>Adresse: <?php echo esc_html($adresse); ?></label><br>
    <label>Dachtyp: <?php echo esc_html($dachtyp); ?></label><br>
    <label>Dachneigung: <?php echo esc_html($dachneigung); ?>°</label><br>

    <label>Speicher:
        <?php 
        if ($speicherCheckbox === '1') {
            echo esc_html($speicherGroesse . " kWh");
        } else {
            echo "Kein Speicher";
        }
        ?>
    </label><br>

    <label>Ladeinfrastruktur:
        <?php
        if ($wallboxCheckbox === '1') {
            echo esc_html($wallboxTyp);
        } else {
            echo "Keine Wallbox";
        }
        ?>
    </label><br>

    <label>Förderung:
        <?php
        if ($foerderungCheckbox === '1') {
            echo esc_html($foerderungHoehe . " €");
        } else {
            echo "Keine Förderung";
        }
        ?>
    </label><br>

    <label>Modultyp: <?php echo esc_html($modultyp); ?></label><br>
    <label>Voraussichtliche Kosten: <?php echo esc_html($gesamtpreis . " €"); ?></label><br><br>

    <p><strong>Nächste Schritte:</strong><br>
       Nach Absenden Ihrer Anfrage kontaktieren wir Sie zeitnah per E-Mail oder Telefon. 
       Die Installation erfolgt meist innerhalb von 4-6 Wochen nach Auftragserteilung. 
       Gerne beraten wir Sie auch bei technischen Fragen.
    </p>

    <input type="hidden" name="formularSeite" value="7">
    <div class="button-container">
        <button type="submit" name="navigation" value="zurueck" class="btn btn-back">
            &larr; Zurück
        </button>
        <button type="submit" name="navigation" value="weiter" class="btn btn-next">
            Abschließen und Bericht generieren
        </button>
    </div>

    <!-- Hidden Inputs -->
    <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse);?>">
    <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche);?>">
    <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp);?>">
    <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung);?>">
    <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch);?>">
    <input type="hidden" name="personen" value="<?php echo esc_attr($personen);?>">
    <input type="hidden" name="speicherCheckbox" value="<?php echo esc_attr($speicherCheckbox);?>">
    <input type="hidden" name="wallboxCheckbox" value="<?php echo esc_attr($wallboxCheckbox);?>">
    <input type="hidden" name="foerderungCheckbox" value="<?php echo esc_attr($foerderungCheckbox);?>">
    <input type="hidden" name="speicherGroesse" value="<?php echo esc_attr($speicherGroesse);?>">
    <input type="hidden" name="wallboxTyp" value="<?php echo esc_attr($wallboxTyp);?>">
    <input type="hidden" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe);?>">
    <input type="hidden" name="modultyp" value="<?php echo esc_attr($modultyp);?>">
    <input type="hidden" name="gesamtpreis" value="<?php echo esc_attr($gesamtpreis);?>">
    <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname);?>">
    <input type="hidden" name="email" value="<?php echo esc_attr($email);?>">
    <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer);?>">
    <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz);?>">
</form>

<?php
// -----------------------------------
// Seite 8 (Ende)
// -----------------------------------
elseif ($formularSeite == 8) :
    // Beispielhaftes Speichern in DB (nur wenn Datenschutz = '1'):
    if ($datenschutz === '1') {
        global $wpdb;
        $AssistentenDB_v2 = $wpdb->prefix . 'AssistentenDB_v2';  // Eigene Tabelle für Version 2
        $wpdb->insert(
            $AssistentenDB_v2,
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
    <h1>Ihr persönliches Angebot wurde erstellt! (v2)</h1>
    <h2>Sie können den Bericht jetzt herunterladen oder sich per E-Mail zusenden lassen.</h2>

    <input type="submit" value="Bericht herunterladen" class="btn-small"><br><br>
    <input type="submit" value="An E-Mail schicken" class="btn-small"><br><br>

    <input type="hidden" name="formularSeite" value="8">

    <h2>Vielen Dank, dass Sie unseren Konfigurator genutzt haben! 
        Unser Team steht Ihnen bei weiteren Fragen gern zur Verfügung.</h2>
    <br><br>

    <!-- Button: Zur Startseite -->
    <button type="submit" name="redirect" class="btn btn-next">
        Zur Startseite
    </button>

    <!-- Button: Neu starten => reset=1 -->
    <button type="submit" name="resetCalculator" class="btn btn-back">
        Neu starten
    </button>

    <!-- Hidden Inputs (falls noch relevant) -->
    <input type="hidden" name="adresse" value="<?php echo esc_attr($adresse);?>">
    <input type="hidden" name="dachflaeche" value="<?php echo esc_attr($dachflaeche);?>">
    <input type="hidden" name="dachtyp" value="<?php echo esc_attr($dachtyp);?>">
    <input type="hidden" name="dachneigung" value="<?php echo intval($dachneigung);?>">
    <input type="hidden" name="stromverbrauch" value="<?php echo esc_attr($stromverbrauch);?>">
    <input type="hidden" name="personen" value="<?php echo esc_attr($personen);?>">
    <input type="hidden" name="speicherCheckbox" value="<?php echo esc_attr($speicherCheckbox);?>">
    <input type="hidden" name="wallboxCheckbox" value="<?php echo esc_attr($wallboxCheckbox);?>">
    <input type="hidden" name="foerderungCheckbox" value="<?php echo esc_attr($foerderungCheckbox);?>">
    <input type="hidden" name="speicherGroesse" value="<?php echo esc_attr($speicherGroesse);?>">
    <input type="hidden" name="wallboxTyp" value="<?php echo esc_attr($wallboxTyp);?>">
    <input type="hidden" name="foerderungHoehe" value="<?php echo esc_attr($foerderungHoehe);?>">
    <input type="hidden" name="modultyp" value="<?php echo esc_attr($modultyp);?>">
    <input type="hidden" name="gesamtpreis" value="<?php echo esc_attr($gesamtpreis);?>">
    <input type="hidden" name="vornameNachname" value="<?php echo esc_attr($vornameNachname);?>">
    <input type="hidden" name="email" value="<?php echo esc_attr($email);?>">
    <input type="hidden" name="telefonnummer" value="<?php echo esc_attr($telefonnummer);?>">
    <input type="hidden" name="datenschutz" value="<?php echo esc_attr($datenschutz);?>">
</form>
<?php endif; ?>

</body>
</html>
<?php

    // Gesamte HTML-Ausgabe zurückgeben
    return ob_get_clean();
}

// Shortcode in WP registrieren
add_shortcode('solarkonfigurator_v2', 'solarkonfigurator_v2_shortcode');
?>
