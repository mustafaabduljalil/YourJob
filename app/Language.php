<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function seeker () {
    	return $this->belongsTo('App\Seeker');
    }

    public function getNameAttribute($value) {

    	return ucfirst($value);
    }
}
