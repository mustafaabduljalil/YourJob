<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    //
    public function user () {
        return $this->belongsTo('App\User');
    }
    public function languages () {
    	return $this->hasMany('App\Language');
    }

    public function skills () {
    	return $this->hasMany('App\Skill');
    }

    public function experiences () {
    	return $this->hasMany('App\Experience');
    }

    public function certificates () {
    	return $this->hasMany('App\Certificate');
    }

    public function educations () {
    	return $this->hasMany('App\Edcuation');
    } 
    
    public function companies () {
    	return $this->belongsToMany('App\Company','companyseekers');
    }             

    public function jobs () {
    	return $this->belongsToMany('App\Job','jobseekers');
    }  

    public function getNameAttribute($value) {
        return ucfirst($value);
    }

    public function getCountryAttribute($value) {
        return ucfirst($value);
    }

    public function getCityAttribute($value) {
        return ucfirst($value);
    }

    public function getAddressAttribute($value) {
        return ucfirst($value);
    }

    public function getJob_TitleAttribute($value) {
        return ucfirst($value);
    }

    public function interesting() {
        return $this->hasMany('App\Interesting');
    }
}
