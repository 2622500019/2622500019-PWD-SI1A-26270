# pertemuan-11 Analisis Kebutuhan Data dan Dasar MySQL Satu Tabel

## Deskripsi
Pertemuan 11 membahas cara menghubungkan PHP dengan MySQL menggunakan MySQLi, lalu mengambil data dari basis data dengan operasi READ (SELECT) dan menampilkannya di halaman web. Proyek ini melanjutkan artefak dari Pertemuan 10, jadi tampilan profil, navigasi, dan formulir Kontak tetap dipertahankan. Bedanya, bagian hasil kontak yang tadinya memakai data session sekarang mengambil data dari tabel `tbl_kontak_2622500019` di basis data `db_pwd_2622500019`.

## Fitur dan Pengembangan
- Baseline P10: Menyalin semua berkas dan folder `pertemuan-10` ke `pertemuan-11` sebagai titik awal. Folder P10 tidak diubah.
- Persiapan lingkungan: Menjalankan Laragon (Start All), memastikan Apache dan MySQL aktif, lalu mengecek basis data dan tabel di phpMyAdmin.
- `koneksi.php`: Berkas baru berisi parameter koneksi (host, user, password, database), `mysqli_report(MYSQLI_REPORT_OFF)`, `mysqli_connect()`, dan pengecekan `if (!$koneksi)` dengan `die()` kalau koneksi gagal.
- Integrasi ke `index.php`: Memuat `fungsi.php` dan `koneksi.php` dengan `require_once()`. `session_start()` dimatikan karena data sekarang diambil dari basis data.
- Kueri SELECT: Menulis `SELECT * FROM tbl_kontak_2622500019`, menjalankannya dengan `mysqli_query()`, dan menambah pengecekan kalau kueri gagal.
- Mengambil data: Memakai `mysqli_fetch_assoc()` di dalam `while` untuk memasukkan semua baris ke larik `$dataKontak`.
- Menampilkan data: Memakai `foreach` untuk menampilkan setiap kontak di dalam `<article id="hasilKontak">`. Setiap atribut dibungkus `bersihkan()` (`htmlspecialchars`), dan atribut pesan memakai `nl2br()`.
- Data kosong: Menambah `if (count($dataKontak) > 0) ... else`, supaya muncul tulisan "Belum ada data kontak yang tersimpan." kalau tabel kosong.
- Ekspor basis data: Mengekspor `db_pwd_2622500019` lewat phpMyAdmin (metode Quick, format SQL) dan menaruh hasilnya di `pertemuan-11`.

## Pengujian
- Baseline P10: Membuka `localhost/pwd/.../pertemuan-10/` dan `pertemuan-11/`. Tampilan profil, navigasi, dan formulir tampil seperti di P10.
- Basis data dan tabel: Membuka phpMyAdmin, memilih `db_pwd_2622500019`, lalu mengecek tab Structure dan Browse. Tabel punya 9 kolom (id, nama, email, semester, tanggal, jenis_pesan, minat, prodi, pesan) dan berisi 2 data kontak.
- Koneksi berhasil: Membuat `uji_koneksi.php` sementara berisi `require_once("koneksi.php")` dan `echo`. Halaman menampilkan "Koneksi ke basis data berhasil." Setelah itu berkasnya dihapus.
- Koneksi gagal: Mengubah `$database` menjadi `db_tidak_tersedia`. Muncul warning "Unknown database" dan pesan "Koneksi ke basis data gagal." Setelah itu nama basis data dikembalikan ke yang benar dan pesan gagal tidak muncul lagi.
- Integrasi di halaman utama: Membuka `index.php` lewat browser. Halaman tampil normal tanpa pesan gagal koneksi.
- Kueri gagal: Mengubah nama tabel jadi `tbl_tabel_tidak_tersedia`. Muncul pesan "Kueri SELECT gagal dijalankan." Setelah itu nama tabel dikembalikan.
- `var_dump($dataKontak)`: Hasilnya berupa larik berisi 2 elemen, dan tiap elemen punya indeks sesuai nama kolom. Kode `var_dump` lalu dikomentari agar tidak muncul di halaman.
- Tampil data: Dua data kontak tampil di bagian "Data Kontak dari Basis Data" dengan nilai yang sesuai.
- Data kosong: Mengosongkan tabel lewat phpMyAdmin. Muncul tulisan "Belum ada data kontak yang tersimpan." Setelah itu data awal dimasukkan lagi lewat Import/SQL.
- Berkas ekspor: Membuka `db_pwd_2622500019.sql` di VS Code. Ada perintah `CREATE TABLE` dan `INSERT INTO` untuk data kontak.

## Riwayat Pengembangan
- menyalin artefak pertemuan-10 ke pertemuan-11 sebagai baseline: Menyalin semua berkas P10 ke folder P11, lalu mengecek aplikasi masih jalan.
- menyiapkan direktori dan lingkungan pengembangan pertemuan-11: Menjalankan Apache dan MySQL di Laragon, lalu mengecek lokasi folder dan kelengkapan berkas.
- memeriksa kesiapan basis data dan tabel kontak P11: Mengecek basis data dan tabel kontak di phpMyAdmin.
- membuat berkas koneksi PHP-MySQL P11: Membuat `koneksi.php` kosong di folder yang sama dengan `index.php`.
- menentukan parameter koneksi basis data P11: Menulis host, user, password, dan nama database di `koneksi.php`.
- mengatur pelaporan kesalahan MySQLi P11: Menambah `mysqli_report(MYSQLI_REPORT_OFF)`.
- mengimplementasikan koneksi PHP-MySQL menggunakan MySQLi: Menambah `mysqli_connect()` dan pengecekan koneksi dengan `die()`.
- menguji koneksi dari PHP ke MySQL dengan file sementara Bernama uji_koneksi.php: Koneksi berhasil, file sementara dihapus setelah dites.
- menguji penanganan kegagalan koneksi PHP-MySQL: Koneksi gagal dites dengan nama database salah, lalu dikembalikan ke yang benar.
- menyiapkan pemuatan berkas koneksi pada P11: Mengecek penulisan `require_once("koneksi.php")`.
- mengintegrasikan berkas koneksi pada index P11: Menambah `require_once` untuk `koneksi.php` di `index.php`.
- memeriksa alur ketersediaan koneksi pada index P11: Memastikan `koneksi.php` dimuat sebelum kode yang memakai `$koneksi`.
- menguji integrasi koneksi PHP-MySQL pada index P11: Halaman utama bisa dibuka tanpa pesan gagal koneksi.
- menentukan kueri SELECT data kontak: Menambah variabel `$sql`.
- menjalankan kueri SELECT menggunakan MySQLi: Menambah `mysqli_query()` dan variabel `$hasil`.
- menambahkan pemeriksaan kegagalan kueri SELECT: Menambah `if (!$hasil)` dan menguji dengan nama tabel yang salah.
- mengambil hasil SELECT menggunakan mysqli_fetch_assoc: Menambah perulangan `while` untuk mengisi `$dataKontak`.
- memeriksa hasil pengambilan data kontak: Mengecek isi larik dengan `var_dump()`, lalu dikomentari.
- Menampilkan data kontak dari basis data: Menampilkan data dengan `foreach`, `bersihkan()`, `nl2br()`, dan pesan kalau data kosong.
- Menambahkan ekspor basis data praktikum: Mengekspor basis data dan menaruh berkas SQL di folder `pertemuan-11`.