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
        return $query->when($request->airline_id, function ($planes, $airline_id) use($request){
            return $planes->where('airline_id', $request->airline_id);
        }
        )->when($request->name, function ($planes, $name) use($request){
                return $planes->where('name', $request->name);
            }
        )->when($request->passenger_capacity, function ($planes, $passenger_capacity) use($request){
                return $planes->where('passenger_capacity', $request->passenger_capacity);
            }
        )->when($request->manufacturer, function ($planes, $manufacturer) use($request){
                return $planes->where('manufacturer', $request->manufacturer);
        }
        )->when($request->type_plane, function ($planes, $type_plane) use($request){
                return $planes->where('type_plane', $request->type_plane);
        }
        )->when($request->speed, function ($planes, $speed) use($request){
                return $planes->where('speed', $request->speed);
        }
    );
    }

}
