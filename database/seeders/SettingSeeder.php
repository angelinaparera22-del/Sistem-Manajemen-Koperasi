<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'app_name', 'value' => 'NiceAdmin Laravel', 'description' => 'Nama Koperasi'],
            ['key' => 'copyright', 'value' => 'Tamus Tahir | 2026', 'description' => 'Teks Hak Cipta'],
            ['key' => 'login_title', 'value' => 'Halaman Login', 'description' => 'Judul Halaman Login'],
            ['key' => 'keywords', 'value' => 'admin, dashboard, laravel, niceadmin, bootstrap', 'description' => 'Kata Kunci (SEO)'],
            ['key' => 'description', 'value' => 'Aplikasi dashboard admin menggunakan Laravel dan NiceAdmin template.', 'description' => 'Deskripsi Aplikasi (SEO)'],
            ['key' => 'interest_rate_default', 'value' => '2.00', 'description' => 'Persentase Bunga Bawaan (%)'],
            ['key' => 'late_penalty_fee', 'value' => '50000', 'description' => 'Denda Keterlambatan Bawaan (Rp)'],
            ['key' => 'logo', 'value' => '', 'description' => 'Logo Aplikasi'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
