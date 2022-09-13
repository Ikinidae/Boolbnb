<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'rooms', 'beds', 'bathrooms', 'mq',
        'address', 'latitude', 'longitude', 'image', 'visible',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function visits(){
        return $this->hasMany('App\Models\Visit');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }

    public function sponsorships(){
        return $this->belongsToMany('App\Models\Sponsorship');
    }

}



