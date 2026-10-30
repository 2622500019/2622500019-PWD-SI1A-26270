# pertemuan-07 Pemrosesan Formulir dengan PHP,  Validasi Sisi Peladen, dan PRG

## Deskripsi 

Dokumentasi pengembangan halaman Profil Mahasiswa pada P7. Artefak P6 digunakan sebagai baseline, lalu dikembangkan agar formulir Kontak dapat mengirim dan memproses data menggunakan PHP: metode GET dan POST, validasi sisi peladen, pengamanan keluaran HTML dengan htmlspecialchars(), penggunaan session, dan pola Post-Redirect-Get (PRG). Penyimpanan data ke basis data tidak termasuk dalam P7.

## Fitur dan Pengembangan 
1. Baseline P6: Artefak P6 (index.php, style.css, script.js, aset gambar) disalin ke pertemuan-07/ tanpa mengubah folder P6.
2. Penerimaan GET ($_GET): PHP membaca parameter nama dari URL dan menampilkannya dengan htmlspecialchars().
3. Pengiriman formulir GET: Menambahkan contactForm.submit(); pada script.js setelah validasi JavaScript berhasil, sehingga formulir benar-benar terkirim.
4. Demonstrasi GET (indexGet.php): Salinan index.php disimpan sebagai pembanding dengan action="indexGet.php" dan method="get".
5. Formulir utama POST: Atribut method pada index.php diubah menjadi post.
6. Penerimaan POST ($_POST): Membaca seluruh input formulir. Checkbox minat diubah menjadi name="minat[]" agar diterima sebagai larik, dan selector JavaScript disesuaikan agar mendukung minat dan minat[].
7. Validasi sisi peladen: Pemeriksaan kelengkapan, format email dan semester (1 sampai 14), serta kesesuaian nilai pilihan (jenis pesan, program studi, minat) dengan daftar yang diizinkan.
8. Pengamanan keluaran: Seluruh data yang ditampilkan kembali dibungkus htmlspecialchars(), dan pesan memakai nl2br() setelah diamankan.
## Pengujian 
[Fitur yang diuji]: [Langkah pengujian dan hasil aktual.] 
[Fitur yang diuji]: [Langkah pengujian dan hasil aktual.] 
Perbarui bagian ini setelah melakukan pengujian atau debugging yang relevan. 
## Riwayat Pengembangan 
Catat perkembangan melalui commit Git yang bermakna. 
[Pesan commit]: [Ringkasan perubahan dan hasil pengujiannya.] 
[Pesan commit]: [Ringkasan perubahan dan hasil pengujiannya.]