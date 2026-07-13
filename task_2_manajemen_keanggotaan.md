# Task 2: Manajemen Keanggotaan (Members)

## Objektif
Membuat fitur Manajemen Keanggotaan yang terintegrasi dengan tabel `users` untuk menyimpan profil detail dari anggota koperasi sesuai PRD.

## Detail Pekerjaan
1. **Pembuatan Skema Tabel `members`**
   - Buat migration untuk tabel `members` dengan relasi One-to-One ke tabel `users`.
   - Kolom yang dibutuhkan: `id`, `user_id` (Foreign Key), `member_number` (Unik), `identity_number` (NIK KTP), `phone`, `address`, `status` (Enum: Active, Inactive), `joined_date`.

2. **Data Dummy & Seeder**
   - Buat `MemberSeeder` untuk mengisi data dummy anggota.
   - Pastikan seeder ini mengambil user dengan role `Member` dari `users` tabel dan membuatkan profil `members` yang valid.
   - Sertakan data dengan status `Active` dan `Inactive` untuk memvisualisasikan perbedaan datanya di sistem.

3. **Logika CRUD Anggota**
   - Buat fitur pendaftaran anggota baru, manajemen status (aktif/non-aktif), dan pengelolaan profil anggota.
   - Ikuti konvensi *controller*, *model*, dan *view* yang serupa dengan modul yang sudah ada di proyek ini.

4. **Kriteria Selesai (Acceptance Criteria)**
   - Tabel `members` ter-generate dan terisi data dummy lewat seeder.
   - Terdapat halaman CRUD anggota yang berjalan lancar.
