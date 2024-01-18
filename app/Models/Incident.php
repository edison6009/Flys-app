<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $fillable = [
    'client_id',
     'name',
     'last_name',
     'identifiction',
     'time',
     'event',
     'event_description',
     'Berries'
     ] ;

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function scopeFiltrar($query,$request)
    {
        return $query->when($request->client_id, function ($Incidents, $client_id){
            return $Incidents->where('client_id', $client_id);
            }
        )->when($request->name, function ($Incidents, $name){
                return $Incidents->where('name', $name);
            }
        )->when($request->last_name, function ($Incidents, $last_name){
                return $Incidents->where('last_name', $last_name);
            }
        )->when($request->identifiction, function ($Incidents, $identifiction){
                return $Incidents->where('identifiction', $identifiction);
            }
        )->when($request->time, function ($Incidents, $time){
                return $Incidents->where('time', $time);
            }
        )->when($request->event, function ($Incidents, $event){
                return $Incidents->where('event', $event);
            }
        )->when($request->Berries, function ($Incidents, $Berries){
                return $Incidents->where('Berries', $Berries);
            }
        )->when($request->event_description, function ($Incidents, $event_description){
                return $Incidents->where('event_description', $event_description);
            });
    }

}

