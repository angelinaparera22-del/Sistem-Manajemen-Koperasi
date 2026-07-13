# Task 4: Manajemen Pinjaman dan Angsuran (Loans & Installments)

## Objektif
Mengembangkan fitur siklus pengajuan pinjaman hingga proses pembayaran angsuran tiap bulannya.

## Detail Pekerjaan
1. **Pembuatan Skema Tabel `loans` dan `installments`**
   - Buat migration untuk tabel `loans`. Kolom: `id`, `member_id`, `amount`, `interest_rate`, `tenor`, `status` (Pending, Approved, Rejected, Active, Paid_Off), `start_date`, `due_date`.
   - Buat migration untuk tabel `installments`. Kolom: `id`, `loan_id`, `amount_paid`, `penalty_amount`, `payment_date`, `due_date`, `status` (Paid, Unpaid, Late).

2. **Data Dummy & Seeder**
   - Buat `LoanSeeder` dan `InstallmentSeeder`.
   - Buat dummy pinjaman dengan status `Pending` dan status `Active` agar ada visualisasi workflow persetujuan (approval workflow).
   - Buat dummy angsuran untuk pinjaman yang berstatus `Active`, dengan contoh angsuran yang `Paid`, `Unpaid`, atau `Late` (berdenda).

3. **Logika Fitur Pinjaman & Angsuran**
   - Implementasikan CRUD untuk mengajukan, menyetujui, dan menolak pinjaman.
   - Implementasikan pencatatan angsuran dan simulasi kalkulator bunga.
   - Jangan menyimpang dari struktur koding existing.

4. **Kriteria Selesai (Acceptance Criteria)**
   - Tabel dan data dummy sukses dimuat melalui seeder.
   - Modul pinjaman (pengajuan, persetujuan) dan pembayaran tagihan angsuran berjalan sesuai alur pada PRD.
