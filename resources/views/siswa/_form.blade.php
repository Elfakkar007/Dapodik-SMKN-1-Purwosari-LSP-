<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $formType === 'edit' ? 'Edit' : 'Tambah' }} Data Siswa</h5>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nisn" class="form-label">NISN <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn ?? '') }}" required>
                @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $siswa->nama_lengkap ?? '') }}" required>
                @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row">
             <div class="col-md-6 mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                <select class="form-select @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required>
                     <option value="">Pilih kelas</option>
                     <option value="X-A" {{ old('kelas', $siswa->kelas ?? '') == 'X-A' ? 'selected' : '' }}>X-A</option>
                     <option value="X-B" {{ old('kelas', $siswa->kelas ?? '') == 'X-B' ? 'selected' : '' }}>X-B</option>
                     <option value="XI-A" {{ old('kelas', $siswa->kelas ?? '') == 'XI-A' ? 'selected' : '' }}>XI-A</option>
                     <option value="XI-B" {{ old('kelas', $siswa->kelas ?? '') == 'XI-B' ? 'selected' : '' }}>XI-B</option>
                     <option value="XII-A" {{ old('kelas', $siswa->kelas ?? '') == 'XII-A' ? 'selected' : '' }}>XII-A</option>
                     <option value="XII-B" {{ old('kelas', $siswa->kelas ?? '') == 'XII-B' ? 'selected' : '' }}>XII-B</option>
                </select>
                @error('kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}" required>
                 @error('tempat_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
             <div class="col-md-6 mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir_formatted ?? '') }}" placeholder="dd/mm/yyyy" required>
                @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
                @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
             <div class="col-md-6 mb-3">
                <label for="telepon" class="form-label">No. Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $siswa->telepon ?? '') }}" required>
                @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

    </div>
    <div class="card-footer text-end">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Simpan Data</button>
    </div>
</div>
