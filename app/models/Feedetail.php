<?php

class Feedetail extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'paidAmount' => 'required'
	);
}