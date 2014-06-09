<?php

class Optionalsubject extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'optionalSubjectDescription' => 'required'
	);
}