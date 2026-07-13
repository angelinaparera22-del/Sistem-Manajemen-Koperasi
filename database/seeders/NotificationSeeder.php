<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::where('role', 'Admin')->first();
        $member = \App\Models\User::where('role', 'Member')->first();

        if ($admin) {
            $admin->notify(new \App\Notifications\LoanSubmittedNotification());
            // mark some as read
            $admin->notifications()->first()->markAsRead();
            
            $admin->notify(new \App\Notifications\LoanSubmittedNotification());
        }

        if ($member) {
            $member->notify(new \App\Notifications\LoanStatusUpdatedNotification('Approved'));
            $member->notifications()->first()->markAsRead();

            $member->notify(new \App\Notifications\LoanStatusUpdatedNotification('Rejected'));
        }
    }
}
