<?php

class Studentcourse extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		
	);

	    public function coursemaster () {
        return $this->belongsTo('coursemaster');
    }
}