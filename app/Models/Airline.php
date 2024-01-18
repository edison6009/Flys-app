<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'code_phone',
        'phone'
    ];

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function plane()
    {
        return $this->hasMany(Plane::class,'airline_id','id');
    }

    public function scopeFiltra($query, $request){

        return $query->when($request->name, function ($Airlines, $name){
            return $Airlines->where('name',$name);
        }
    )->when($request->country_id, function ($Airlines, $country_id){
            return $Airlines->where('country_id', $country_id);
        }
    )->when($request->phone, function ($Airlines, $phone){
            return $Airlines->where('phone', $phone);
    }
    )->when($request->code_phone, function ($Airlines, $code_phone){
            return $Airlines->where('code_phone', $code_phone);
    });

}

}

