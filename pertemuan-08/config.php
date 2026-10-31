<?php
session_start();

// P6: PHP dasar dan pemrograman sisi peladen 
// Bagian 1: Variabel dan konstanta 
$nim = "2622500019"; 
$namaMahasiswa = "Dewangga Anugraha"; 
$programStudi = "SI"; 
$tahunAkademik = "2026/2027"; 
$semester = 1; 
$ipk = 4.00; 
$statusAktif = true; 
$catatanTambahan = null;
const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "satpamal";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "sesuai rentang" : "perlu diperiksa";

// Bagian 3: percabangan if-elseif-else
if ($semester < 3) {
  $keteranganSemester = "semester awal";
} elseif ($semester <= 6) {
  $keteranganSemester = "semester menengah";
} else {
  $keteranganSemester = "semester akhir";
}
$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
  case "SI":
    $fokusprogramStudi = "Sistem informasi dan pusat bisnis";
    break;
  case "TI":
    $fokusprogramStudi = "Komputasi dan pengembangan perangkat lunak";
    break;
  default:
    $fokusprogramStudi = "Belum ditentukan";
}
