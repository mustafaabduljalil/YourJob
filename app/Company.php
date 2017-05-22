<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function user () {
        return $this->belongsTo('App\User');
    }
    public function courses () {

    	return $this->hasMany('App\Course');
    }

    public function jobs () {

    	return $this->hasMany('App\Job');
    }

    public function seekers () {

    	return $this->belongsToMany('App\Seeker','companyseekers');
    }    

    public function getNameAttribute($value) {
        return ucfirst($value);
    }

    public function getCityAttribute($value) {
        return ucfirst($value);
    }

    public function getAddressAttribute($value) {
        return ucfirst($value);
    }

    public function getCountryAttribute($value) {
        return ucfirst($value);
    }

        public function getFieldAttribute($value) {
        return ucfirst($value);
    }
}
