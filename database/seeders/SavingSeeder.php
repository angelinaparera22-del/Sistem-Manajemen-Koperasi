<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = \App\Models\Member::all();

        foreach ($members as $member) {
            \App\Models\Saving::create([
                'member_id' => $member->id,
                'type' => 'Pokok',
                'amount' => 500000,
                'transaction_type' => 'Deposit',
                'transaction_date' => $member->joined_date,
                'notes' => 'Simpanan Pokok Awal',
            ]);
            \App\Models\Saving::create([
                'member_id' => $member->id,
                'type' => 'Wajib',
                'amount' => 50000,
                'transaction_type' => 'Deposit',
                'transaction_date' => \Carbon\Carbon::parse($member->joined_date)->addMonth(),
                'notes' => 'Simpanan Wajib Bulan 1',
            ]);
        }
    }
}
