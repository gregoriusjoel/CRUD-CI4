# 🎵 Spotify Gallery - CRUD CodeIgniter 4

Aplikasi **CRUD Gallery** sederhana dengan tema Spotify menggunakan **CodeIgniter 4** dan **Bootstrap 5**. Aplikasi ini memungkinkan kamu untuk menambahkan, menampilkan, mengedit, dan menghapus gambar album lagu beserta judul dan penyanyi.

## ✨ Fitur

* Tambah gambar beserta judul lagu dan penyanyi
* Tampilkan galeri dengan UI modern dan animasi smooth
* Edit data lagu
* Hapus data

## 📦 Requirements

* PHP 8.1 atau lebih baru
* MySQL / MariaDB
* XAMPP / Laragon / Apache server
* Composer (jika ingin menjalankan dengan `php spark serve`)

## 🚀 Cara Install dan Menjalankan

1. **Aktifkan Apache dan MySQL**
   Buka XAMPP, Laragon, atau software serupa, lalu aktifkan **Apache** dan **MySQL**.

2. **Salin Project ke Direktori Web Server**

   ```bash
   cd C:/xampp/htdocs
   git clone https://github.com/username/ujian_sismul.git
   ```

3. **Buat Database dan Tabel**
   Akses `http://localhost/phpmyadmin`, lalu jalankan SQL berikut:

   ```sql
   CREATE DATABASE ujian_sismul;
   USE ujian_sismul;

   CREATE TABLE gallery (
     id INT AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR(255) NOT NULL,
     artist VARCHAR(255) NOT NULL,
     image VARCHAR(255) NOT NULL,
     created_at DATETIME DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. **Sesuaikan Konfigurasi Database**
   Buka file `.env` di root project, lalu ubah konfigurasi database seperti ini:

   ```ini
   database.default.hostname = localhost
   database.default.database = ujian_sismul
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

5. **Buat Folder Uploads**

   ```bash
   cd ujian_sismul/public
   mkdir uploads
   chmod 777 uploads
   ```

6. **Jalankan Aplikasi**

   * Jika menggunakan **XAMPP**, akses lewat browser:
     [http://localhost/ujian\_sismul/public/gallery](http://localhost/ujian_sismul/public/gallery)

   * Jika menggunakan **CLI (Spark)**:

     ```bash
     cd ujian_sismul
     php spark serve
     ```

     Lalu buka: [http://localhost:8080/gallery](http://localhost:8080/gallery)
