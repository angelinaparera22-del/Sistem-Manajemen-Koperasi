<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShuDistributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = \App\Models\Member::all();
        if($members->count() < 2) return;

        // High SHU for member 0
        \App\Models\ShuDistribution::create([
            'member_id' => $members[0]->id,
            'period_year' => now()->year - 1,
            'total_savings_point' => 1500,
            'total_loan_point' => 500,
            'amount_received' => 2500000,
            'status' => 'Distributed',
            'distributed_date' => now()->subMonths(6),
        ]);

        // Low SHU for member 1
        \App\Models\ShuDistribution::create([
            'member_id' => $members[1]->id,
            'period_year' => now()->year - 1,
            'total_savings_point' => 200,
            'total_loan_point' => 100,
            'amount_received' => 350000,
            'status' => 'Pending',
        ]);
    }
}
