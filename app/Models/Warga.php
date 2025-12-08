<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    public function keluarga()
    {
        // Parameter:
        // 1. Nama model yang berelasi (Keluarga::class)
        // 2. Foreign key di tabel 'keluargas' (id_kplkeluarga)
        // 3. Local key di tabel 'wargas' (id)
        return $this->belongsTo(Keluarga::class, 'id', 'id_kplkeluarga');
    }
}
