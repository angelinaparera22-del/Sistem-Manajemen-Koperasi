<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <form action="{{ route('installment.store') }}" method="post" class="form">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="loan_id" class="form-label required">Pinjaman Aktif</label>
                        <select class="form-select select2-default @error('loan_id') is-invalid  @enderror" id="loan_id" name="loan_id" required>
                            <option value="">Pilih Pinjaman</option>
                            @foreach ($loans as $loan)
                                <option value="{{ $loan->id }}" @selected(old('loan_id') == $loan->id)>{{ $loan->member->user->name }} - Rp{{ number_format($loan->amount, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                        @error('loan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="amount_paid" class="form-label required">Nominal Dibayar (Rp)</label>
                        <input class="form-control @error('amount_paid') is-invalid  @enderror" type="number" min="0" id="amount_paid" name="amount_paid" required value="{{ old('amount_paid', 0) }}">
                        @error('amount_paid')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="penalty_amount" class="form-label required">Denda Keterlambatan (Rp)</label>
                        <input class="form-control @error('penalty_amount') is-invalid  @enderror" type="number" min="0" id="penalty_amount" name="penalty_amount" required value="{{ old('penalty_amount', 0) }}">
                        @error('penalty_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="due_date" class="form-label required">Tanggal Jatuh Tempo Angsuran</label>
                        <input class="form-control @error('due_date') is-invalid  @enderror" type="date" id="due_date" name="due_date" required value="{{ old('due_date') }}">
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Tanggal Bayar Aktual</label>
                        <input class="form-control @error('payment_date') is-invalid  @enderror" type="date" id="payment_date" name="payment_date" value="{{ old('payment_date') }}">
                        <small class="text-muted">Kosongkan jika belum dibayar</small>
                        @error('payment_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label required">Status Pembayaran</label>
                        <select class="form-select @error('status') is-invalid  @enderror" id="status" name="status" required>
                            <option value="Paid" @selected(old('status') == 'Paid')>Lunas (Paid)</option>
                            <option value="Unpaid" @selected(old('status') == 'Unpaid')>Belum Lunas (Unpaid)</option>
                            <option value="Late" @selected(old('status') == 'Late')>Terlambat (Late)</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('installment.index') }}" class="btn btn-warning me-1">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</x-app>
