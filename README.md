
# **PV-Portal**

Ein WordPress-Projekt für die Entwicklung einer professionellen Webseite und eines Kalkulations-Assistenten für ein fiktives Photovoltaik-Unternehmen. Dieses Repository enthält alle notwendigen Dateien, um das Projekt lokal einzurichten und gemeinsam zu entwickeln.

---

## **Inhaltsverzeichnis**
1. [Voraussetzungen](#voraussetzungen)
2. [Installation](#installation)
   - [Lokale Umgebung einrichten](#lokale-umgebung-einrichten)
   - [Repository klonen](#repository-klonen)
   - [Datenbank einrichten](#datenbank-einrichten)
3. [Starten der lokalen Entwicklung](#starten-der-lokalen-entwicklung)
4. [Branch- und Workflow-Strategie](#branch--und-workflow-strategie)
5. [FAQ](#faq)

---

## **Voraussetzungen**

Stelle sicher, dass du die folgenden Tools installiert hast:

- [XAMPP](https://www.apachefriends.org/) oder [MAMP](https://www.mamp.info/) für die lokale Serverumgebung.
- [Git](https://git-scm.com/) für die Versionskontrolle.
- Einen Code-Editor wie [VS Code](https://code.visualstudio.com/).
- Einen Browser, um die lokale WordPress-Seite zu testen.

---

## **Installation**

### **1. Lokale Umgebung einrichten**
1. Lade [XAMPP](https://www.apachefriends.org/) herunter und installiere es.
2. Starte die Module **Apache** und **MySQL** über das XAMPP-Control-Panel.

---

### **2. Repository klonen**
1. Öffne dein Terminal und navigiere in das `htdocs`-Verzeichnis von XAMPP:
   ```bash
   cd /path/to/xampp/htdocs
   ```
2. Klone das Repository:
   ```bash
   git clone <repository-url>
   ```
3. Navigiere in den Ordner des geklonten Repositories:
   ```bash
   cd pv-portal
   ```

---

### **3. Datenbank einrichten**
1. Öffne [phpMyAdmin](http://localhost/phpmyadmin).
2. Erstelle eine neue Datenbank:
   - Gehe zu **Neue Datenbank**.
   - Gib den Namen `wordpress_pv` ein und klicke auf **Erstellen**.
3. Importiere die Datenbank:
   - Gehe zu **Importieren** und lade die Datei `wordpress_pv.sql` (falls bereitgestellt) hoch.

---

### **4. WordPress konfigurieren**
1. Öffne die Datei `wp-config.php` im Root-Verzeichnis des Projekts.
2. Passe die Datenbankdetails an:
   ```php
   define('DB_NAME', 'wordpress_pv');
   define('DB_USER', 'root'); // Standard-Benutzer bei XAMPP
   define('DB_PASSWORD', ''); // Passwort leer lassen bei XAMPP
   define('DB_HOST', 'localhost');
   ```
3. Speichere die Datei.

---

### **5. WordPress starten**
1. Öffne deinen Browser und gehe zu `http://localhost/pv-portal`.
2. Logge dich ins WordPress-Dashboard ein:
   - Benutzername: **admin**
   - Passwort: **password**
   - (Falls andere Zugangsdaten verwendet werden, sind sie im Team abgesprochen.)

---

## **Starten der lokalen Entwicklung**

1. **Themes bearbeiten:**
   - Alle Themes befinden sich im Ordner `wp-content/themes/`.
   - Bearbeite das Custom-Theme, z. B. `my-custom-theme/`.

2. **Plugins bearbeiten:**
   - Alle Plugins befinden sich im Ordner `wp-content/plugins/`.
   - Bearbeite den Kalkulations-Assistenten, z. B. `solar-calculator-plugin/`.

3. **Website testen:**
   - Navigiere zu `http://localhost/pv-portal` und überprüfe deine Änderungen.

---

## **Branch- und Workflow-Strategie**

### **Branch-Namen**
- **main**: Stabile Versionen des Projekts.
- **feature/<name>**: Entwicklung neuer Features.
- **bugfix/<name>**: Fehlerbehebungen.

### **Workflow**
1. **Neuen Branch erstellen:**
   ```bash
   git checkout -b feature/<feature-name>
   ```
2. **Änderungen vornehmen und committen:**
   ```bash
   git add .
   git commit -m "Beschreibung der Änderungen"
   ```
3. **Branch pushen:**
   ```bash
   git push origin feature/<feature-name>
   ```
4. **Pull Request erstellen:** Auf GitHub den Branch in `main` mergen.

---

## **FAQ**

### **1. Die lokale Seite lädt nicht. Was tun?**
- Stelle sicher, dass die Apache- und MySQL-Module in XAMPP laufen.
- Überprüfe die `wp-config.php`, ob die Datenbankdetails korrekt sind.

### **2. Fehler: „Fehler beim Aufbau einer Datenbankverbindung“**
- Überprüfe die Datenbankeinstellungen in der `wp-config.php`.
- Stelle sicher, dass die Datenbank in phpMyAdmin existiert.

### **3. Wie synchronisiere ich Änderungen?**
- Ziehe die neuesten Änderungen vom Remote-Repository:
  ```bash
  git pull origin main
  ```

---

Diese Anleitung sollte dein Team reibungslos durch die Einrichtung und Entwicklung führen! 🚀
