<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Rules extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'rules';
    protected $fillable = [
        'ph',
        'temp',
        'salinity',
        'do',
        'grade',
    ];

    public function rulesGrade()
    {
        return $this->hasMany(RulesGrade::class, 'id_rules');
    }
}
