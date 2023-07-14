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

    public function alternatif(): BelongsTo
    {
        return $this->hasMany(Perhitungan::class);
    }
}
