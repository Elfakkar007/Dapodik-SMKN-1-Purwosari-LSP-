<?php


namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition(): array
    {
        $kelas = ['X-1', 'X-2', 'X-3', 'XI-1', 'XI-2', 'XI-3', 'XII-1', 'XII-2', 'XII-3'];
        
        return [
            'nisn' => fake()->unique()->numerify('##########'),
            'nama_lengkap' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date('Y-m-d', '-15 years'),
            'alamat' => fake()->address(),
            'telepon' => fake()->numerify('08##########'),
            'kelas' => fake()->randomElement($kelas),
        ];
    }
}