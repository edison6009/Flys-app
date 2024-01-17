<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;
    protected $fillable = [
        'airline_id',
        'name',
        'passenger_capacity',
        'manufacturer',
        'type_plane',
        'speed'
    ];
}
