<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postal_code',
    ];

    public function airline()
    {
        return $this->hasMany(Airline::class,'country_id','id');
    }

    public function infrastructure()
    {
        return $this->hasMany(Infrastructure::class,'country_id','id');
    }

    public function scopeFiltrar($query, $request)

    {
        return $query->when($request->name, function ($countrys, $name){
            return $countrys->where('name', $name);
            }
        )->when($request->postal_code, function ($countrys, $postal_code) {
                return $countrys->where('postal_code', $postal_code);
            }    );

    }


}
