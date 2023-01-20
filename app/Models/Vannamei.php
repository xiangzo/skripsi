<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Vannamei extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'vannamei';

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'vannamei_image',
    ];
}
