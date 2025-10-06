@extends('layouts.app')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0 d-flex justify-content-between align-items-center">
            <span><i class="bi bi-person-fill"></i> Detail Siswa</span>
            <div>
                 <a href="{{ route('siswa.edit', $siswa) }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Edit</a>
                 <a href="{{ route('siswa.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </h4>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <i class="bi bi-person-circle" style="font-size: 8rem; color: #6c757d;"></i>
                <h5 class="mt-3">{{ $siswa->nama_lengkap }}</h5>
                <p class="text-muted mb-1">NISN: {{ $siswa->nisn }}</p>
                <span class="badge bg-success fs-6">{{ $siswa->kelas }}</span>
            </div>
            <div class="col-md-9">
                 <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Informasi Pribadi</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 30%;">Jenis Kelamin</th>
                                <td>: {{ $siswa->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>: {{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $siswa->alamat }}</td>
                            </tr>
                             <tr>
                                <th>No. Telepon</th>
                                <td>: {{ $siswa->telepon }}</td>
                            </tr>
                            <tr>
                                <th>Terdaftar</th>
                                <td>: {{ $siswa->created_at->translatedFormat('d F Y') }}</td>
                            </tr>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
