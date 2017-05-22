<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function seeker () {
    	return $this->belongsTo('App\Seeker');
    }

    public function getSkillAttribute($value) {
    	return ucfirst($value);
    }
}
