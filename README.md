# Veikala Pasūtījumu Sistēma

Šis ir mācību projekts, kas paredzēts klientu un to pasūtījumu pārvaldībai.

## Funkcionalitāte
* **Klientu saraksts:** Pārskatīt visus reģistrētos klientus.
* **Pasūtījumu apskate:** Apskatīt konkrēta klienta veiktos pasūtījumus.
* **Hierarhiskais skats:** Izmantojot parametru `with-orders=full`, var redzēt visus klientus un viņu pasūtījumus vienuviet.

## Projekta Struktūra
* `db/` - Datubāzes savienojuma klase (`DB.php`) un konfigurācija.
* `public/` - Lietotāja ieejas punkts (`index.php`).
* `src/controllers/` - Biznesa loģika (Customer un Order kontrolieri).
* `src/views/` - HTML izvades faili.
* `.env` / `config.php` - Sensitīvie dati (netiek glabāti Git).

## Uzstādīšana
1. Noklonējiet repozitoriju.
2. Izveidojiet `db/config.php` failu, izmantojot `config.example.php` kā paraugu.
3. Norādiet savus datubāzes pieslēgšanās datus (host, dbname, user, password).
4. Importējiet `db/script.sql` failu savā MySQL serverī.
5. Atveriet `public/index.php` pārlūkprogrammā.