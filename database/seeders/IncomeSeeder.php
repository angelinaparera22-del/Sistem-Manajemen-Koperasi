<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Income::insert([
            ['title' => 'Sumbangan Donatur', 'amount' => 5000000, 'date' => '2026-07-02', 'description' => 'Sumbangan pengembangan dari Bpk XYZ', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Hasil Penjualan Kalender', 'amount' => 1500000, 'date' => '2026-07-10', 'description' => 'Penjualan kalender tahunan koperasi', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Bagi Hasil Minimarket', 'amount' => 8500000, 'date' => '2026-07-15', 'description' => 'Bagi hasil dari usaha ritel koperasi', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Bunga Deposito Bank', 'amount' => 1200000, 'date' => '2026-07-18', 'description' => 'Pendapatan bunga deposito di Bank ABC', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Denda Keterlambatan Angsuran', 'amount' => 350000, 'date' => '2026-07-20', 'description' => 'Kumpulan denda dari anggota telat bayar', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Penjualan Merchandise Koperasi', 'amount' => 600000, 'date' => '2026-07-22', 'description' => 'Penjualan kaos dan tumbler', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sponsor Event RAT', 'amount' => 2000000, 'date' => '2026-07-25', 'description' => 'Sponsorship dari perusahaan lokal', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pendaftaran Anggota Baru', 'amount' => 1000000, 'date' => '2026-07-28', 'description' => 'Biaya administrasi dari 20 anggota baru', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Hasil Fotokopi', 'amount' => 45000, 'date' => '2026-07-30', 'description' => 'Jasa fotokopi dokumen', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pendapatan Lain-lain', 'amount' => 200000, 'date' => '2026-07-31', 'description' => 'Kelebihan kas atau pendapatan tak terduga', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
