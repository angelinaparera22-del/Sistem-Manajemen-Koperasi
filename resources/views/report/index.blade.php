<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0"><i class="bx bx-file"></i> Ringkasan Laporan Keuangan</h4>
            <a href="{{ route('report.export_pdf') }}" class="btn btn-danger"><i class="bx bxs-file-pdf"></i> Unduh PDF</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th colspan="2" class="text-center">REKAPITULASI KEUANGAN KOPERASI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="2" class="bg-light">1. Arus Kas Simpanan</th>
                    </tr>
                    <tr>
                        <td>Total Setoran Masuk</td>
                        <td class="text-end text-success">+ Rp{{ number_format($totalDeposit, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Total Penarikan Keluar</td>
                        <td class="text-end text-danger">- Rp{{ number_format($totalWithdrawal, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="fw-bold">
                        <td>Saldo Simpanan Akhir</td>
                        <td class="text-end">Rp{{ number_format($saldoSimpanan, 0, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <th colspan="2" class="bg-light">2. Arus Kas Pinjaman & Angsuran</th>
                    </tr>
                    <tr>
                        <td>Total Pencairan Pinjaman</td>
                        <td class="text-end text-danger">- Rp{{ number_format($totalLoanDisbursed, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Total Cicilan Pokok & Bunga Masuk</td>
                        <td class="text-end text-success">+ Rp{{ number_format($totalInstallmentPaid, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Total Denda Keterlambatan Masuk</td>
                        <td class="text-end text-success">+ Rp{{ number_format($totalPenaltyPaid, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-muted small mt-2">Data ini dihasilkan secara otomatis dari sistem pada: {{ $date }}</p>
    </div>
</x-app>
