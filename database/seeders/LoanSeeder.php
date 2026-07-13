<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = \App\Models\Member::all();
        if($members->count() < 2) return;

        // Pending Loan
        \App\Models\Loan::create([
            'member_id' => $members[0]->id,
            'amount' => 10000000,
            'interest_rate' => 1.5,
            'tenor' => 12,
            'status' => 'Pending',
        ]);

        // Active Loan
        \App\Models\Loan::create([
            'member_id' => $members[1]->id,
            'amount' => 5000000,
            'interest_rate' => 1.0,
            'tenor' => 6,
            'status' => 'Active',
            'start_date' => now()->subMonths(1),
            'due_date' => now()->addMonths(5),
        ]);
    }
}
