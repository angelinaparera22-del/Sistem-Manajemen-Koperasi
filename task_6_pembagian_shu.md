# Task 6: Pembagian Sisa Hasil Usaha (SHU)

## Objektif
Membangun modul kalkulasi dan pembagian Sisa Hasil Usaha (SHU) kepada anggota koperasi berdasarkan aktivitas simpanan dan pinjaman di akhir periode.

## Detail Pekerjaan
1. **Pembuatan Skema Tabel `shu_distributions`**
   - Buat migration untuk tabel `shu_distributions`. Kolom yang disarankan: `id`, `member_id` (Foreign Key), `period_year`, `total_savings_point`, `total_loan_point`, `amount_received`, `status` (Enum: Distributed, Pending), `distributed_date`.

2. **Data Dummy & Seeder**
   - Buat `ShuSeeder` untuk menyuntikkan data dummy pembagian SHU pada tahun/periode sebelumnya.
   - Buat variasi data di mana ada anggota yang mendapatkan SHU tinggi (karena simpanan/pinjaman aktif) dan rendah.

3. **Logika Fitur Pembagian SHU**
   - Implementasikan kalkulasi SHU berlandaskan rumus persentase keuntungan.
   - Sediakan fitur bagi admin/superadmin untuk mengeksekusi pembagian SHU secara massal.
   - Wajib mengikuti standar struktur koding yang sudah ada pada modul *existing*.

4. **Kriteria Selesai (Acceptance Criteria)**
   - Database untuk tabel SHU berhasil di-migrate dan di-seed.
   - Halaman riwayat dan kalkulasi SHU dapat ditampilkan tanpa error.
