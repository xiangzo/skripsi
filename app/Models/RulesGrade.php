<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class RulesGrade extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'rules_grades';
    protected $fillable = [
        'id_perhitungan',
        'id_rules',
        'ph',
        'temp',
        'salinity',
        'do',
        'grade',
        'nilai_min'
    ];

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class, 'id_perhitungan');
    }

    public function rules()
    {
        return $this->belongsTo(Rules::class, 'id_rules');
    }

    //nilai min
    public function nilaiMin()
    {
        return $this->hasMany(NilaiMin::class, 'id_rules_grade');
    }
}
