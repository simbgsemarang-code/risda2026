# Migrasi RISDA ke CodeIgniter 4

Target runtime: PHP 8.4, CodeIgniter 4.7, MySQL/MariaDB, ekstensi `intl`, `mbstring`, `mysqli`, `curl`, `json`, dan `openssl` aktif.

## Status

- Fondasi CI4 dibuat di folder `ci4/` tanpa mengganti aplikasi CI3 yang sedang live.
- `composer.json` mensyaratkan PHP 8.4 dan CI4 4.7.
- Konfigurasi contoh, model peta, dan rute kompatibilitas sedang dipindahkan.
- Situs live CI3 tidak boleh diarahkan ke `ci4/public` sebelum semua rute, autentikasi, unggah foto, halaman administrasi, dan uji regresi selesai.

## Deploy CI4 setelah migrasi selesai

1. Atur PHP domain ke 8.4 dan aktifkan ekstensi yang disebutkan di atas.
2. Salin `.env.example` menjadi `.env`, lalu isi kredensial database dan kunci enkripsi yang baru.
3. Jalankan `composer install --no-dev --optimize-autoloader` pada server.
4. Jadikan `ci4/public` sebagai document root Plesk.
5. Pastikan folder `ci4/writable` dapat ditulis web server.
6. Jalankan `php spark migrate` untuk membuat skema CI4, termasuk penghitung pengunjung.
7. Jalankan pengujian URL publik dan admin sebelum mengalihkan seluruh trafik.

## Data

Database lama tetap dipakai pada tahap awal. Perubahan skema dilakukan melalui migration CI4, bukan lewat query langsung dari view/controller.
