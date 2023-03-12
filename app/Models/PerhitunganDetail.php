<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PerhitunganDetail extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'perhitungan_details';
    protected $fillable = [
        'id_perhitungan',
        'defuzzy',
        'status',
    ];

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class, 'id_perhitungan');
    }
}
