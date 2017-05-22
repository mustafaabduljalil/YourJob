<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    public function seeker () {
    	return $this->belongsTo('App\Seeker');
    }    

    public function getExperienceAttribute($value) {
    	return ucfirst($value);
    }
}
