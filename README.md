bahan yang diperlukan
1. composer
2. Laravel
3. xampp 8.2.4 (include PHP 8.2.12 dan MySQL)

untuk gunakan project ini
1. clone git atau download dengan zipper
2. kemudian extract zipper nya sampai selesai
3. kemudian salin folder flie fullstack-absengps ke folder C:\xampp\htdocs atau (sesuaikan jalur xampp/htdocs)
4. buka folder tsb di vscode
5. buka terminal yang ada divscode kemudian ketik perintah "composer install"
6. apabila sudah terinstall composer dan Laravel sebelumnya running Laravel pastikan buka http://localhost/phpmyadmin/ dan +baru dengan absensi_gps dan Ekspor yang ada di folder database (MySQL) dan untuk .env.example silahkan di rubah ke .env
7. setelah berubah .env nya silahkan DB_DATABASE=laravel menjadi DB_DATABASE=absensi_gps
8. setelah poin 6 dan 7 selanjutnya running dengan php artisan serve
9. kemudian akses http://localhost:8080
10. untuk akses mengunakan nik : 12345 dan password : 2222

sisi user
untuk absensi
1. klik logo kamera di halaman dashboard
2. pastikan webcam dan maps sudah muncul di bagian absensi
3. kemudian klik (absen masuk) dan kembali ke halaman dashboard (untuk memastikan bahwa jam nya sudah muncul sesuai telah absensi masuk)
*untuk absen pulang
1. klik logo kamera di halaman dashboard
2. pastikan webcam dan maps sudah muncul di bagian absensi
3. kemudian klik (absen pulang) dan kembali ke halaman dashboard (untuk memastikan bahwa jam nya sudah muncul sesuai telah absensi pulang)

untuk check histori absensi
1. klik "histori"
2. klik "bulan" dan "tahun" (untuk pencarian dasarkan bulan presensi nya)
3. klik "cari data" dan muncul data yang pencarian presensi telah tentukan sebelumnya

untuk izin/sakit
1. klik "izin"
2. klik "+" (untuk pencarian dasarkan bulan presensi nya)
3. selanjutnya kilik tanggal dan klik alasan nya "izin"/"sakit"
4. kemudian ketik alasan nya yang ada di kolom keterangan
5. klik "kirim"

*setelah mengisi form izin/sakit bisa mengcheck status nya "menunggu", "disetujui", dan "ditolak"

untuk profile
.) bisa mengrubah nomor hp, alamat dan password

sisi admin/sisi hrd
untuk akses halaman admin : http://127.0.0.1:8000/panel
login dengan bsigalingging9@gmail.com
password : 1012

1. setujui/ditolak status izin/sakit oleh staf
.) klik data izin/sakit
.) klik "aksi" salah satu permohon izin/sakit yang diajukan oleh staf
.) klik "disetujui" (untuk disetujui) / "ditolak" (untuk tolak) kemudian kilik submit yang dilakukan oleh admin/hrd
2. ketahui data karyawan
.) klik data master
.) klik data karyawan
3. kilik Monitoring Presensi untuk ketahui sudah/belum lakukan absensi oleh user/staf


