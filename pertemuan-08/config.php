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


// P7 : pengujian GET
$pesanKesalahan = '';
$namaWisatawan = $emailWisatawan = $jumlahPengunjung = $tanggalKunjungan = $jenisPengunjung = $jenisKunjungan = $kewarganegaraan = $catatanKunjungan = '';
$minat = [];
if (isset($_POST['nama'])) {
    $namaWisatawan = trim((string) ($_POST['Nama Wisatawan'] ?? '')); 
    $emailWisatawan = trim((string) ($_POST['Email Wisatawan'] ?? ''));
    $jumlahPengunjung = trim((string) ($_POST['Jumlah Pengunjung'] ?? ''));
    $tanggalKunjungan = trim((string) ($_POST['Tanggal Kunjungan'] ?? ''));
    $jenisPengunjung = trim((string) ($_POST['Jenis Pengunjung'] ?? '')); 
    $jenisKunjungan = trim((string) ($_POST['Jenis Kunjungan'] ?? '')); 
    $kewarganegaraan = trim((string) ($_POST['Kewarganegaraan'] ?? '')); 
    $catatanKunjungan = trim((string) ($_POST['Catatan Kunjungan'] ?? '')); 
    $minat = $_POST['minat'] ?? [];
    $pesanKesalahan = '' ;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (trim($namaWisatawan ?? '') === '') {
            $pesanKesalahan .= 'Nama lengkap wajib diisi. ';
        }

        if (trim($emailWisatawan) === '') { 
            $pesanKesalahan .= 'Email wajib diisi. '; 
        }

        if (trim($jumlahPengunjung) === '') { 
            $pesanKesalahan .= 'Jumlah pengunjung wajib diisi. ';
        }

        if (trim($tanggalKunjungan) === '') { 
            $pesanKesalahan .= 'Tanggal kunjungan wajib diisi. ';
        }

        if ($jenisPengunjung === '') { 
            $pesanKesalahan .= 'Jenis pengunjung wajib dipilih. ';
        }

        if ($jenisKunjungan === '') { 
            $pesanKesalahan .= 'Jenis kunjungan wajib dipilih. ';
        }

         if ($kewarganegaraan === '') { 
            $pesanKesalahan .= 'Kewarganegaraan wajib dipilih. ';
         }

        if  (trim($catatanKunjungan) === '') { 
            $pesanKesalahan .= 'Catatan kunjungan wajib diisi. '; 
        }
    }

if (trim($emailWisatawan) !== '') { 
  if (filter_var($emailWisatawan, FILTER_VALIDATE_EMAIL) === false) { 
    $pesanKesalahan .= 'Format email tidak valid. '; 
  } 
} 
if (!in_array($jenisPengunjung, ['pertanyaan', 'saran'], true)) { 
  $pesanKesalahan .= 'Jenis pengunjung tidak valid. '; 
} 

if (!in_array($kewarganegaraan, ['ID', 'US', 'JP'], true)) { 
  $pesanKesalahan .= 'Kewarganegaraan tidak valid. '; 
} 

} 


// P7 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $_SESSION['pesanKesalahan'] = $pesanKesalahan; 
 
  $_SESSION['namaWisatawan'] = $namaWisatawan; 
  $_SESSION['emailWisatawan'] = $emailWisatawan; 
  $_SESSION['jumlahPengunjung'] = $jumlahPengunjung; 
  $_SESSION['tanggalKunjungan'] = $tanggalKunjungan; 
  $_SESSION['jenisPengunjung'] = $jenisPengunjung; 
  $_SESSION['jenisKunjungan'] = $jenisKunjungan; 
  $_SESSION['kewarganegaraan'] = $kewarganegaraan; 
  $_SESSION['catatanKunjungan'] = $catatanKunjungan; 
 
  header('Location: index.php'); 
  exit; 
} 

$pesanKesalahan = $_SESSION['pesanKesalahan'] ?? ''; 
 
$nama = $_SESSION['namaWisatawan'] ?? ''; 
$email = $_SESSION['emailWisatawan'] ?? ''; 
$jumlahPengunjung = $_SESSION['jumlahPengunjung'] ?? ''; 
$tanggalKunjungan = $_SESSION['tanggalKunjungan'] ?? ''; 
$jenisPengunjung = $_SESSION['jenisPengunjung'] ?? ''; 
$jenisKunjungan = $_SESSION['jenisKunjungan'] ?? ''; 
$kewarganegaraan = $_SESSION['kewarganegaraan'] ?? ''; 
$catatanKunjungan = $_SESSION['catatanKunjungan'] ?? '';
?>