<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address',
        'country',
        'city',
        'type_id',
        'resolution_code',
        'start_date',
        'end_date',
        'open_file',
        'close_file',
        'start_time'
    ];
}
