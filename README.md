Haii, tester
Perkenalkan aku fajar dan ini adalah tugasku

Detail project :
project name : Monitoring Kendaraan Tambang
build-project : framework laravel v10
php version : 8.1^
data-base : mysql v8.0.30
terdapat file physical data model : sekawan_media.pdf
terdapat file physical data model : MonitoringKendaraanTambang.png
terdapat file activity Diagaram : activity diagram monitoring kendaraan.png

konfigurasi :

1. download my project
2. buat / buka file .env
3. jika tidak ada buat file .evn dengan melihat padat .env.example
4. sesuaikan konfigurasi db,
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your db name # setting your db name
   DB_USERNAME=root # setting your db username
   DB_PASSWORD= # setting your db password
5. buka terminal, dan masuk ke direktori project
6. jalankan perintah composer install
7. jalankan perintah "php artisan migrate --seed"
8. jalankan perintah "php artisan serve"
9. lalu buka url http://127.0.0.1:8000 pada browser

---

daftar akun & password :

1. admin@admin.com - password
2. mandor@mandor.om - password
3. superisor@spv.com - password
4. hrd@hrd.com - password

Penggunaan :

1. POV admin
    1. login dengan akun admin@admin.com.
    2. akan di arahkan ke menu dashboard
    3. untuk membuat pengajuan, pilih "Pemesanan Kendaraan Angkutan Orang atau Pemesanan Kendaraan Angkutan Barang".
    4. pilih "Pemesanan Kendaraan Angkutan Orang" jika akan membuat pengajuan kendaraan untuk kebutuhan pengangkutan pegawai tambang.
    5. pilih "Pemesanan Kendaraan Angkutan Barang" jika akan membuat pengajuan kendaraan untuk kebutuhan pengangkutan bahan atau produk tambang.
    6. setela itu akan dibawa ke halaman form pengajuan kendaraan.
    7. pilih "Form Mobil Perusahaan" jika mobil yang akan digunakan milik perusahaan.
    8. pilih "Form Mobil Sewa" jika mobil yang akan digunakan adalah mobil sewa.
    9. isi semua input form sesuai dengan arahan.
    10. lalu tekan submit, dan akan diarahkan ke halaman dashboard.
    11. form pengajuan sudah dibuat, dan menunggu persetujuan dari atasan.
    12. pilih "Pengajuan Disetujui" untuk melihat pengajuan yang telah di setujui.
    13. lalu, akan tampil table bersisi data yang telah di setujui oleh atasan.
    14. Jika penggunaan mobil sudah selesai, admin bisa menekan tombol "Laporkan Kembali".
    15. lalu akan di arahkan ke form pengembalian kendaraan.
    16. admin diminta untuk meng-inputkan konsumsi bahan bakar selama penggunaan dan juga deskripsi dari kondisi kendaraan.
    17. klik submit. dan akan diarakan kembali ke halaman "Pengajuan Disetujui".
    18. kembali ke menu dashboard.
    19. terdapat "Pengajuan Ditolak" yang jika di klik akan menampilkan penggajuan yang ditolak oleh atasan.
    20. terdapat "Create Laporan" yang jika diklik akan di arahkan ke halaman create-laporan.
    21. terdapat 2 pilihan "Laporan Bulanan dan Laporan Mingguan" dan juga tabel berisi data pemakaian kendaraan.
    22. jika ingin mencetak laporan bulanan klik "Laporan Bulanan" makan laporan akan didownload dalam bentuk file excel.
    23. jika ingin mencetak laporan mingguan klik "Laporan Mingguan" makan laporan akan didownload dalam bentuk file excel.
    24. pilih menu "Diagram Pemakaian Kendaraan" untuk melihat diagram pemakaian kendaraan selama satu minggu terakhir.
    25. pilih menu "Kendaraan PT" untuk melihat daftar kendaraan milik PT.
    26. pilih menu "Authentication" lalu logout untuk keluar akun.
