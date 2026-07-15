<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Agenda::insert([
            ['title' => 'Rapat Panitia RAT', 'date' => '2026-08-10 09:00:00', 'location' => 'Ruang Rapat Koperasi', 'description' => 'Membahas persiapan teknis RAT 2026', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Rapat Anggota Tahunan', 'date' => '2026-08-20 08:00:00', 'location' => 'Aula Utama Koperasi', 'description' => 'Pelaksanaan RAT Tahun Buku 2025', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Audit Keuangan Internal', 'date' => '2026-07-25 09:00:00', 'location' => 'Ruang Pengawas', 'description' => 'Audit bulanan oleh badan pengawas', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Rapat Pengurus Bulanan', 'date' => '2026-08-01 13:00:00', 'location' => 'Ruang Rapat Koperasi', 'description' => 'Rapat rutin evaluasi kinerja', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sosialisasi Produk Pinjaman', 'date' => '2026-08-05 10:00:00', 'location' => 'Balai Desa', 'description' => 'Sosialisasi pinjaman modal usaha', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pembagian SHU Tahap 1', 'date' => '2026-08-25 08:00:00', 'location' => 'Teller Koperasi', 'description' => 'Pembagian Sisa Hasil Usaha ke anggota tunai', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pelatihan Kewirausahaan Anggota', 'date' => '2026-09-02 09:00:00', 'location' => 'Gedung Serbaguna', 'description' => 'Pelatihan UMKM khusus anggota', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kunjungan Dinas Koperasi', 'date' => '2026-09-10 10:00:00', 'location' => 'Kantor Koperasi', 'description' => 'Kunjungan monitoring dari dinas terkait', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Bakti Sosial Donor Darah', 'date' => '2026-09-15 08:00:00', 'location' => 'Halaman Koperasi', 'description' => 'Kerjasama dengan PMI setempat', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Rapat Evaluasi Triwulan 3', 'date' => '2026-10-05 13:00:00', 'location' => 'Ruang Rapat Koperasi', 'description' => 'Evaluasi kinerja kuartal ketiga', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
