<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Expense::insert([
            ['title' => 'Pembelian Alat Tulis Kantor', 'amount' => 500000, 'date' => '2026-07-01', 'description' => 'Beli kertas, pulpen, stempel, dll', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Tagihan Listrik Bulan Juni', 'amount' => 1200000, 'date' => '2026-07-05', 'description' => 'Pembayaran PLN kantor koperasi', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Air PAM', 'amount' => 300000, 'date' => '2026-07-05', 'description' => 'Pembayaran PDAM', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Internet & Telepon', 'amount' => 850000, 'date' => '2026-07-06', 'description' => 'Langganan IndiHome', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Konsumsi Rapat Pengurus', 'amount' => 250000, 'date' => '2026-07-10', 'description' => 'Makan siang dan snack rapat', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Perbaikan Printer', 'amount' => 450000, 'date' => '2026-07-12', 'description' => 'Servis printer Epson L3110', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Gaji Karyawan Koperasi', 'amount' => 15000000, 'date' => '2026-07-25', 'description' => 'Pembayaran gaji 3 staf administrasi', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Iuran Kebersihan Keamanan', 'amount' => 100000, 'date' => '2026-07-26', 'description' => 'Iuran lingkungan ruko', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Biaya Transportasi', 'amount' => 150000, 'date' => '2026-07-28', 'description' => 'Bensin survei calon peminjam', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pembelian Kopi & Gula', 'amount' => 80000, 'date' => '2026-07-29', 'description' => 'Kebutuhan pantry kantor', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
