<?php 
// konfigurasi koneksi ke basis data MySQL.
$host = "localhost";
$user = "root";
$password = "";
$database = "db_pwd_2622500019";

// membuat koneksi PHP dengan MySQL menggunakan MySQLi.
mysqli_report(MYSQLI_REPORT_OFF);
$koneksi = mysqli_connect($host, $user, $password, $database);

//memeriksa keberhasilan koneksi.
if (!$koneksi) {
die("koneksi ke basis data gagal.");
}