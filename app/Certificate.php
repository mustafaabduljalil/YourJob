<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //
    public function seeker () {
    	return $this->belongsTo('App\Seeker');
    } 
}
