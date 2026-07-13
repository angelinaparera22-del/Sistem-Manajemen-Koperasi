# Task 7: Jurnal Keuangan dan Kas (Cash Management)

## Objektif
Membuat fitur pengelolaan kas koperasi untuk mencatat pemasukan lain-lain dan pengeluaran operasional di luar transaksi simpan pinjam (misalnya biaya admin, tagihan listrik, dsb).

## Detail Pekerjaan
1. **Pembuatan Skema Tabel `cash_journals`**
   - Buat migration untuk tabel `cash_journals`. Kolom: `id`, `type` (Enum: Income, Expense), `amount`, `category`, `description`, `transaction_date`, `created_by` (Foreign Key ke Users).

2. **Data Dummy & Seeder**
   - Buat `CashJournalSeeder` untuk men-generate data pengeluaran (Expense) dan pemasukan (Income) dummy.
   - Buat minimal 10-15 transaksi dummy untuk memvisualisasikan grafik arus kas bulanan nantinya.

3. **Logika Fitur Jurnal Kas**
   - Buat operasi CRUD (Create, Read, Update, Delete) untuk pencatatan kas ini.
   - Pastikan entri jurnal mempengaruhi total saldo kas (Cash Flow) di dasbor utama (yang akan dihubungkan di Task 5).

4. **Kriteria Selesai (Acceptance Criteria)**
   - Migration dan seeder jurnal berhasil dieksekusi.
   - Admin dapat memasukkan data pengeluaran dan pemasukan lain-lain secara langsung dari aplikasi.
