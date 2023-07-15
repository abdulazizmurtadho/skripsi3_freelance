<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Alternatif;

class Perhitungan extends Model
{
    use HasFactory;

    protected $table = 'perhitungans';
    protected $fillable = [
    	'alternatifs_id', 'kriterias_id', 'hasil'
    ];

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class, 'alternatif_id', 'id');
    }

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'kriteria_id', 'id');
    }
}
