<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallmentController extends Controller
{
    public function index()
    {
        return view('installment.index', [
            'title' => 'Angsuran',
            'installments' => Installment::with('loan.member.user')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('installment.create', [
            'title' => 'Catat Angsuran',
            'loans' => Loan::with('member.user')->where('status', 'Active')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount_paid' => 'required|numeric|min:0',
            'penalty_amount' => 'required|numeric|min:0',
            'payment_date' => 'nullable|date',
            'due_date' => 'required|date',
            'status' => 'required|in:Paid,Unpaid,Late',
        ]);

        DB::beginTransaction();
        try {
            Installment::create($validate);
            DB::commit();
            return to_route('installment.index')->withSuccess('Data angsuran berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('installment.create')->withError('Gagal menambahkan angsuran: ' . $e->getMessage());
        }
    }

    public function edit(Installment $installment)
    {
        return view('installment.edit', [
            'title' => 'Edit Angsuran',
            'installment' => $installment,
            'loans' => Loan::with('member.user')->where('status', 'Active')->get(),
        ]);
    }

    public function update(Request $request, Installment $installment)
    {
        $validate = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount_paid' => 'required|numeric|min:0',
            'penalty_amount' => 'required|numeric|min:0',
            'payment_date' => 'nullable|date',
            'due_date' => 'required|date',
            'status' => 'required|in:Paid,Unpaid,Late',
        ]);

        DB::beginTransaction();
        try {
            $installment->update($validate);
            DB::commit();
            return to_route('installment.index')->withSuccess('Data angsuran berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('installment.edit', $installment)->withError('Gagal mengubah angsuran: ' . $e->getMessage());
        }
    }

    public function destroy(Installment $installment)
    {
        DB::beginTransaction();
        try {
            $installment->delete();
            DB::commit();
            return to_route('installment.index')->withSuccess('Data angsuran berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('installment.index')->withError('Gagal menghapus angsuran: ' . $e->getMessage());
        }
    }
}
