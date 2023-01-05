<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public static function create(array $array)
    {
    }

    public static function truncate()
    {
        Country::truncate();
    }
}
