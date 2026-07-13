<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0"><i class='bx bx-book-content'></i> Jurnal Kas</h5>
            <a href="{{ route('cash-journal.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Tambah Transaksi</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data-table">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Tipe</th>
                        <th>Nominal (Rp)</th>
                        <th>Pencatat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cashJournals as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->transaction_date)->format('d M Y') }}</td>
                            <td>{{ $item->category }}</td>
                            <td>
                                @if($item->type == 'Income')
                                    <span class="badge bg-success">Pemasukan</span>
                                @else
                                    <span class="badge bg-danger">Pengeluaran</span>
                                @endif
                            </td>
                            <td class="fw-bold {{ $item->type == 'Income' ? 'text-success' : 'text-danger' }}">
                                {{ $item->type == 'Income' ? '+' : '-' }} {{ number_format($item->amount, 0, ',', '.') }}
                            </td>
                            <td>{{ $item->creator->name }}</td>
                            <td>
                                <a href="{{ route('cash-journal.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                <form action="{{ route('cash-journal.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>
