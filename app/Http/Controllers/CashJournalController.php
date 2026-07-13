<?php

namespace App\Http\Controllers;

use App\Models\CashJournal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashJournalController extends Controller
{
    public function index()
    {
        return view('cash_journal.index', [
            'title' => 'Jurnal Kas',
            'cashJournals' => CashJournal::with('creator')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('cash_journal.create', [
            'title' => 'Tambah Jurnal Kas Baru'
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'type' => 'required|in:Income,Expense',
            'amount' => 'required|numeric|min:1',
            'category' => 'required|string|max:255',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        $validate['created_by'] = Auth::id();

        CashJournal::create($validate);

        return to_route('cash-journal.index')->withSuccess('Jurnal kas berhasil ditambahkan.');
    }

    public function edit(CashJournal $cashJournal)
    {
        return view('cash_journal.edit', [
            'title' => 'Edit Jurnal Kas',
            'cashJournal' => $cashJournal
        ]);
    }

    public function update(Request $request, CashJournal $cashJournal)
    {
        $validate = $request->validate([
            'type' => 'required|in:Income,Expense',
            'amount' => 'required|numeric|min:1',
            'category' => 'required|string|max:255',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        $cashJournal->update($validate);

        return to_route('cash-journal.index')->withSuccess('Jurnal kas berhasil diperbarui.');
    }

    public function destroy(CashJournal $cashJournal)
    {
        $cashJournal->delete();
        return to_route('cash-journal.index')->withSuccess('Jurnal kas berhasil dihapus.');
    }
}
