Hallo, om gebruik te kunnen maken van deze project moet je:
- start APACHE en MYSQL (in XAMPP)
- Git clone bestand naar htdocs
- Kopieër de .env example maak een nieuw .env bestand aan en plak het daarin
- Wijzig de database naam naar de projectnaam in de .env: DB_DATABASE= "projectnaam"
- Open command prompt in dit projectbestand
- Composer install (als dat niet werkt update)
- Type php artisan key:generate
- Type php artisan migrate
- Type php artisan db:seed
- Type php artisan serve
- Kopieër de http poort in de browser.

ACCOUNTS:

Gebruikersnaam: admin
Wachtwoord: 12345678

Gebruikersnaam: medewerker
Wachtwoord: 12345678
