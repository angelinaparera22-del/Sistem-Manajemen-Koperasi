<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <form action="{{ route('saving.update', $saving) }}" method="post" class="form">
            @csrf
            @method('put')

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="member_id" class="form-label required">Anggota Koperasi</label>
                        <select class="form-select select2-default @error('member_id') is-invalid  @enderror" id="member_id" name="member_id" required>
                            <option value="">Pilih Anggota</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" @selected(old('member_id', $saving->member_id) == $member->id)>{{ $member->user->name }} ({{ $member->member_number }})</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label required">Jenis Simpanan</label>
                        <select class="form-select @error('type') is-invalid  @enderror" id="type" name="type" required>
                            <option value="">Pilih Jenis</option>
                            <option value="Pokok" @selected(old('type', $saving->type) == 'Pokok')>Pokok</option>
                            <option value="Wajib" @selected(old('type', $saving->type) == 'Wajib')>Wajib</option>
                            <option value="Sukarela" @selected(old('type', $saving->type) == 'Sukarela')>Sukarela</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label required">Nominal (Rp)</label>
                        <input class="form-control @error('amount') is-invalid  @enderror" type="number" min="1" id="amount" name="amount" required value="{{ old('amount', $saving->amount) }}">
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="transaction_type" class="form-label required">Tipe Transaksi</label>
                        <select class="form-select @error('transaction_type') is-invalid  @enderror" id="transaction_type" name="transaction_type" required>
                            <option value="">Pilih Tipe</option>
                            <option value="Deposit" @selected(old('transaction_type', $saving->transaction_type) == 'Deposit')>Setoran Masuk (Deposit)</option>
                            <option value="Withdrawal" @selected(old('transaction_type', $saving->transaction_type) == 'Withdrawal')>Penarikan Keluar (Withdrawal)</option>
                        </select>
                        @error('transaction_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="transaction_date" class="form-label required">Tanggal Transaksi</label>
                        <input class="form-control @error('transaction_date') is-invalid  @enderror" type="date" id="transaction_date" name="transaction_date" required value="{{ old('transaction_date', $saving->transaction_date) }}">
                        @error('transaction_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="notes" class="form-label">Catatan Tambahan</label>
                        <textarea class="form-control @error('notes') is-invalid  @enderror" id="notes" name="notes" rows="3">{{ old('notes', $saving->notes) }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('saving.index') }}" class="btn btn-warning me-1">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app>
