<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SavingController extends Controller
{
    public function index()
    {
        return view('saving.index', [
            'title' => 'Simpanan',
            'savings' => Saving::with('member.user')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('saving.create', [
            'title' => 'Tambah Transaksi Simpanan',
            'members' => Member::with('user')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'member_id' => 'required|exists:members,id',
            'type' => 'required|in:Pokok,Wajib,Sukarela',
            'amount' => 'required|numeric|min:1',
            'transaction_type' => 'required|in:Deposit,Withdrawal',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            Saving::create($validate);
            DB::commit();
            return to_route('saving.index')->withSuccess('Transaksi simpanan berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('saving.create')->withError('Gagal menambahkan transaksi: ' . $e->getMessage());
        }
    }

    public function edit(Saving $saving)
    {
        return view('saving.edit', [
            'title' => 'Edit Transaksi Simpanan',
            'saving' => $saving,
            'members' => Member::with('user')->get(),
        ]);
    }

    public function update(Request $request, Saving $saving)
    {
        $validate = $request->validate([
            'member_id' => 'required|exists:members,id',
            'type' => 'required|in:Pokok,Wajib,Sukarela',
            'amount' => 'required|numeric|min:1',
            'transaction_type' => 'required|in:Deposit,Withdrawal',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $saving->update($validate);
            DB::commit();
            return to_route('saving.index')->withSuccess('Transaksi simpanan berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('saving.edit', $saving)->withError('Gagal mengubah transaksi: ' . $e->getMessage());
        }
    }

    public function destroy(Saving $saving)
    {
        DB::beginTransaction();
        try {
            $saving->delete();
            DB::commit();
            return to_route('saving.index')->withSuccess('Transaksi simpanan berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('saving.index')->withError('Gagal menghapus transaksi: ' . $e->getMessage());
        }
    }
}
