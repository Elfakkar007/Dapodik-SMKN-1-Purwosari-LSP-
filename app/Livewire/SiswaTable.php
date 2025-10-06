<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use Livewire\WithPagination;

class SiswaTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    protected $listeners = [
        'siswaUpdated' => '$refresh',
        'deleteSiswa' => 'deleteSiswa'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function deleteSiswa($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();
            
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Data siswa berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Terjadi kesalahan saat menghapus data.'
            ]);
        }
    }

    public function render()
    {
        $siswas = Siswa::where(function ($query) {
            $query->where('nama_lengkap', 'ilike', '%' . $this->search . '%')
                  ->orWhere('nisn', 'ilike', '%' . $this->search . '%');
        })->latest()->paginate(10); 

        return view('livewire.siswa-table', [
            'siswas' => $siswas,
        ]);
    }
}