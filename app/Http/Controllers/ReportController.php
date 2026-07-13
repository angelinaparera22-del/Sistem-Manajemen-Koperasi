<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data = $this->getReportData();
        return view('report.index', array_merge(['title' => 'Laporan Keuangan'], $data));
    }

    public function exportPdf()
    {
        $data = $this->getReportData();
        $pdf = Pdf::loadView('report.pdf', $data);
        
        return $pdf->download('laporan-keuangan-koperasi.pdf');
    }

    private function getReportData()
    {
        $totalDeposit = \App\Models\Saving::where('transaction_type', 'Deposit')->sum('amount');
        $totalWithdrawal = \App\Models\Saving::where('transaction_type', 'Withdrawal')->sum('amount');
        $saldoSimpanan = $totalDeposit - $totalWithdrawal;

        $totalLoanDisbursed = \App\Models\Loan::whereIn('status', ['Active', 'Paid_Off'])->sum('amount');
        $totalInstallmentPaid = \App\Models\Installment::where('status', 'Paid')->sum('amount_paid');
        $totalPenaltyPaid = \App\Models\Installment::where('status', 'Paid')->sum('penalty_amount');

        return [
            'totalDeposit' => $totalDeposit,
            'totalWithdrawal' => $totalWithdrawal,
            'saldoSimpanan' => $saldoSimpanan,
            'totalLoanDisbursed' => $totalLoanDisbursed,
            'totalInstallmentPaid' => $totalInstallmentPaid,
            'totalPenaltyPaid' => $totalPenaltyPaid,
            'date' => now()->format('d M Y H:i:s')
        ];
    }
}
