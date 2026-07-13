# Task 9: Log Aktivitas (Audit Trail)

## Objektif
Melakukan *tracking* dan mencatat seluruh aksi kritis yang dilakukan pengguna untuk tujuan transparansi dan keamanan (Audit Trail).

## Detail Pekerjaan
1. **Pembuatan Skema Tabel `activity_logs`**
   - Buat migration untuk tabel `activity_logs`. Kolom: `id`, `user_id` (Foreign Key), `action` (contoh: "Created Loan", "Deleted User"), `model_type` (Tabel yang diubah), `model_id`, `details` (JSON lama dan baru), `ip_address`, `created_at`.
   - (Opsional: Dapat menggunakan package `spatie/laravel-activitylog` jika diizinkan, atau buat manual sesuai standar *existing*).

2. **Data Dummy & Seeder**
   - Buat `ActivityLogSeeder` yang mereplika riwayat log aktivitas pengguna dari seeder-seeder sebelumnya agar tabel log terisi.

3. **Logika Fitur Log**
   - Hook fitur log ke dalam Model Observers (seperti `created`, `updated`, `deleted`) atau pada Controller.
   - Buat halaman *Read-Only* bagi role `Superadmin` untuk melihat log aktivitas keseluruhan sistem.

4. **Kriteria Selesai (Acceptance Criteria)**
   - Setiap transaksi finansial dan perubahan profil tercatat otomatis di tabel log.
   - Halaman Log Aktivitas berjalan dan menampilkan data historis secara terurut berdasarkan waktu terbaru.
