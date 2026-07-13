<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0">Riwayat Angsuran</h5>
            <a href="{{ route('installment.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Catat Angsuran</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Anggota (Pinjaman)</th>
                        <th>Jatuh Tempo</th>
                        <th>Tgl Bayar</th>
                        <th>Nominal Dibayar (Rp)</th>
                        <th>Denda (Rp)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($installments as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->loan->member->user->name }} (Rp{{ number_format($item->loan->amount,0,',','.') }})</td>
                            <td>{{ \Carbon\Carbon::parse($item->due_date)->format('d M Y') }}</td>
                            <td>{{ $item->payment_date ? \Carbon\Carbon::parse($item->payment_date)->format('d M Y') : '-' }}</td>
                            <td>{{ number_format($item->amount_paid, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->penalty_amount, 0, ',', '.') }}</td>
                            <td>
                                @if($item->status == 'Paid')
                                    <span class="badge bg-success">Lunas</span>
                                @elseif($item->status == 'Late')
                                    <span class="badge bg-danger">Terlambat</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum Lunas</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('installment.edit', $item) }}" class="btn btn-sm btn-warning mb-1"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-danger mb-1" onclick="deleteData('{{ route('installment.destroy', $item) }}')"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        function deleteData(url) {
            $('#form-delete').attr('action', url);
            $('#deleteModal').modal('show');
        }
    </script>
    @endpush
</x-app>
