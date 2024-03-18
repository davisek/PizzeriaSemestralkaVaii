# Pizza app
Urobenie semestrálnej práce na predmete VAII podľa grafickej predlohy

Autor kódu: Dávid Barta

## Inštalácia
1. Naklonujte repozitár: `git clone https://github.com/davisek/PizzeriaSemestralkaVaii.git`
2. Inštalácia balíčkov: `composer install`
3. Nakonfigurujte .env súbor a spustite migrácie: `php artisan migrate`
4. Spustenie príkazu na seedovanie užívateľa a rolí: `php artisan db:seed --class=UsersTableSeeder`
5. Vykonanie príkazu na prepojenie obrázkov storage: `php artisan storage:link`

## Použítie
- Vygenerovanie kľúča: `php artisan key:generate`
- Spustite Laravel development server: `php artisan serve`
- Otvorte aplikáciu vo webovom prehliadači: http://localhost:8000
- Môžete si zaregistrovať užívateľa, alebo bol vytvorený admin, ktorý má prístup k ADMIN PAGE
- K ADMIN PAGE sa dostanete linkom http://localhost:8000/admin/login a prihlasovacie údaje pre admina sú:
  - Email: `admin@admin.com` a Heslo: `123456`
