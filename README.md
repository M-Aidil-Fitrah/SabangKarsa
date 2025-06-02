SabangKarsa
SabangKarsa adalah platform web yang dirancang untuk memudahkan wisatawan menjelajahi keindahan dan kekayaan Pulau Sabang, Aceh. Aplikasi ini menyediakan informasi lengkap mengenai akomodasi, driver, tour guide, agenda event, serta tempat-tempat menarik untuk dijelajahi (stroll & kuliner), membantu merencanakan perjalanan yang tak terlupakan.

Fitur Utama
Daftar Akomodasi: Temukan berbagai pilihan penginapan, mulai dari hotel hingga homestay, lengkap dengan detail, fasilitas, dan kontak pemilik.

Penyewaan Driver: Cari driver lokal yang terverifikasi dengan berbagai jenis kendaraan untuk kebutuhan transportasi Anda di Sabang.

Pemandu Wisata (Tour Guide): Temukan tour guide berpengalaman dengan spesialisasi beragam (sejarah, kuliner, petualangan, dll.) untuk memandu perjalanan Anda.

Jelajah & Kuliner (Stroll): Jelajahi daftar tempat makan lokal, destinasi wisata tersembunyi, dan aktivitas menarik di sekitar Sabang.

Agenda Event: Dapatkan informasi terkini mengenai event, festival, atau kegiatan budaya yang sedang berlangsung di Sabang.

Profil Penyedia Jasa (Provider): Penyedia jasa (akomodasi, driver, tour guide, dll.) dapat mendaftar dan mengelola daftar layanan mereka.

Sistem Filter & Pencarian: Filter dan cari layanan berdasarkan kriteria spesifik untuk menemukan yang paling sesuai dengan kebutuhan Anda.

Integrasi WhatsApp: Hubungi penyedia jasa secara langsung melalui WhatsApp dari halaman detail layanan.

Manajemen Gambar: Upload gambar untuk setiap layanan untuk tampilan yang lebih menarik.

Teknologi yang Digunakan
Backend: Laravel (PHP Framework)

Database: SQLite (untuk pengembangan lokal), MySQL/PostgreSQL (untuk produksi)

Frontend: Blade Templates, Tailwind CSS

JavaScript: Vanilla JS untuk fungsionalitas filter sisi klien.

Deployment: (Opsional: sebutkan jika ada rencana deployment spesifik, misal Docker, Nginx, dll.)

Persyaratan Sistem
PHP >= 8.1

Composer

Node.js & npm (untuk Vite/Tailwind CSS)

Database (SQLite, MySQL, PostgreSQL)

Panduan Instalasi (Lokal)
Ikuti langkah-langkah berikut untuk menjalankan proyek SabangKarsa di lingkungan lokal Anda:

Clone Repositori:

git clone sabangkarsa
cd sabangkarsa

Instal Dependensi Composer:

composer install

Buat File .env:
Salin file .env.example menjadi .env:

cp .env.example .env

Atur Kunci Aplikasi:

php artisan key:generate

Konfigurasi Database:
Buka file .env dan atur konfigurasi database Anda. Secara default, Laravel menggunakan MySQL. Jika Anda ingin menggunakan SQLite (lebih mudah untuk pengembangan lokal), tambahkan baris berikut dan hapus/komentari konfigurasi MySQL:

DB_CONNECTION=sqlite
# DB_DATABASE=/path/to/your/database.sqlite (opsional, jika tidak diatur, akan membuat file database.sqlite di folder database)

Jika Anda menggunakan SQLite, buat file database kosong:

touch database/database.sqlite

Jalankan Migrasi Database:
Ini akan membuat tabel-tabel yang diperlukan di database Anda.

php artisan migrate

Jika Anda mengalami masalah migrasi (misal table already exists), dan Anda di tahap pengembangan, Anda bisa mencoba:

php artisan migrate:fresh --seed # --seed opsional jika Anda punya seeder untuk data dummy

Instal Dependensi NPM dan Kompilasi Aset Frontend:

npm install
npm run dev # Untuk development
# npm run build # Untuk produksi

Buat Symbolic Link untuk Storage:
Ini diperlukan agar gambar yang diunggah dapat diakses dari browser.

php artisan storage:link

Jalankan Server Pengembangan Laravel:

php artisan serve

Akses Aplikasi:
Buka browser Anda dan kunjungi http://127.0.0.1:8000 (atau alamat yang ditampilkan oleh php artisan serve).

Penggunaan
Pendaftaran: Pengguna dapat mendaftar sebagai user atau provider.

Login: Login sebagai user atau provider melalui halaman login yang berbeda (/login untuk user, /loginp untuk provider).

Menambahkan Layanan (untuk Provider):

Setelah login sebagai provider, pastikan Anda telah membuat profil provider terlebih dahulu (jika fitur ini diaktifkan).

Akses halaman /accommodations/create, /drivers/create, /tour-guides/create, /strolls/create, atau /agendas/create untuk menambahkan layanan baru.

Melihat Daftar Layanan:

Akomodasi: /accommodations

Driver: /drivers

Tour Guide: /tourguide (atau /tour-guides tergantung route Anda)

Stroll & Kuliner: /stroll (atau /strolls tergantung route Anda)

Agenda: /agenda (atau /agendas tergantung route Anda)

Melihat Detail Layanan: Klik pada kartu layanan di halaman daftar untuk melihat detail lengkap.

Kontribusi
Kami menyambut kontribusi dari komunitas! Jika Anda ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah berikut:

Fork repositori ini.

Buat branch baru untuk fitur Anda (git checkout -b feature/nama-fitur).

Lakukan perubahan Anda dan commit (git commit -m 'Add new feature').

Push ke branch Anda (git push origin feature/nama-fitur).

Buat Pull Request baru.

Lisensi
Proyek SabangKarsa adalah perangkat lunak open-source yang dilisensikan di bawah MIT License.

Catatan: Pastikan untuk mengganti dengan URL repositori GitHub Anda yang sebenarnya. Anda juga bisa menambahkan bagian "Screenshot" jika Anda memiliki gambar tampilan aplikasi.
