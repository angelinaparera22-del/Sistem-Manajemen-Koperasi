<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = \App\Models\User::where('role', 'Member')->get();

        foreach ($members as $index => $user) {
            \App\Models\Member::create([
                'user_id' => $user->id,
                'member_number' => 'M-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'identity_number' => '3271' . rand(100000000000, 999999999999),
                'phone' => '08' . rand(100000000, 999999999),
                'address' => 'Jl. Koperasi No. ' . rand(1, 100),
                'status' => $index % 2 == 0 ? 'Active' : 'Inactive',
                'joined_date' => now()->subDays(rand(1, 365)),
            ]);
        }
    }
}
