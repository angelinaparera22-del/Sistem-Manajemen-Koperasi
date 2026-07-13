<?php

namespace App\Http\Controllers;

use App\Models\ShuDistribution;
use App\Models\Member;
use Illuminate\Http\Request;

class ShuController extends Controller
{
    public function index()
    {
        return view('shu.index', [
            'title' => 'Riwayat Pembagian SHU',
            'shuDistributions' => ShuDistribution::with('member.user')->latest()->get(),
        ]);
    }

    public function calculate(Request $request)
    {
        // Demonstrasi kalkulasi SHU (Mock logic)
        $members = Member::all();
        $periodYear = $request->period_year ?? now()->year;

        foreach ($members as $member) {
            // Kalkulasi fiktif: 1 poin = Rp1.000 simpanan atau pinjaman (ini hanya mock)
            $totalSavings = $member->savings()->where('transaction_type', 'Deposit')->sum('amount');
            $totalLoans = $member->loans()->where('status', 'Paid_Off')->sum('amount');

            $savingsPoint = intval($totalSavings / 1000);
            $loanPoint = intval($totalLoans / 1000);
            $amountReceived = ($savingsPoint * 100) + ($loanPoint * 50); // Contoh konversi ke rupiah

            if ($amountReceived > 0) {
                ShuDistribution::updateOrCreate(
                    [
                        'member_id' => $member->id,
                        'period_year' => $periodYear,
                    ],
                    [
                        'total_savings_point' => $savingsPoint,
                        'total_loan_point' => $loanPoint,
                        'amount_received' => $amountReceived,
                        'status' => 'Pending',
                    ]
                );
            }
        }

        return to_route('shu.index')->withSuccess('Kalkulasi SHU tahun ' . $periodYear . ' berhasil dieksekusi.');
    }
}
