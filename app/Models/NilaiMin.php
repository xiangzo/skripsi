<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NilaiMin extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'nilai_mins';
    protected $fillable = [
        'id_perhitungan',
        'id_rules_grade',
        'nilai_min',
    ];
}
