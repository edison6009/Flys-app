<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'client_id',
        'plane_id',
        'travel_date',
        'flight_number',
        'door_number',
        'hour'
    ] ;

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function plane()
    {
        return $this->hasOne(Plane::class,'id','plane_id');
    }

    public function scopeFiltrar($query, $request)
    {
        return $query->when($request->client_id, function ($tickets, $client_id){
            return $tickets->where('client_id', $client_id);
        }
        )->when($request->plane_id, function ($tickets, $plane_id){
                return $tickets->where('plane_id', $plane_id);
            }
        )->when($request->travel_date, function ($tickets, $travel_date){
                return $tickets->where('travel_date', $travel_date);
        }
        )->when($request->flight_number, function ($tickets, $flight_number){
                return $tickets->where('flight_number', $flight_number);
        }
        )->when($request->door_number, function ($tickets, $door_number){
                return $tickets->where('door_number', $door_number);
        }
        )->when($request->hour, function ($tickets, $hour){
                return $tickets->where('hour', $hour);
        }
    );

    }

}
