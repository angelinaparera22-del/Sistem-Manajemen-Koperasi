<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Position::insert([
            ['name' => 'Ketua', 'description' => 'Ketua Koperasi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wakil Ketua', 'description' => 'Wakil Ketua Koperasi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sekretaris 1', 'description' => 'Sekretaris Utama', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sekretaris 2', 'description' => 'Sekretaris Pendamping', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bendahara 1', 'description' => 'Bendahara Utama', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bendahara 2', 'description' => 'Bendahara Pendamping', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pengawas 1', 'description' => 'Ketua Pengawas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pengawas 2', 'description' => 'Anggota Pengawas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manajer Operasional', 'description' => 'Manajer Operasional Koperasi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Anggota Biasa', 'description' => 'Anggota Biasa Koperasi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
