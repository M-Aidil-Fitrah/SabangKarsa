# 🌴 SabangKarsa

**SabangKarsa** adalah platform web yang dirancang untuk memudahkan wisatawan menjelajahi keindahan dan kekayaan Pulau Sabang, Aceh. Aplikasi ini menyediakan informasi lengkap mengenai akomodasi, driver, pemandu wisata, kuliner, serta agenda event di Sabang.

---

## ✨ Fitur Utama

- **Daftar Akomodasi:** Temukan berbagai pilihan penginapan mulai dari hotel hingga homestay lengkap dengan fasilitas, deskripsi, dan kontak.
- **Penyewaan Driver:** Cari driver lokal yang terverifikasi dengan berbagai jenis kendaraan sesuai kebutuhan transportasi Anda di Sabang.
- **Pemandu Wisata (Tour Guide):** Temukan pemandu wisata berpengalaman dengan spesialisasi beragam (sejarah, kuliner, petualangan, dll).
- **Jelajah & Kuliner (Stroll):** Eksplorasi tempat makan lokal, destinasi tersembunyi, dan aktivitas seru lainnya.
- **Agenda Event:** Dapatkan info terkini mengenai event, festival, atau kegiatan budaya di Sabang.
- **Profil Penyedia Jasa:** Penyedia jasa dapat mendaftarkan dan mengelola layanan mereka secara mandiri.
- **Filter & Pencarian:** Temukan layanan berdasarkan kategori, lokasi, harga, dan lainnya.
- **Integrasi WhatsApp:** Hubungi penyedia layanan langsung melalui WhatsApp dari halaman detail.
- **Manajemen Gambar:** Upload gambar pendukung untuk tiap layanan agar tampil lebih menarik.

---

## 🛠️ Teknologi yang Digunakan

- **Backend:** Laravel (PHP Framework)
- **Database:** SQLite (pengembangan lokal), MySQL/PostgreSQL (produksi)
- **Frontend:** Blade Templates + Tailwind CSS
- **JavaScript:** Vanilla JS untuk fitur interaktif (filter, validasi, dll.)
- **Deployment (opsional):** Docker, Nginx (bisa disesuaikan)

---

## ⚙️ Persyaratan Sistem

- PHP >= 8.1
- Composer
- Node.js & npm (untuk Tailwind CSS dan Vite)
- SQLite / MySQL / PostgreSQL

---

## 🚀 Panduan Instalasi (Lokal)

### 1. Clone Repositori
```bash
git clone https://github.com/M-Aidil-Fitrah/SabangKarsa.git
cd SabangKarsa
```

### 2. Instal Dependensi PHP
```bash
composer install
```

### 3. Salin File .env
```bash
cp .env.example .env
```

### 4. Generate Kunci Aplikasi
```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Gunakan SQLite (direkomendasikan untuk lokal):

Ubah di file `.env`:
```
DB_CONNECTION=sqlite
```

Lalu buat file SQLite kosong:
```bash
touch database/database.sqlite
```
Jika menggunakan MySQL/PostgreSQL, sesuaikan konfigurasi `.env` Anda.

### 6. Jalankan Migrasi
```bash
php artisan migrate
# Atau, untuk development dengan data dummy:
php artisan migrate:fresh --seed
```

### 7. Instal Dependensi Frontend
```bash
npm install
npm run dev # atau npm run build untuk produksi
```

### 8. Buat Symlink untuk Storage
```bash
php artisan storage:link
```

### 9. Jalankan Server Laravel
```bash
php artisan serve
```

Akses aplikasi melalui: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🧭 Penggunaan

### Pendaftaran
Pengguna dapat mendaftar sebagai user atau provider.

### Login
- Login User: `/login`
- Login Provider: `/loginp`

### Menambahkan Layanan (untuk Provider)
Pastikan telah membuat profil provider terlebih dahulu. Tambahkan layanan melalui:
- `/accommodations/create`
- `/drivers/create`
- `/tour-guides/create`
- `/strolls/create`
- `/agendas/create`

### Melihat Daftar Layanan
- **Akomodasi:** `/accommodations`
- **Driver:** `/drivers`
- **Tour Guide:** `/tour-guides`
- **Jelajah & Kuliner:** `/strolls`
- **Agenda Event:** `/agendas`

### Melihat Detail Layanan
Klik kartu layanan pada halaman daftar untuk melihat informasi detail.

---

## 🤝 Kontribusi

Kami sangat terbuka terhadap kontribusi dari komunitas! Ikuti langkah berikut untuk berkontribusi:

1. Fork repositori ini.
2. Buat branch baru:
    ```bash
    git checkout -b feature/nama-fitur
    ```
3. Lakukan perubahan, lalu commit:
    ```bash
    git commit -m "Add nama fitur"
    ```
4. Push ke branch:
    ```bash
    git push origin feature/nama-fitur
    ```
5. Buat Pull Request.

---

## 📸 Screenshot

Tambahkan tangkapan layar aplikasi di bagian ini untuk memperjelas tampilan dan fitur.

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah MIT License.

---

## 🔗 Tautan Repositori

[https://github.com/M-Aidil-Fitrah/SabangKarsa](https://github.com/M-Aidil-Fitrah/SabangKarsa)
