<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<main>
    <section id="home">
    <h2>Selamat Datang</h2>
        <p>Halo, Saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik; ?>.</p>
  
        <img src="foto profil.jpeg" alt="foto profil Nama Dewangga Anugraha" />
    </section>
</main>

<?php include 'footer.php'; ?>