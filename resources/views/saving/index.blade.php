<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0">Riwayat Simpanan</h5>
            <a href="{{ route('saving.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Transaksi</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Anggota</th>
                        <th>Tanggal</th>
                        <th>Jenis Simpanan</th>
                        <th>Tipe Transaksi</th>
                        <th>Nominal (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($savings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->user->name }} ({{ $item->member->member_number }})</td>
                            <td>{{ \Carbon\Carbon::parse($item->transaction_date)->format('d M Y') }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                @if($item->transaction_type == 'Deposit')
                                    <span class="badge bg-success">Setoran Masuk</span>
                                @else
                                    <span class="badge bg-warning text-dark">Penarikan Keluar</span>
                                @endif
                            </td>
                            <td>{{ number_format($item->amount, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('saving.edit', $item) }}" class="btn btn-sm btn-warning mb-1"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-danger mb-1" onclick="deleteData('{{ route('saving.destroy', $item) }}')"><i class="bi bi-trash"></i></button>
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
