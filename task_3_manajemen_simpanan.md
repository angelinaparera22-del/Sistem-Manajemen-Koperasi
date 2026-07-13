# Task 3: Manajemen Simpanan (Savings)

## Objektif
Membangun modul Manajemen Simpanan untuk mencatat semua transaksi setoran maupun penarikan yang dilakukan oleh anggota koperasi.

## Detail Pekerjaan
1. **Pembuatan Skema Tabel `savings`**
   - Buat migration untuk tabel `savings` (Simpanan).
   - Kolom yang dibutuhkan: `id`, `member_id` (Foreign Key), `type` (Enum: Pokok, Wajib, Sukarela), `amount`, `transaction_type` (Enum: Deposit, Withdrawal), `transaction_date`, `notes`.

2. **Data Dummy & Seeder**
   - Buat `SavingSeeder` untuk menyuntikkan data transaksi dummy ke beberapa anggota.
   - Masukkan transaksi `Deposit` (setoran) dan `Withdrawal` (penarikan) dengan jenis simpanan yang bervariasi agar visualisasi daftar simpanan terlihat nyata.

3. **Logika CRUD Simpanan**
   - Sediakan fitur pencatatan simpanan masuk dan keluar yang terhubung ke anggota (`member_id`).
   - Ikuti arsitektur kode dan UI/UX yang sudah disepakati di proyek.

4. **Kriteria Selesai (Acceptance Criteria)**
   - Tabel `savings` dapat dimigrasi dan di-seed dengan sukses.
   - Modul manajemen simpanan (pencatatan setoran & penarikan) dapat digunakan tanpa error.
