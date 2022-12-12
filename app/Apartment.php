<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = ['apartment_slug', 'user_id', 'apartment_title', 'description', 'bedrooms', 'bed', 'bathrooms', 'sqm', 'category', 'price', 'visible', 'apartment_images', 'address', 'civic_number', 'postalCode', 'countrySubdivision', 'latitude', 'longitude', 'city'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Sponsor');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }
}
