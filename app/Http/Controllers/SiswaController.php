<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Siswa;
use Carbon\Carbon;

class SiswaController extends Controller
{
    
    public function index()
    {
     
        return view('siswa.index');
    }


    public function create()
    {
        return view('siswa.create');
    }

  
    public function store(StoreSiswaRequest $request)
    {
        $validated = $request->validated();
     
        $validated['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $validated['tanggal_lahir'])->format('Y-m-d');

        Siswa::create($validated);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

   
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

   
    public function edit(Siswa $siswa)
    {
      
        $siswa->tanggal_lahir_formatted = Carbon::parse($siswa->tanggal_lahir)->format('d/m/Y');
        return view('siswa.edit', compact('siswa'));
    }

 
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $validated = $request->validated();
        $validated['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $validated['tanggal_lahir'])->format('Y-m-d');

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

  
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return response()->json(['message' => 'Data siswa berhasil dihapus!']);
    }
}
