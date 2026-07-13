<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index()
    {
        return view('loan.index', [
            'title' => 'Pinjaman',
            'loans' => Loan::with('member.user')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('loan.create', [
            'title' => 'Ajukan Pinjaman',
            'members' => Member::with('user')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:100000',
            'interest_rate' => 'required|numeric|min:0',
            'tenor' => 'required|integer|min:1',
            'status' => 'required|in:Pending,Approved,Rejected,Active,Paid_Off',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        DB::beginTransaction();
        try {
            Loan::create($validate);
            DB::commit();
            return to_route('loan.index')->withSuccess('Pengajuan pinjaman berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('loan.create')->withError('Gagal menambahkan pinjaman: ' . $e->getMessage());
        }
    }

    public function edit(Loan $loan)
    {
        return view('loan.edit', [
            'title' => 'Edit Pinjaman',
            'loan' => $loan,
            'members' => Member::with('user')->get(),
        ]);
    }

    public function update(Request $request, Loan $loan)
    {
        $validate = $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:100000',
            'interest_rate' => 'required|numeric|min:0',
            'tenor' => 'required|integer|min:1',
            'status' => 'required|in:Pending,Approved,Rejected,Active,Paid_Off',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        DB::beginTransaction();
        try {
            $loan->update($validate);
            DB::commit();
            return to_route('loan.index')->withSuccess('Pengajuan pinjaman berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('loan.edit', $loan)->withError('Gagal mengubah pinjaman: ' . $e->getMessage());
        }
    }

    public function destroy(Loan $loan)
    {
        DB::beginTransaction();
        try {
            $loan->delete();
            DB::commit();
            return to_route('loan.index')->withSuccess('Pengajuan pinjaman berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('loan.index')->withError('Gagal menghapus pinjaman: ' . $e->getMessage());
        }
    }
}
