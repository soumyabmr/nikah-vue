<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'first_name',
    'last_name',
    'ethnicity',
    'gender',
    'body_type',
    'complexion',
    'date_of_birth',
    'phone',
    'marital_status',
    'height',
    'weight',
    'education',
    'profession',
    'summary',
    'expectation',
    'country',
    'nationality',
    ];
}
