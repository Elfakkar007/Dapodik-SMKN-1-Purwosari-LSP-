<div>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="bi bi-people-fill me-2"></i> Data Siswa
                </h4>
                <a href="{{ route('siswa.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Siswa
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input wire:model.live.debounce.300ms="search" 
                               type="text" 
                               class="form-control" 
                               placeholder="Cari berdasarkan nama atau NISN...">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswas as $index => $siswa)
                            <tr wire:key="{{ $siswa->id }}">
                                <td>{{ $siswas->firstItem() + $index }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nama_lengkap }}</td>
                                <td><span class="badge bg-info">{{ $siswa->kelas }}</span></td>
                                <td>{{ $siswa->jenis_kelamin }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('siswa.show', $siswa) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('siswa.edit', $siswa) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button onclick="confirmDelete({{ $siswa->id }})" 
                                                class="btn btn-sm btn-danger" 
                                                title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="bi bi-inbox text-muted" style="font-size: 2rem;"></i>
                                        <p class="mt-2 mb-0">Tidak ada data siswa</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $siswas->links() }}
            </div>
        </div>
    </div>

    <div wire:loading wire:target="search" class="position-fixed top-50 start-50 translate-middle">
        <div class="spinner-border text-primary loading-spinner" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            @this.dispatch('deleteSiswa', { id: id });
        }
    });
}
</script>
@endpush