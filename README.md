# 🎵 Spotify Gallery - CRUD CodeIgniter 4

Aplikasi **CRUD Gallery** sederhana dengan tema Spotify menggunakan **CodeIgniter 4** dan **Bootstrap 5**. Aplikasi ini memungkinkan kamu untuk menambahkan, menampilkan, mengedit, dan menghapus gambar album lagu beserta judul dan penyanyi.

## ✨ Fitur
- Tambah gambar beserta judul lagu dan penyanyi
- Tampilkan galeri dengan UI modern dan animasi smooth
- Edit data lagu
- Hapus data 

## 📦 Requirements
- PHP 8.1 atau lebih baru
- MySQL / MariaDB
- XAMPP / Laragon / Apache server
- Composer (jika ingin menjalankan dengan `php spark serve`)

## 🚀 Cara Install dan Menjalankan

```bash
# 1. Buka XAMPP dan aktifkan Apache & MySQL

# 2. Masuk ke direktori htdocs
cd C:/xampp/htdocs

# 3. Salin project ke dalam folder htdocs, misalnya: /ujian_sismul

# 4. Buat database di phpMyAdmin:
# Akses: http://localhost/phpmyadmin
# Jalankan query SQL berikut:
CREATE DATABASE ujian_sismul;

USE ujian_sismul;

CREATE TABLE gallery (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  artist VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

# 5. Edit file .env di root project dan sesuaikan koneksi database:
# Uncomment dan ubah bagian berikut:
database.default.hostname = localhost
database.default.database = ujian_sismul
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi

# 6. Buat folder uploads di public dan ubah permission-nya:
cd ujian_sismul/public
mkdir uploads
chmod 777 uploads

# 7. Jalankan project:
# Jika pakai XAMPP:
http://localhost/ujian_sismul/public/gallery

# Jika pakai spark:
cd ../../ujian_sismul
php spark serve
# Akses di browser:
http://localhost:8080/gallery
