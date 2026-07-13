<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg p-4">
                <h5 class="fw-bold mb-4"><i class="bx bx-edit"></i> Edit Jurnal Kas</h5>

                <form action="{{ route('cash-journal.update', $cashJournal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Tipe Transaksi</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                            <option value="Income" {{ old('type', $cashJournal->type) == 'Income' ? 'selected' : '' }}>Pemasukan (Income)</option>
                            <option value="Expense" {{ old('type', $cashJournal->type) == 'Expense' ? 'selected' : '' }}>Pengeluaran (Expense)</option>
                        </select>
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $cashJournal->category) }}" required>
                        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nominal (Rp)</label>
                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $cashJournal->amount) }}" required min="1">
                        @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" name="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ old('transaction_date', $cashJournal->transaction_date) }}" required>
                        @error('transaction_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan (Opsional)</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $cashJournal->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('cash-journal.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning">Perbarui Transaksi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
