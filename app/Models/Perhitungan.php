<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Perhitungan extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'perhitungans';
    protected $fillable = [
        'proses_id',
        'ph',
        'temp',
        'salinity',
        'do',
        'grade',
    ];

    public function proses()
    {
        return $this->belongsTo(Proses::class, 'proses_id');
    }

    public function rulesGrade()
    {
        return $this->hasMany(RulesGrade::class, 'id_perhitungan');
    }

    public function perhitunganDetail()
    {
        return $this->hasMany(PerhitunganDetail::class, 'id_perhitungan');
    }

}
