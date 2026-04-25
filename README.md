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


Untuk soal interview kayak gini,deadline 24 jam setelah soal ini diberikan:
echnical Requirements

Pastikan Anda menggunakan teknologi berikut:

PHP 8.xx

Laravel 11

Composer 2.7.x

Database: PostgreSQL/MySQL

Skenario Aplikasi

Anda diberikan tugas untuk membuat sebuah aplikasi MANAJEMEN TOKO dengan fitur-fitur

sebagai berikut:

1. Super Admin

Terdapat super admin yang dapat:

Membuat dan mengelola toko

Mengelola admin dan kasir

2. Level Toko

Toko memiliki 3 level:

1. Toko Pusat

2. Toko Cabang

3. Toko Retail

3. Auto-Generate Users

Setiap toko yang dibuat akan otomatis membuat 2 user dengan role sebagai berikut:

Admin

Hak akses Admin:

Dapat CRUD akun Kasir
Dapat CRUD akun Kasir

Dapat CRUD Produk

Dapat mengubah data dirinya sendiri

Dapat melihat data penjualan

Kasir

Hak akses Kasir:

Dapat melihat detail produk

Dapat melakukan penjualan produk

Dapat mengubah data dirinya sendiri

Dapat melihat data penjualan

4. Sistem Penjualan

Toko dapat melakukan penjualan dengan:

Metode cart sederhana

Pembayaran sederhana

Catatan: Produk tidak memiliki stok/qty, sehingga jumlah pembelian tidak ada batasan khusus

5. Data Display

Data yang ditampilkan harus:

Memiliki pagination

Dapat dilakukan pencarian

Catatan Penting

A 1. Gunakan JWT sebagai autentikasi

2. Akun login menggunakan email dan password
Tugas Anda

Mandatory (Wajib)

1. Rancang database dan buat ERD

3. Buat Model, Controller, Migration dan Seeder

4. Buat Dokumentasi (API dan/atau Requirement)

Optional (Opsional)

5. Buat Unit Test

6. Buat User Interface

Pastikan kode Anda Clean and Efficient!
