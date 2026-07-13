<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0">Pengajuan Pinjaman</h5>
            <a href="{{ route('loan.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Ajukan Pinjaman</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Anggota</th>
                        <th>Nominal (Rp)</th>
                        <th>Bunga (%)</th>
                        <th>Tenor (Bulan)</th>
                        <th>Status</th>
                        <th>Tgl Mulai</th>
                        <th>Jatuh Tempo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->user->name }} ({{ $item->member->member_number }})</td>
                            <td>{{ number_format($item->amount, 0, ',', '.') }}</td>
                            <td>{{ $item->interest_rate }}%</td>
                            <td>{{ $item->tenor }}</td>
                            <td>
                                @if($item->status == 'Pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($item->status == 'Approved')
                                    <span class="badge bg-primary">Disetujui</span>
                                @elseif($item->status == 'Rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @elseif($item->status == 'Active')
                                    <span class="badge bg-success">Aktif</span>
                                @elseif($item->status == 'Paid_Off')
                                    <span class="badge bg-secondary">Lunas</span>
                                @endif
                            </td>
                            <td>{{ $item->start_date ? \Carbon\Carbon::parse($item->start_date)->format('d M Y') : '-' }}</td>
                            <td>{{ $item->due_date ? \Carbon\Carbon::parse($item->due_date)->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('loan.edit', $item) }}" class="btn btn-sm btn-warning mb-1"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-danger mb-1" onclick="deleteData('{{ route('loan.destroy', $item) }}')"><i class="bi bi-trash"></i></button>
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
