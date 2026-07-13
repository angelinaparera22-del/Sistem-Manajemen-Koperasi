# Task 1: Autentikasi dan Manajemen Pengguna (User Management)

## Objektif
Menyesuaikan sistem autentikasi dan manajemen pengguna yang sudah ada di Laravel agar selaras dengan spesifikasi pada PRD, terutama mengenai penerapan Peran Pengguna (User Role).

## Detail Pekerjaan
1. **Pembaruan Skema Tabel `users`**
   - Pastikan terdapat kolom `role` pada tabel `users`.
   - Role yang diizinkan sesuai PRD: `Superadmin`, `Admin`, `Member`.
   - Buat migration untuk memodifikasi atau menambahkan kolom role (jika belum ada/sesuai).

2. **Data Dummy & Seeder**
   - Buat atau perbarui seeder yang sudah ada (misal `UserSeeder`) untuk membuat data dummy bagi setiap role.
   - Target seeder minimal mencakup:
     - 1 akun Superadmin.
     - 2 akun Admin.
     - 3-5 akun Member (yang nantinya dapat direlasikan dengan tabel anggota).

3. **Penyesuaian Logika CRUD User**
   - Sesuaikan Controller/Views (atau API) untuk Create, Read, Update, dan Delete pengguna agar memuat pengaturan Role.
   - PENTING: Wajib mengikuti standar coding style, pola arsitektur, dan konvensi penamaan yang sudah *existing* (berjalan saat ini) pada modul user. Dilarang membuat pola baru yang tidak konsisten dengan codebase saat ini.

4. **Kriteria Selesai (Acceptance Criteria)**
   - Saat database di-*migrate* ulang dan di-*seed*, user dengan role `Superadmin`, `Admin`, dan `Member` sukses terbentuk.
   - Halaman Manajemen User (jika ada) berhasil menampilkan, menambah, dan mengedit user beserta role-nya menggunakan pola bawaan yang ada di proyek.
