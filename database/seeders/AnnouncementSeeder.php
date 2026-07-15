<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Announcement::insert([
            ['title' => 'Rapat Anggota Tahunan 2026', 'content' => 'RAT akan diadakan pada tanggal 20 Agustus 2026 di Aula Koperasi. Semua anggota wajib hadir.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Perubahan Suku Bunga', 'content' => 'Suku bunga pinjaman turun menjadi 1.2% per bulan efektif mulai Agustus.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pemeliharaan Sistem', 'content' => 'Sistem akan mengalami downtime pada hari Minggu 10:00 - 14:00 untuk maintenance rutin.', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pencairan SHU', 'content' => 'Sisa Hasil Usaha tahun 2025 telah dicairkan dan masuk ke saldo simpanan sukarela masing-masing.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Lomba HUT Koperasi', 'content' => 'Dalam rangka HUT Koperasi ke-20, kami mengadakan berbagai perlombaan menarik. Daftarkan tim anda!', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Aturan Baru Peminjaman', 'content' => 'Mulai bulan depan, batas maksimal pinjaman tanpa agunan dinaikkan menjadi Rp 25 Juta.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Program Beasiswa Anak Anggota', 'content' => 'Pendaftaran program beasiswa untuk anak anggota yang berprestasi telah dibuka.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Himbauan Waspada Penipuan', 'content' => 'Harap berhati-hati terhadap oknum yang mengatasnamakan Koperasi. Kami tidak pernah meminta password Anda.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Penghargaan Koperasi Terbaik', 'content' => 'Alhamdulillah, koperasi kita mendapatkan penghargaan sebagai koperasi paling sehat tingkat provinsi.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pembaruan Kebijakan Privasi', 'content' => 'Terdapat pembaruan pada Syarat dan Ketentuan keanggotaan. Silakan cek menu Kebijakan kami.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
