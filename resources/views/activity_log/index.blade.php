<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow-lg p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0"><i class='bx bx-history'></i> Audit Trail (Log Aktivitas)</h5>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data-table">
                <thead class="table-light">
                    <tr>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Aksi</th>
                        <th>Modul</th>
                        <th>IP Address</th>
                        <th>Detail Perubahan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->created_at->format('d M Y, H:i:s') }}</td>
                            <td>
                                @if($log->user)
                                    <strong>{{ $log->user->name }}</strong> ({{ $log->user->role }})
                                @else
                                    <span class="text-muted">Sistem / Guest</span>
                                @endif
                            </td>
                            <td><span class="badge bg-secondary">{{ $log->action }}</span></td>
                            <td>
                                {{ class_basename($log->model_type) }} <br>
                                <small class="text-muted">ID: {{ $log->model_id }}</small>
                            </td>
                            <td>{{ $log->ip_address }}</td>
                            <td>
                                @if($log->details)
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $log->id }}">
                                        Lihat
                                    </button>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="modalDetail{{ $log->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Perubahan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <pre class="bg-light p-3 rounded" style="font-size:12px;">{{ json_encode($log->details, JSON_PRETTY_PRINT) }}</pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>
