<?php

class Coursecategory extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'coursecategoryDescription' => 'required'
	);
}