<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">

        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data" class="form">
            @csrf
            @method('put')

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="app_name" class="form-label required">Nama Aplikasi</label>
                    <input class="form-control @error('app_name') is-invalid  @enderror" type="text" id="app_name"
                        name="app_name" required value="{{ old('app_name', $setting->app_name) }}">
                    @error('app_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-8">
                    <label for="login_title" class="form-label required">Judul Halaman Login</label>
                    <input class="form-control @error('login_title') is-invalid  @enderror" type="text"
                        id="login_title" name="login_title" required
                        value="{{ old('login_title', $setting->login_title) }}">
                    @error('login_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="copyright" class="form-label required">Copyright</label>
                    <input class="form-control @error('copyright') is-invalid  @enderror" type="text" id="copyright"
                        name="copyright" required value="{{ old('copyright', $setting->copyright) }}">
                    @error('copyright')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input class="form-control @error('keywords') is-invalid  @enderror" type="text" id="keywords"
                        name="keywords" value="{{ old('keywords', $setting->keywords) }}">
                    @error('keywords')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid  @enderror" id="description" name="description"
                        cols="30" rows="3">{{ old('description', $setting->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="interest_rate_default" class="form-label required">Bunga Default (%)</label>
                    <input class="form-control @error('interest_rate_default') is-invalid  @enderror" type="number" step="0.01" id="interest_rate_default"
                        name="interest_rate_default" required value="{{ old('interest_rate_default', $setting->interest_rate_default ?? 2.00) }}">
                    @error('interest_rate_default')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="late_penalty_fee" class="form-label required">Denda Keterlambatan (Rp)</label>
                    <input class="form-control @error('late_penalty_fee') is-invalid  @enderror" type="number" id="late_penalty_fee"
                        name="late_penalty_fee" required value="{{ old('late_penalty_fee', $setting->late_penalty_fee ?? 50000) }}">
                    @error('late_penalty_fee')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input class="form-control @error('logo') is-invalid  @enderror" type="file" id="upload"
                        name="logo">
                    @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <img src="{{ $setting->logo ? asset('storage/' . $setting->logo) : asset('niceadmin/img/laravel.png') }}"
                        alt="logo" class="w-100 rounded mt-2" id="preview">
                </div>

            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>

    @push('modals')
    @endpush

    @push('scripts')
    @endpush

</x-app>
