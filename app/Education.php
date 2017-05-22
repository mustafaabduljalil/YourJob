<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
     public function seeker () {
    	return $this->belongsTo('App\Seeker');
    }
}
