<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'code_phone',
        'phone',
        'type_document_id',
        'birthdate',
        'number_document',
        'url'
    ];


    public function typeDocument()
    {
        return $this->hasOne(TypeDocument::class,'id','type_document_id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class,'client_id','id');
    }

    public function incident()
    {
        return $this->hasMany(Incident::class,'client_id','id');
    }

    public function scopebusca ($query, $request)
    {

        return $query->when($request->client_id, function ($Clients, $client_id) {
            return $Clients->where('client_id',$client_id);
        }
    )->when($request->email, function ($Clients, $email) {
            return $Clients->where('email',$email);
        }
    )->when($request->last_name, function ($Clients, $last_name) {
            return $$Clients->where('last_name',$last_name);
    }
    )->when($request->code_phone, function ($Clients, $code_phone) {
            return $Clients->where('code_phone',$code_phone);
    }
    )->when($request->phone, function ($Clients, $phone) {
            return $Clients->where('phone',$phone);
    }
    )->when($request->type_document_id, function ($Clients, $type_document_id) {
            return $Clients->where('type_document_id',$type_document_id);
    }
    )->when($request->birthdate, function ($Clients, $birthdate) {
            return $Clients->where('birthdate',$birthdate);
    }
    )->when($request->number_document, function ($Clients, $number_document) {
            return $Clients->where('number_document',$number_document);
    }
);

    }
}
