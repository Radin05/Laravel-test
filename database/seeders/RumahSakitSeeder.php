<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    public function run()
    {
        RumahSakit::create([
            'nama_rumah_sakit' => 'Santosa',
            'alamat' => 'Jl. Kopo',
            'email' => 'santosa@gmail.com',
        ]);
    
        RumahSakit::create([
            'nama_rumah_sakit' => 'Dr. Hasan Sadikin Bandung',
            'alamat' => 'Jl. Pasteur',
            'email' => 'rhsb@gmail.com',
        ]);
    
        RumahSakit::create([
            'nama_rumah_sakit' => 'Mayapada  Hospital Bandung',
            'alamat' => 'Jl. Buah Batu',
            'email' => 'mhdb@gmail.com',
        ]);
    
        RumahSakit::create([
            'nama_rumah_sakit' => 'RSUD Al-Ihsan ',
            'alamat' => 'Baleendah',
            'email' => 'alihsan@gmail.com',
        ]);
    }
}
