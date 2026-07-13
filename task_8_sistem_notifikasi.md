# Task 8: Sistem Notifikasi (Notification System)

## Objektif
Mengimplementasikan sistem notifikasi di dalam aplikasi (in-app notifications) untuk mengingatkan anggota tentang tagihan angsuran, status pinjaman, maupun pembaruan sistem.

## Detail Pekerjaan
1. **Pembuatan Skema Tabel Notifikasi**
   - Manfaatkan fitur notifikasi bawaan Laravel (Database Notifications) dengan men-generate tabel `notifications` standar dari Laravel.

2. **Data Dummy & Seeder**
   - Buat `NotificationSeeder` (atau generate otomatis pada saat seeding pinjaman/simpanan) untuk memberikan dummy notifikasi *Unread* dan *Read* pada akun role `Member` dan `Admin`.
   
3. **Logika Fitur Notifikasi**
   - Sisipkan notifikasi ketika: Pengajuan pinjaman dibuat (notif ke Admin), pengajuan pinjaman disetujui/ditolak (notif ke Member), dan H-3 jatuh tempo angsuran.
   - Sediakan komponen antarmuka (lonceng/bell di header NiceAdmin) untuk melihat dan menandai notifikasi sebagai terbaca (Mark as Read).

4. **Kriteria Selesai (Acceptance Criteria)**
   - Lonceng notifikasi di antarmuka menampilkan angka jumlah notifikasi yang belum dibaca.
   - Notifikasi dapat diklik dan ditandai sebagai sudah dibaca (Read).
