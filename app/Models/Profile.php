<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'birthdate',
        'status'
    ];

}
