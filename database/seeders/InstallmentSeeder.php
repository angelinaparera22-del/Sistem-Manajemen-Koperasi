<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstallmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activeLoan = \App\Models\Loan::where('status', 'Active')->first();

        if ($activeLoan) {
            // Paid Installment
            \App\Models\Installment::create([
                'loan_id' => $activeLoan->id,
                'amount_paid' => ($activeLoan->amount / $activeLoan->tenor) + ($activeLoan->amount * $activeLoan->interest_rate / 100),
                'penalty_amount' => 0,
                'payment_date' => now()->subDays(5),
                'due_date' => now()->subDays(10),
                'status' => 'Paid',
            ]);

            // Unpaid Installment
            \App\Models\Installment::create([
                'loan_id' => $activeLoan->id,
                'amount_paid' => 0,
                'penalty_amount' => 0,
                'due_date' => now()->addDays(20),
                'status' => 'Unpaid',
            ]);
        }
    }
}
