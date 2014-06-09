<?php

class Studentregistration extends Eloquent {
    protected $guarded = array();
    public static $rules = array(
		'studentName' => 'required',
        'studentDateOfBirth' => 'required',
        'studentDateOfJoining' => 'required',
        'studentCommunity' => 'required',
        'studentEmail' => 'required',
        'studentPhone' => 'required',
 	);

	    public function feecollections () {
        return $this->hasMany('Feecollection', 'student_id');
    }

        public function installments () {
        return $this->hasMany('Installment', 'student_id');
    }
}