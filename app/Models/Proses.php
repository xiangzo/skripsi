<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Proses extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'proses';
    protected $fillable = [
        'title',
        'location',
        'name',
        'status',
    ];

    //relasi perhitungan
    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class);
    }
}
