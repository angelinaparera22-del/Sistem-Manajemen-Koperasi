<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <form action="{{ route('loan.update', $loan) }}" method="post" class="form">
            @csrf
            @method('put')

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="member_id" class="form-label required">Anggota Koperasi</label>
                        <select class="form-select select2-default @error('member_id') is-invalid  @enderror" id="member_id" name="member_id" required>
                            <option value="">Pilih Anggota</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" @selected(old('member_id', $loan->member_id) == $member->id)>{{ $member->user->name }} ({{ $member->member_number }})</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label required">Nominal Pinjaman (Rp)</label>
                        <input class="form-control @error('amount') is-invalid  @enderror" type="number" min="100000" id="amount" name="amount" required value="{{ old('amount', $loan->amount) }}">
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="interest_rate" class="form-label required">Bunga (%)</label>
                        <input class="form-control @error('interest_rate') is-invalid  @enderror" type="number" step="0.01" min="0" id="interest_rate" name="interest_rate" required value="{{ old('interest_rate', $loan->interest_rate) }}">
                        @error('interest_rate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tenor" class="form-label required">Tenor (Bulan)</label>
                        <input class="form-control @error('tenor') is-invalid  @enderror" type="number" min="1" id="tenor" name="tenor" required value="{{ old('tenor', $loan->tenor) }}">
                        @error('tenor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label required">Status Persetujuan</label>
                        <select class="form-select @error('status') is-invalid  @enderror" id="status" name="status" required>
                            <option value="Pending" @selected(old('status', $loan->status) == 'Pending')>Pending</option>
                            <option value="Approved" @selected(old('status', $loan->status) == 'Approved')>Disetujui (Approved)</option>
                            <option value="Rejected" @selected(old('status', $loan->status) == 'Rejected')>Ditolak (Rejected)</option>
                            <option value="Active" @selected(old('status', $loan->status) == 'Active')>Aktif (Active)</option>
                            <option value="Paid_Off" @selected(old('status', $loan->status) == 'Paid_Off')>Lunas (Paid Off)</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai (Cair)</label>
                        <input class="form-control @error('start_date') is-invalid  @enderror" type="date" id="start_date" name="start_date" value="{{ old('start_date', $loan->start_date) }}">
                        <small class="text-muted">Isi jika status Aktif</small>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Tanggal Jatuh Tempo Pelunasan</label>
                        <input class="form-control @error('due_date') is-invalid  @enderror" type="date" id="due_date" name="due_date" value="{{ old('due_date', $loan->due_date) }}">
                        <small class="text-muted">Isi jika status Aktif</small>
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('loan.index') }}" class="btn btn-warning me-1">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app>
