<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Izinkan semua user untuk membuat request ini
    }

    public function rules(): array
    {
        return [
            'nisn'          => 'required|string|size:10|unique:siswas,nisn',
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
