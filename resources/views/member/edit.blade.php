<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <form action="{{ route('member.update', $member) }}" method="post" class="form">
            @csrf
            @method('put')

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Akun User</label>
                        <input class="form-control" type="text" value="{{ $member->user->name }} ({{ $member->user->email }})" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="member_number" class="form-label required">Nomor Anggota</label>
                        <input class="form-control @error('member_number') is-invalid  @enderror" type="text" id="member_number" name="member_number" required value="{{ old('member_number', $member->member_number) }}">
                        @error('member_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="identity_number" class="form-label required">NIK KTP</label>
                        <input class="form-control @error('identity_number') is-invalid  @enderror" type="text" id="identity_number" name="identity_number" required value="{{ old('identity_number', $member->identity_number) }}">
                        @error('identity_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label required">No HP</label>
                        <input class="form-control @error('phone') is-invalid  @enderror" type="text" id="phone" name="phone" required value="{{ old('phone', $member->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="joined_date" class="form-label required">Tanggal Gabung</label>
                        <input class="form-control @error('joined_date') is-invalid  @enderror" type="date" id="joined_date" name="joined_date" required value="{{ old('joined_date', $member->joined_date) }}">
                        @error('joined_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label required">Status</label>
                        <select class="form-select @error('status') is-invalid  @enderror" id="status" name="status" required>
                            <option value="Active" @selected(old('status', $member->status) == 'Active')>Aktif</option>
                            <option value="Inactive" @selected(old('status', $member->status) == 'Inactive')>Non-Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="address" class="form-label required">Alamat</label>
                        <textarea class="form-control @error('address') is-invalid  @enderror" id="address" name="address" required rows="3">{{ old('address', $member->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('member.index') }}" class="btn btn-warning me-1">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</x-app>
