<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    public function run()
    {
        Pasien::create([
            'nama_pasien' => 'Gempi',
            'alamat' => 'Jl. Peta',
            'no_telepon' => '08219001292',
            'id_rumah_sakit' => 1,
        ]);
    
        Pasien::create([
            'nama_pasien' => 'Felisha',
            'alamat' => 'Jl. Cangkuang',
            'no_telepon' => '082115452003',
            'id_rumah_sakit' => 1,
        ]);
    
        Pasien::create([
            'nama_pasien' => 'Indri',
            'alamat' => 'Ciwidey',
            'no_telepon' => '08219008621',
            'id_rumah_sakit' => 3,
        ]);
    
        Pasien::create([
            'nama_pasien' => 'Yani',
            'alamat' => 'Jl. Pamengpek',
            'no_telepon' => '082225448012',
            'id_rumah_sakit' => 1,
        ]);
    
        Pasien::create([
            'nama_pasien' => 'Marshal',
            'alamat' => 'Jl. Cibaduyut',
            'no_telepon' => '082134620021',
            'id_rumah_sakit' => 2,
        ]);
    
        Pasien::create([
            'nama_pasien' => 'Udin',
            'alamat' => 'Jl. Cangkuang',
            'no_telepon' => '08219076221',
            'id_rumah_sakit' => 2,
        ]);
    
        Pasien::create([
            'nama_pasien' => 'Sepia',
            'alamat' => 'Jl. Cangkuang',
            'no_telepon' => '082122699801',
            'id_rumah_sakit' => 3,
        ]);
    
        Pasien::create([
            'nama_pasien' => 'Bernad',
            'alamat' => 'Jl. Cibaduyut',
            'no_telepon' => '082985520801',
            'id_rumah_sakit' => 3,
        ]);
    }
}
