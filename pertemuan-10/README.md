# pertemuan-10: Analisis Kebutuhan Data dan Dasar MySQL Satu Tabel

## Deskripsi
Dokumentasi pengembangan P10 yang melanjutkan artefak P9 (formulir Kontak berbasis PHP).
Fokusnya adalah analisis kebutuhan data, perancangan satu tabel MySQL, pembuatan basis data
dan tabel melalui phpMyAdmin, pemasukan data awal, serta ekspor struktur dan data ke berkas SQL.
Integrasi PHP dengan MySQL belum dibahas pada pertemuan ini.

## Fitur dan Pengembangan
- **Baseline P10**: Seluruh artefak `pertemuan-09` (`index.php`, `fungsi.php`, `script.js`, `style.css`,
  `README.md`, `img/foto-profil.jpg`) disalin ke `pertemuan-10` tanpa mengubah P9.
- **Lingkungan**: Apache dan MySQL dijalankan melalui Laragon (Start All). Proyek berada di direktori
  `pertemuan-10` pada folder web Laragon dan dapat diakses melalui `localhost`.
- **Analisis data formulir**: Formulir Kontak memiliki delapan data:

| No | Data | Atribut name | Jenis Input |
|----|------|--------------|-------------|
| 1 | Nama lengkap | nama | Text |
| 2 | Email | email | Email |
| 3 | Semester | semester | Number |
| 4 | Tanggal kunjungan | tanggal | Date |
| 5 | Jenis pesan | jenis_pesan | Radio |
| 6 | Topik yang diminati | minat[] | Checkbox |
| 7 | Program studi | prodi | Select |
| 8 | Pesan | pesan | Textarea |

  Informasi profil (NIM, nama mahasiswa, program studi pada bagian profil) tidak termasuk data formulir
  dan tidak disimpan.
- **Representasi `minat`**: Checkbox `minat[]` dapat mengirim lebih dari satu nilai (larik di PHP).
  Karena memakai satu tabel, pilihan disimpan dalam satu kolom sebagai teks dipisah koma:

| Pilihan Pengguna | Nilai yang Disimpan |
|------------------|---------------------|
| HTML | HTML |
| CSS | CSS |
| HTML dan CSS | HTML, CSS |

  Ini penyederhanaan untuk pembelajaran, bukan bentuk normalisasi yang ideal.
- **Basis data dan tabel**: `db_pwd_2622500019` dan `tbl_kontak_2622500019`.
- **Struktur tabel (9 atribut)**:

| No | Atribut | Tipe Data | Ketentuan |
|----|---------|-----------|-----------|
| 1 | id | INT | PRIMARY KEY, AUTO_INCREMENT |
| 2 | nama | VARCHAR(50) | - |
| 3 | email | VARCHAR(255) | - |
| 4 | semester | TINYINT | - |
| 5 | tanggal | DATE | - |
| 6 | jenis_pesan | VARCHAR(20) | - |
| 7 | minat | VARCHAR(50) | - |
| 8 | prodi | VARCHAR(2) | - |
| 9 | pesan | VARCHAR(300) | - |

- **Perintah SQL (DDL)**:

```sql
CREATE DATABASE db_pwd_2622500019;
USE db_pwd_2622500019;
CREATE TABLE tbl_kontak_2622500019 (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50),
    email VARCHAR(255),
    semester TINYINT,
    tanggal DATE,
    jenis_pesan VARCHAR(20),
    minat VARCHAR(50),
    prodi VARCHAR(2),
    pesan VARCHAR(300)
);
```

- **Data awal**: Dua baris data. Baris 1 dimasukkan melalui fasilitas Insert phpMyAdmin
  (semester 2, tanggal 2026-11-15, jenis_pesan saran, minat `HTML, CSS`, prodi TI). Baris 2 dimasukkan
  dengan perintah SQL `INSERT` (Andi, andi@example.com, semester 2, 2026-11-15, pertanyaan,
  `HTML, CSS`, TI). Kolom `id` dikosongkan dan terisi otomatis oleh AUTO_INCREMENT.
