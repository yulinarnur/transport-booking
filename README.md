# Informasi Akun

## Admin
- **Email:** admin@gmail.com
- **Password:** 12345678
- **Role:** admin

## Supervisor 1
- **Email:** supervior@gmail.com
- **Name:** Supervisor 1
- **Password:** 12345678
- **Role:** supervisor

## Supervisor 2
- **Email:** supervisor2@gmail.com
- **Name:** Supervisor 2
- **Password:** 12345678
- **Role:** supervisor

## Manajer
- **Email:** manajer@gmail.com
- **Password:** 12345678
- **Role:** manajer

---

# Teknologi yang Digunakan

- **Database Version:** 10.4.28-MariaDB 
- **PHP Version:** PHP 8.1
- **Framework:** Laravel 10.10

---

# Transport Booking Web Application

Aplikasi web transportasi oleh yulinarnur.

## Pengaturan dan Instalasi

**1. Clone Repository**
`git clone https://github.com/yulinarnur/transport-booking.git`


**2. Siapkan file .env**
- Duplikat `.env.example` dan ganti namanya menjadi `.env`.
- Ubah `DB_DATABASE=laravel` menjadi `DB_DATABASE=db_transport_monitoring`.

**3. Buat Database**
- Buat database dengan nama `db_transport_monitoring`.

**4. Instal Dependensi**
- Jalankan :
-  `composer update`,
-  `npm install`,
-  `npm run dev`
  
**5. Setup Aplikasi dengan jalankan:**
- `php artisan key:generate` dan `php artisan migrate`

*Catatan: Cara lain bisa dilakukan dengan mengimpor database file `.sql` yang ada di folder `database` sebagai cara lain dari `php artisan migrate`.*

**6. Jalankan Aplikasi**
`php artisan serve`

