<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $siswaId = $this->route('siswa')->id;
        return [
            
            'nisn'          => ['required', 'string', 'size:10', Rule::unique('siswas')->ignore($siswaId)],
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date_format:d/m/Y',
            'alamat'        => 'required|string',
            'telepon'       => 'required|string|max:15',
            'kelas'         => 'required|string|max:50',
        ];
    }
}