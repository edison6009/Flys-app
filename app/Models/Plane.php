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
        'speed',
        'url',
        'pokemon'
    ];

    public function airline()
    {
        return $this->hasOne(Airline::class,'id','airline_id');
    }

    public function scopeFiltrar($query, $request)

    {
        return $query->when($request->airline_id, function ($planes, $airline_id){
            return $planes->where('airline_id', $airline_id);
        }
        )->when($request->name, function ($planes, $name){
                return $planes->where('name', $name);
            }
        )->when($request->passenger_capacity, function ($planes, $passenger_capacity){
                return $planes->where('passenger_capacity', $passenger_capacity);
            }
        )->when($request->manufacturer, function ($planes, $manufacturer){
                return $planes->where('manufacturer', $manufacturer);
        }
        )->when($request->type_plane, function ($planes, $type_plane){
                return $planes->where('type_plane', $type_plane);
        }
        )->when($request->speed, function ($planes, $speed){
                return $planes->where('speed', $speed);
        }
    );
    }

}
