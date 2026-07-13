<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h2 class="mb-4">Selamat Datang, {{ Auth::user()->name }}!</h2>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-group'></i> Anggota Aktif</h5>
                    <h2 class="card-text fw-bold">{{ number_format($totalMembers, 0, ',', '.') }}</h2>
                    <p class="mb-0 small">Total Anggota Koperasi</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-wallet'></i> Simpanan Masuk</h5>
                    <h2 class="card-text fw-bold">Rp{{ number_format($totalSavings, 0, ',', '.') }}</h2>
                    <p class="mb-0 small">Total Dana Tersimpan</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-credit-card'></i> Pinjaman Aktif</h5>
                    <h2 class="card-text fw-bold">Rp{{ number_format($totalActiveLoans, 0, ',', '.') }}</h2>
                    <p class="mb-0 small">Total Pinjaman Berjalan</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-trending-up'></i> Kas Masuk (Cicilan)</h5>
                    <h2 class="card-text fw-bold">Rp{{ number_format($totalInstallmentsPaid, 0, ',', '.') }}</h2>
                    <p class="mb-0 small">Dari Angsuran Terbayar</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-wallet-alt'></i> Saldo Kas Lainnya</h5>
                    <h2 class="card-text fw-bold">Rp{{ number_format($totalCash, 0, ',', '.') }}</h2>
                    <p class="mb-0 small">Total Jurnal Kas Tersedia</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-lg p-4">
                <h5 class="fw-bold"><i class="bx bx-bar-chart-alt-2"></i> Ringkasan Sistem</h5>
                <p>Dasbor ini diperbarui secara *real-time* berdasarkan transaksi yang tercatat pada menu Keanggotaan, Simpanan, Pinjaman, dan Angsuran.</p>
                <hr>
                <a href="{{ route('report.index') }}" class="btn btn-outline-primary"><i class="bx bx-printer"></i> Lihat Laporan Keuangan</a>
            </div>
        </div>
    </div>
</x-app>
