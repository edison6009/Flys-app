<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;

    protected $fillable = [
            'airport_name',
            'country_id',
            'number_landing_strips',
            'number_terminals',
            'number_boarding_gates',
            'number_public_toilets',
            'number_shops',
            'number_restaurants',
            'maximum_people',
    ];

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function scopeFiltrar ($query, $request)
    {
        return $query->when($request->airport_name, function ($infrastructures, $airport_name){
        return $infrastructures->where('airport_name', $airport_name);
            }
        )->when($request->country_id, function ($infrastructures, $country_id){
                return $infrastructures->where('country_id', $country_id);
            }
        )->when($request->number_landing_strips, function ($infrastructures, $number_landing_strips){
                return $$infrastructures->where('number_landing_strips', $number_landing_strips);
        }
        )->when($request->number_terminals, function ($infrastructures, $number_terminals){
                return $infrastructures->where('number_terminals', $number_terminals);
        }
        )->when($request->number_boarding_gates, function ($infrastructures, $number_boarding_gates){
                return $infrastructures->where('number_boarding_gates', $number_boarding_gates);
        }
        )->when($request->number_public_toilets, function ($infrastructures, $number_public_toilets){
                return $infrastructures->where('number_public_toilets', $number_public_toilets);
        }
        )->when($request->number_shops, function ($infrastructures, $number_shops){
                return $infrastructures->where('number_shops', $number_shops);
        }
        )->when($request->number_restaurants, function ($infrastructures, $number_restaurants){
                return $infrastructures->where('number_restaurants', $number_restaurants);
        }
        )->when($request->maximum_people, function ($infrastructures, $maximum_people){
                return $infrastructures->where('maximum_people', $maximum_people);
        }
    );
    }
}
