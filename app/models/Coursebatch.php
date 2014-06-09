<?php

class Coursebatch extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'batchDescription' => 'required'
	);
}