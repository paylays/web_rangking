<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama_kriteria', 'bobot', 'jenis'];

    public function subKriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }
}
