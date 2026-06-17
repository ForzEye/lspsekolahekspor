# Portal Web LSP Sekolah Ekspor

Web portal resmi **LSP (Lembaga Sertifikasi Profesi) Sekolah Ekspor**. Website ini berfungsi sebagai media informasi publik mengenai sertifikasi kompetensi di bidang ekspor, serta dilengkapi dengan panel admin (*Content Management System*) untuk mengelola data operasional LSP seperti program, skema sertifikasi, data asesor, alur pendaftaran, dan informasi profil lembaga.

---

## 🚀 Fitur Utama

### 🌐 Halaman Publik (User Interface)
- **Beranda (Home)**: Tampilan utama dengan banner promosi (Hero section), program unggulan, tentang kami secara singkat, dan testimoni.
- **Profil Lembaga**: Informasi terperinci tentang Visi & Misi LSP, Struktur Organisasi, Tim Manajemen, dan daftar Asesor Kompetensi yang terlisensi.
- **Layanan Sertifikasi**: 
  - Informasi **Skema Sertifikasi** kompetensi ekspor yang tersedia.
  - Detail prasyarat dan unit kompetensi dari masing-masing skema.
  - **Alur Pendaftaran** sertifikasi yang jelas untuk calon asesi.
- **Galeri Kegiatan (Activities)**: Dokumentasi kegiatan sertifikasi, pelatihan, dan acara resmi LSP.
- **Hubungi Kami (Kontak)**: Detail alamat kantor, media sosial, Google Map, serta formulir pengiriman pesan langsung ke admin.
- **Registrasi/Daftar**: Halaman awal/tautan untuk calon asesi melakukan pendaftaran sertifikasi.

### 🔐 Panel Admin (Dashboard CMS)
- **Kelola Tampilan Utama**: Mengedit konten *Hero Section* (Banner) dan bagian *About Us*.
- **Manajemen Program**: CRUD (*Create, Read, Update, Delete*) program yang ditawarkan LSP.
- **Manajemen Sertifikasi**:
  - Kelola daftar **Skema Sertifikasi** beserta detail unit kompetensinya.
  - Kelola bagan/tahapan **Alur Pendaftaran**.
- **Manajemen SDM**: Kelola data **Asesor Kompetensi** dan **Anggota Tim (Staf/Pengurus)**.
- **Manajemen Konten & Galeri**: Mengunggah dan merapikan dokumentasi aktivitas/kegiatan.
- **Feedback & Ulasan**: Moderasi data testimoni dari alumni asesi/mitra.
- **Pengaturan Kontak & Umum**: Mengubah nomor telepon, email, alamat kantor, link media sosial, dan meta website.

---

## 🛠️ Spesifikasi Teknologi

- **Framework Backend**: Laravel (PHP)
- **Frontend Engine**: Blade Templates & Alpine.js (untuk interaktivitas dinamis)
- **Styling**: Tailwind CSS (melalui Vite compiler)
- **Database**: MySQL
- **Autentikasi**: Laravel Breeze (untuk login admin yang aman)

---

## ⚙️ Cara Instalasi & Menjalankan Proyek secara Lokal

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda:

### 1. Prasyarat
Pastikan komputer Anda sudah terpasang:
- PHP >= 8.2 (disarankan menggunakan XAMPP terbaru)
- Composer
- Node.js & NPM
- MySQL/MariaDB

### 2. Kloning Repositori
```bash
git clone https://github.com/username/lspsekolahekspor.git
cd lspsekolahekspor
```

### 3. Instalasi Dependensi Backend (PHP)
```bash
composer install
```

### 4. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` yang baru dibuat dan sesuaikan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Migrasi Database & Seeding
Jalankan migrasi untuk membuat tabel-tabel di database (tambahkan `--seed` jika terdapat data dummy bawaan):
```bash
php artisan migrate --seed
```

### 7. Hubungkan Storage Link
Hubungkan folder storage agar file gambar/media yang diunggah dari admin dapat diakses publik:
```bash
php artisan storage:link
```

### 8. Instalasi & Build Dependensi Frontend (Asset Compiler)
```bash
npm install
npm run dev
```

### 9. Jalankan Server Lokal
Jalankan server development Laravel:
```bash
php artisan serve
```
Akses website melalui browser pada alamat: [http://localhost:8000](http://localhost:8000)

---

## 📂 Struktur Folder Penting

- `app/Http/Controllers/PublicController.php` - Mengatur alur logika halaman publik.
- `app/Http/Controllers/Admin/` - Berisi kontroler khusus untuk dashboard manajemen admin.
- `resources/views/` - File Blade untuk layout halaman publik dan admin.
- `routes/web.php` - Daftar rute (routing) URL dari website.

