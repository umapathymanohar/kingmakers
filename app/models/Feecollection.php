<?php

class Feecollection extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		
	);


	    public function studentregistrations () {
        return $this->hasOne('Studentregistration', 'student_id');
    }
      


        public function installments () {
        return $this->hasMany('Installment', 'student_id');
    }
 }