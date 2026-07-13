<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers = \App\Models\Member::count();
        
        $totalDeposit = \App\Models\Saving::where('transaction_type', 'Deposit')->sum('amount');
        $totalWithdrawal = \App\Models\Saving::where('transaction_type', 'Withdrawal')->sum('amount');
        $totalSavings = $totalDeposit - $totalWithdrawal;

        $totalActiveLoans = \App\Models\Loan::where('status', 'Active')->sum('amount');
        
        $totalInstallmentsPaid = \App\Models\Installment::where('status', 'Paid')
            ->selectRaw('SUM(amount_paid + penalty_amount) as total')
            ->value('total') ?? 0;

        $cashIncome = \App\Models\CashJournal::where('type', 'Income')->sum('amount');
        $cashExpense = \App\Models\CashJournal::where('type', 'Expense')->sum('amount');
        $totalCash = $cashIncome - $cashExpense;

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'totalMembers' => $totalMembers,
            'totalSavings' => $totalSavings,
            'totalActiveLoans' => $totalActiveLoans,
            'totalInstallmentsPaid' => $totalInstallmentsPaid,
            'totalCash' => $totalCash,
        ]);
    }

    public function show()
    {
        return view('dashboard.show', [
            'title' => 'My Profile',
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('dashboard.edit', [
            'title' => 'Edit Profile',
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $validate = $request->validate([
                'name' => 'required',
                'password' => 'nullable|min:8',
                'passwordconfirm' => 'nullable|same:password',
                'email' => 'required|email|lowercase|unique:users,email,' . $user->id,
                'avatar' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:512'
            ], [
                'name.required' => 'Nama wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
                'passwordconfirm.same' => 'Konfirmasi password tidak cocok',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'avatar.image' => 'File avatar harus berupa gambar',
                'avatar.mimes' => 'Format avatar harus png, jpg, jpeg, atau svg',
                'avatar.max' => 'Ukuran avatar tidak boleh lebih dari 512 KB',
            ]);

            if ($request->file('avatar')) {
                $validate['avatar'] = $request->file('avatar')->store('img', 'public');
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }
            }

            if ($request->password) {
                $validate['password'] = bcrypt($request->password);
            } else {
                unset($validate['password']);
            }
            $user->update($validate);

            DB::commit();
            return to_route('dashboard.show')->withSuccess('Data berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('dashboard.edit')->withError('Gagal mengubah data: ' . $e->getMessage());
        }
    }
}
