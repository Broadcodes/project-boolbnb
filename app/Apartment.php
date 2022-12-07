<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = ['apartment_slug', 'apartment_title', 'description', 'bedrooms', 'bed', 'bathrooms', 'sqm', 'category', 'price', 'confirmed', 'apartment_images', 'address', 'civic_number', 'state', 'latitude', 'longitude', 'city'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }

    public function sponsots(){
        return $this->belongsToMany('App\Sponsor');
    }
}
