<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Symfony\Component\CssSelector\Node\ElementNode;


class Fuzzy extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'fuzzies';
    protected $fillable = [
        'ph',
        'suhu',
        'salinitas',
        'do',
    ];
}
