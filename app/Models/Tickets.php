<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'travel_date',
        'flight_number',
        'door_number',
        'hour'
    ] ;
}
