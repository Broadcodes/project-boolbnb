<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['content_message', 'email'];

    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
