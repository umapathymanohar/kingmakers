<?php

class Coursemaster extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'courseFees' => 'required'
	);

	  public function studentcourse () {
        return $this->hasMany('studentcourse', 'courseselected');
    }
}