- **Ekspor**: Metode Quick, format SQL, disimpan sebagai `db_pwd_2622500019.sql` dan dipindahkan ke
  `pertemuan-10\`.

## Pengujian
- **Baseline P9**: Berkas P9 tersalin lengkap ke `pertemuan-10`. Halaman dibuka melalui `localhost`;
  tampilan dan fitur formulir (validasi JavaScript, hasil kiriman lewat session) berfungsi seperti P9.
- **Laragon**: Setelah Start All, Apache dan MySQL berstatus started (port 80/443 dan 3306).
  Aplikasi P10 dapat diakses melalui `localhost`.
- **phpMyAdmin**: Dibuka melalui `http://localhost/phpmyadmin/`. Login dengan Username `root` dan
  Password kosong berhasil, antarmuka pengelolaan MySQL tampil.
- **Basis data dan tabel**: `db_pwd_2622500019` muncul pada daftar basis data. Tabel
  `tbl_kontak_2622500019` berhasil dibuat dengan 9 kolom.
- **Struktur tabel**: Tab Structure dan `DESCRIBE tbl_kontak_2622500019;` menunjukkan sembilan atribut
  sesuai rancangan. `id` bertipe int dengan Key PRI dan Extra auto_increment. Tipe dan panjang
  VARCHAR sesuai rancangan. Tidak ada ketidaksesuaian.
- **Data awal (Browse)**: Insert menampilkan "1 row inserted". Browse menampilkan 2 baris dengan id 1
  dan 2 terbentuk otomatis. Nilai `minat` tampil sebagai teks `HTML, CSS`, tidak ada data hilang atau
  berubah.
- **Kesesuaian data**: Nilai `semester`, `tanggal` (format tanggal), `jenis_pesan` (saran/pertanyaan),
  `minat` (HTML, CSS), dan `prodi` (TI) sesuai ketentuan formulir P9. Tidak ada perbaikan data.
- **Berkas ekspor SQL**: `db_pwd_2622500019.sql` ada di `pertemuan-10\`. Saat dibuka di VS Code,
  `CREATE TABLE` memuat sembilan kolom sesuai rancangan dan `INSERT INTO` memuat dua baris data yang
  cocok dengan tampilan Browse.
- **Artefak P9**: Direktori `pertemuan-09` tidak diubah.

## Riwayat Pengembangan
- `menyalin artefak pertemuan-09 ke pertemuan-10 sebagai baseline`: Berkas P9 disalin, aplikasi berjalan normal.
- `menyiapkan direktori dan lingkungan pengembangan pertemuan-10`: Struktur direktori dan layanan Laragon siap.
- `memeriksa kesiapan phpMyAdmin dan repositori pertemuan-10`: phpMyAdmin terhubung ke MySQL.
- `mengidentifikasi kebutuhan data formulir kontak P10`: Delapan data formulir teridentifikasi.
- `menentukan data formulir yang akan disimpan ke basis data`: Delapan atribut dipilih, data profil tidak disimpan.
- `menentukan representasi data pilihan minat`: Pilihan minat disimpan sebagai teks dipisah koma.
- `menentukan nama basis data dan tabel P10`: `db_pwd_2622500019` dan `tbl_kontak_2622500019`.
- `merancang atribut dan tipe data tabel kontak`: Delapan atribut beserta tipe datanya ditetapkan.
- `menentukan primary key dan auto increment tabel kontak`: `id` INT, PRIMARY KEY, AUTO_INCREMENT.
- `memeriksa rancangan akhir struktur tabel kontak`: Sembilan atribut diperiksa dan sesuai.
- `memasukkan data awal ke tabel kontak`: Satu baris dimasukkan lewat fasilitas Insert.
- `mempelajari perintah SQL insert`: Satu baris tambahan dimasukkan lewat perintah `INSERT`.
- `memeriksa data awal pada tabel kontak`: Browse menampilkan dua baris dengan id otomatis.
- `memeriksa dan memperbaiki data awal tabel kontak`: Data sesuai ketentuan, tidak perlu perbaikan.
- `menentukan pengaturan ekspor basis data`: Export method Quick, format SQL.
- `mengekspor basis data ke berkas SQL`: `db_pwd_2622500019.sql` disimpan di `pertemuan-10\`.
- `memeriksa kelengkapan berkas ekspor SQL`: `CREATE TABLE` dan `INSERT INTO` lengkap dan cocok dengan Browse.