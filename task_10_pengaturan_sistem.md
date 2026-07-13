# Task 10: Pengaturan Sistem (System Settings)

## Objektif
Menyediakan halaman Pengaturan agar Superadmin dapat mengubah parameter sistem secara dinamis tanpa mengubah *source code*.

## Detail Pekerjaan
1. **Pembuatan Skema Tabel `settings`**
   - Periksa ketersediaan tabel `settings` (karena di PRD awal mungkin sudah terindikasi ada `SettingSeeder`). Jika belum ada/kurang, perbarui migration.
   - Kolom: `id`, `key` (unik, misal: `interest_rate_default`, `late_penalty_fee`), `value`, `description`.

2. **Data Dummy & Seeder**
   - Perbarui/buat `SettingSeeder`.
   - Masukkan *key-value* penting seperti persentase bunga bawaan (misal 2%), denda keterlambatan (misal Rp 50.000), nama koperasi, dan logo.

3. **Logika Fitur Pengaturan**
   - Buat halaman Pengaturan (CRUD/Update) khusus untuk `Superadmin`.
   - Panggil parameter dari database ini setiap kali kalkulasi pinjaman atau denda dilakukan di modul terkait.
   - Ikuti konvensi *Controller* & UI *existing*.

4. **Kriteria Selesai (Acceptance Criteria)**
   - Halaman pengaturan sukses menampilkan form edit *settings*.
   - Perubahan nilai pengaturan langsung memengaruhi kalkulasi di modul lain (contoh: mengubah persentase bunga akan merubah hitungan pada pengajuan pinjaman baru).
