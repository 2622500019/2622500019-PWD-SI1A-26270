<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<section id="about">
        <h2>Tentang Saya</h2>

        <article>
          <h3>Profil Singkat</h3>
          <p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
          <p>Fokus program studi: <?php echo $fokusprogramStudi; ?></p>
          <p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p> 
          <p>Sisa Semester Hingga batas: <?php echo $sisaSemester; ?></p>
          <p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
          <p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
          <p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; 
?></p> 
          <p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
          <p>Saya Mahasiswa Program Studi Sistem Informasi</p>

          <h3>Target Belajar (perulangan for)</h3>
          <ol>
            <?php 
            // Perulangan for tanpa array; materi larik dibahas pada P9. 
            for ($i = 1; $i <= 5; $i++) { 
              echo "<li>Target belajar ke-" . $i . ": "; 
              switch ($i) { 
                case 1: 
                  echo "Memahami sintaks dasar PHP."; 
                  break; 
                case 2: 
                  echo "Menggunakan variabel dan konstanta."; 
                  break; 
                case 3: 
                  echo "Menerapkan operator dan percabangan."; 
                  break; 
                case 4: 
                  echo "Menggunakan perulangan for dan while."; 
                  break; 
                default: 
                  echo "Belum dipetakan"; 
                  break; 
            } 
            echo "</li>"; 
        } 
        ?> 
          </ol>
        </article>
          <h3>Semester (Perulangan while):</h3> 
          <ol> 
            <?php 
            $nomorSemester = 1; 
            while ($nomorSemester <= 3) { 
              echo "<li>Semester " . $nomorSemester . "</li>"; 
              $nomorSemester++; // operator penugasan 
            } 
            ?> 
          </ol> 
</section>

<?php include 'footer.php'; ?>