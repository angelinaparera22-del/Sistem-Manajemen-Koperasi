<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0">Daftar Anggota</h5>
            <a href="{{ route('member.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Anggota</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Anggota</th>
                        <th>Nama (User)</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Tanggal Gabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member_number }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->identity_number }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                @if($item->status == 'Active')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Non-Aktif</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->joined_date)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('member.edit', $item) }}" class="btn btn-sm btn-warning mb-1"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-danger mb-1" onclick="deleteData('{{ route('member.destroy', $item) }}')"><i class="bi bi-trash"></i></button>
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
