<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatifs';
    protected $fillable = [
    	'nama', 'alamat', 'nomer'
    ];

    public function perhitungan(): HasMany
    {
        return $this->hasMany(Perhitungan::class);
    }
}
