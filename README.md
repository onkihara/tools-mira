# Mira

Eine kleine Laravel-Anwendung, mit der du ein eigenes Dobble-Set konfigurieren, mit Bildern versehen, prüfen und druckfertig aufbereiten kannst.

## Voraussetzungen

- PHP 8.3 oder neuer
- Composer
- Node.js und npm

## Lokal starten

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan serve
```

Rufe anschließend die von Artisan angezeigte lokale Adresse im Browser auf.

## Verwendung

1. Wähle eine unterstützte Primordnung (2, 3, 5 oder 7), eine Kartenanzahl und den Druckradius.
2. Weise jedem verwendeten Symbol einen Namen und ein PNG-, JPEG- oder WebP-Bild zu. Uploads sind auf 5 MB begrenzt und bleiben in privatem Sitzungsspeicher.
3. Prüfe die Kartenübersicht. Fehlende Bilder verhindern den Druck; niedrige Auflösung und stark abweichende Seitenverhältnisse werden markiert.
4. Öffne die Druckansicht und wähle im Druckdialog „Als PDF speichern“.

Die vollständigen Sets enthalten bei Ordnung 5 insgesamt 31 Karten mit je 6 Symbolen und bei Ordnung 7 insgesamt 57 Karten mit je 8 Symbolen. Es können jeweils weniger Karten aus dem vollständigen Set verwendet werden. Die Set-Konfiguration und Bildzuordnungen sind sitzungsgebunden und werden nicht dauerhaft als Projekt gespeichert.

## Tests

```bash
php artisan test
```

Die Generator-Tests prüfen die Kartenpaare auf genau ein gemeinsames Symbol.
