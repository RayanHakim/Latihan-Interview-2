---
## Technical Requirements
Pastikan Anda menggunakan teknologi berikut:
* PHP 8.3 (Minimum 8.2)
* Laravel 11
* Composer 2.7.x
* Database: SQLite (Default) / PostgreSQL / MySQL
* Filament PHP v3

---

## 🚀 Installation Guide

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda:

### 1. Clone Repository
```bash
git clone [https://github.com/USERNAME_KAMU/Latihan-Interview-2.git](https://github.com/USERNAME_KAMU/Latihan-Interview-2.git)
cd Latihan-Interview-2
2. Install Dependencies
Bash
composer install
3. Environment Setup
Salin file .env.example menjadi .env dan generate application key:

Bash
cp .env.example .env
php artisan key:generate
4. Database Configuration
Project ini menggunakan SQLite. Pastikan file database sudah ada:

Bash
# Untuk Windows (PowerShell)
New-Item -Path database/database.sqlite -ItemType File
Lalu jalankan migrasi dan seeder:

Bash
php artisan migrate
5. Create Super Admin (Filament)
Buat user untuk mengakses dashboard admin:

Bash
php artisan make:filament-user
6. Run Application
Bash
php artisan serve
Akses dashboard di: http://127.0.0.1:8000/admin
```bash
tes

