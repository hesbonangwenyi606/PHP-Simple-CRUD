# PHP Simple CRUD (SQLite)

Small example PHP project (no frameworks) demonstrating a Tasks CRUD app using SQLite and PDO.

## Requirements
- PHP 7.4+ with PDO SQLite enabled.

## Run locally (built-in server)
1. Initialize database:
   ```bash
   php init.php
   ```
2. Start built-in server (from project root):
   ```bash
   php -S localhost:8000 -t public
   ```
3. Open http://localhost:8000 in your browser.

## Project structure
- `public/` - public document root (index.php, assets)
- `src/` - PHP classes (Database, Task)
- `templates/` - shared header/footer
- `init.php` - create and seed the SQLite database
- `data/database.sqlite` - SQLite file (created after running init.php)