2. POV mandor
    1. login dengan akun admin@admin.com.
    2. akan di arahkan ke menu dashboard.
    3. pilih "Menunggu Persetujuan" Untuk melihat daftar pengajuan yang meminta validasi dari mandor.
    4. lalu akan muncul tabel menunggu persetujuan. terdapat tombol "Accept dan Reject".
    5. pilih "Accept" untuk menyetujui, dan pilih "Rejaect" untuk memolak.
    6. kembali ke menu dashboard. 7. terdapat "Create Laporan" yang jika diklik akan di arahkan ke halaman create-laporan.
    7. terdapat 2 pilihan "Laporan Bulanan dan Laporan Mingguan" dan juga tabel berisi data pemakaian kendaraan.
    8. jika ingin mencetak laporan bulanan klik "Laporan Bulanan" makan laporan akan didownload dalam bentuk file excel.
    9. jika ingin mencetak laporan mingguan klik "Laporan Mingguan" makan laporan akan didownload dalam bentuk file excel.
    10. pilih menu "Diagram Pemakaian Kendaraan" untuk melihat diagram pemakaian kendaraan selama satu minggu terakhir.
    11. pilih menu "Kendaraan PT" untuk melihat daftar kendaraan milik PT.
    12. pilih menu "Authentication" lalu logout untuk keluar akun.
3. POV SPV
    1. login dengan akun superisor@spv.com.
    2. akan di arahkan ke menu dashboard.
    3. pilih "Menunggu Persetujuan" Untuk melihat daftar pengajuan yang meminta validasi dari spv.
    4. lalu akan muncul tabel menunggu persetujuan. terdapat tombol "Accept dan Reject".
    5. pilih "Accept" untuk menyetujui, dan pilih "Rejaect" untuk memolak.
    6. kembali ke menu dashboard. 7. terdapat "Create Laporan" yang jika diklik akan di arahkan ke halaman create-laporan.
    7. terdapat 2 pilihan "Laporan Bulanan dan Laporan Mingguan" dan juga tabel berisi data pemakaian kendaraan.
    8. jika ingin mencetak laporan bulanan klik "Laporan Bulanan" makan laporan akan didownload dalam bentuk file excel.
    9. jika ingin mencetak laporan mingguan klik "Laporan Mingguan" makan laporan akan didownload dalam bentuk file excel.
    10. pilih menu "Diagram Pemakaian Kendaraan" untuk melihat diagram pemakaian kendaraan selama satu minggu terakhir.
    11. pilih menu "Kendaraan PT" untuk melihat daftar kendaraan milik PT.
    12. pilih menu "Authentication" lalu logout untuk keluar akun.
4. POV HRD
    1. login dengan akun hrd@hrd.com.
    2. akan di arahkan ke menu dashboard.
    3. pilih "Menunggu Persetujuan" Untuk melihat daftar pengajuan yang meminta validasi dari HRD.
    4. lalu akan muncul tabel menunggu persetujuan. terdapat tombol "Accept dan Reject".
    5. pilih "Accept" untuk menyetujui, dan pilih "Rejaect" untuk memolak.
    6. kembali ke menu dashboard. 7. terdapat "Create Laporan" yang jika diklik akan di arahkan ke halaman create-laporan.
    7. terdapat 2 pilihan "Laporan Bulanan dan Laporan Mingguan" dan juga tabel berisi data pemakaian kendaraan.
    8. jika ingin mencetak laporan bulanan klik "Laporan Bulanan" makan laporan akan didownload dalam bentuk file excel.
    9. jika ingin mencetak laporan mingguan klik "Laporan Mingguan" makan laporan akan didownload dalam bentuk file excel.
    10. pilih menu "Diagram Pemakaian Kendaraan" untuk melihat diagram pemakaian kendaraan selama satu minggu terakhir.
    11. pilih menu "Kendaraan PT" untuk melihat daftar kendaraan milik PT.
    12. pilih menu "Jadal Service Routine" untuk melihat jadwal service kendaraan.
    13. lalu, akan diarahkan ke halaman jadwal service, terdapat bombol berwarna biru dengang logo obeng.
    14. klik tombol itu untuk merubah status mobil menjadi di service
    15. pilih menu "List Service" untuk melihat daftar kendaraan yang sedang di service, dan klik tombol selesai jika service selesai.
    16. pilih menu "Authentication" lalu logout untuk keluar akun.

TERIMA KASIHH
