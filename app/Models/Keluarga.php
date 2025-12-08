<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

     public function kepala_keluarga()
    {
        // Parameter sama seperti hasOne, menunjuk ke model 'parent'
        return $this->hasOne(Warga::class, 'id', 'id_kplkeluarga');
    }
}
