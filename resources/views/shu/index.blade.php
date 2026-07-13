<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0">Riwayat Sisa Hasil Usaha (SHU)</h5>
            <form action="{{ route('shu.calculate') }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="period_year" value="{{ now()->year }}">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Proses kalkulasi ini akan menghitung ulang poin simpanan/pinjaman semua anggota. Lanjutkan?')"><i class="bi bi-calculator me-1"></i> Kalkulasi SHU Tahun Ini</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode (Tahun)</th>
                        <th>Anggota</th>
                        <th>Poin Simpanan</th>
                        <th>Poin Pinjaman</th>
                        <th>Nominal SHU (Rp)</th>
                        <th>Status</th>
                        <th>Tgl Distribusi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shuDistributions as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->period_year }}</td>
                            <td>{{ $item->member->user->name }} ({{ $item->member->member_number }})</td>
                            <td>{{ number_format($item->total_savings_point, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->total_loan_point, 0, ',', '.') }}</td>
                            <td class="fw-bold text-success">{{ number_format($item->amount_received, 0, ',', '.') }}</td>
                            <td>
                                @if($item->status == 'Distributed')
                                    <span class="badge bg-success">Telah Dibagikan</span>
                                @else
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @endif
                            </td>
                            <td>{{ $item->distributed_date ? \Carbon\Carbon::parse($item->distributed_date)->format('d M Y') : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>
