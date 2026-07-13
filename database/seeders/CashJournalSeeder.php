<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CashJournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = \App\Models\User::where('role', 'Superadmin')->first();
        if (!$superadmin) return;

        for ($i = 1; $i <= 10; $i++) {
            \App\Models\CashJournal::create([
                'type' => 'Expense',
                'amount' => rand(10, 50) * 10000,
                'category' => 'Operasional',
                'description' => 'Biaya operasional bulan ' . $i,
                'transaction_date' => now()->subDays(rand(1, 100)),
                'created_by' => $superadmin->id,
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            \App\Models\CashJournal::create([
                'type' => 'Income',
                'amount' => rand(50, 100) * 10000,
                'category' => 'Lain-lain',
                'description' => 'Pemasukan tambahan ' . $i,
                'transaction_date' => now()->subDays(rand(1, 100)),
                'created_by' => $superadmin->id,
            ]);
        }
    }
}
