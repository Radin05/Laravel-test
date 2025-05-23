<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = 'rumah_sakits';

    protected $fillable = ['nama_rumah_sakit', 'alamat', 'email'];

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id_rumah_sakit');
    }
}
