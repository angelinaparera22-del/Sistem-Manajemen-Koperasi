<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = \App\Models\User::where('role', 'Superadmin')->first();
        if (!$superadmin) return;

        for ($i = 1; $i <= 20; $i++) {
            \App\Models\ActivityLog::create([
                'user_id' => $superadmin->id,
                'action' => 'Dummy Action ' . $i,
                'model_type' => 'App\Models\Dummy',
                'model_id' => $i,
                'details' => json_encode(['foo' => 'bar']),
                'ip_address' => '127.0.0.1',
                'created_at' => now()->subHours(rand(1, 100)),
            ]);
        }
    }
}
