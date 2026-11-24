// ===== Navigasi mobile =====
const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

function aturMenu(buka) {
  navMenu.classList.toggle("nav-open", buka);
  navToggle.setAttribute("aria-expanded", String(buka));
  navToggle.setAttribute("aria-label", buka ? "Tutup navigasi" : "Buka navigasi");
}

navToggle.addEventListener("click", () => {
  aturMenu(!navMenu.classList.contains("nav-open"));
});

// Menu ditutup otomatis setelah salah satu tautan dipilih.
navMenu.querySelectorAll("a").forEach((tautan) => {
  tautan.addEventListener("click", () => aturMenu(false));
});

// ===== Validasi formulir kontak =====
const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

const namaInput = document.getElementById("nama");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const tanggalInput = document.getElementById("tanggal");
const prodiInput = document.getElementById("prodi");
const pesanInput = document.getElementById("pesan");

function tampilkanGalat(pesanGalat) {
  formFeedback.className = "form-feedback-error";
  formFeedback.textContent = pesanGalat;
}

contactForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const nama = namaInput.value.trim();
  if (nama.length < 3 || nama.length > 50) {
    tampilkanGalat("Nama lengkap harus diisi 3 sampai 50 karakter.");
    return;
  }

  const email = emailInput.value.trim();
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    tampilkanGalat("Masukkan alamat email yang valid.");
    return;
  }

  const semester = Number(semesterInput.value);
  if (
    semesterInput.value === "" ||
    !Number.isInteger(semester) ||
    semester < 1 ||
    semester > 14
  ) {
    tampilkanGalat("Semester harus diisi dengan angka 1 sampai 14.");
    return;
  }

  if (tanggalInput.value === "") {
    tampilkanGalat("Tanggal kunjungan harus diisi.");
    return;
  }

  const jenisPesan = document.querySelector('input[name="jenis_pesan"]:checked');
  if (!jenisPesan) {
    tampilkanGalat("Pilih jenis pesan.");
    return;
  }

  const topikDipilih = document.querySelectorAll('input[name="minat[]"]:checked');
  if (topikDipilih.length === 0) {
    tampilkanGalat("Pilih minimal satu topik yang diminati.");
    return;
  }

  if (prodiInput.value === "") {
    tampilkanGalat("Pilih program studi.");
    return;
  }

  const pesan = pesanInput.value.trim();
  if (pesan.length === 0) {
    tampilkanGalat("Pesan harus diisi.");
    return;
  }
  if (pesan.length > 300) {
    tampilkanGalat("Pesan maksimal 300 karakter.");
    return;
  }

  formFeedback.className = "form-feedback-success";
  formFeedback.textContent = "Form berhasil divalidasi.";
  contactForm.submit();
});

contactForm.addEventListener("reset", () => {
  formFeedback.textContent = "";
});

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
});