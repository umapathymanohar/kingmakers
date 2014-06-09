<?php

class Installment extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		
	);

        public function studentregistrations () {
        return $this->belongsTo('Studentregistration', 'student_id');
    }

        public function coursemasters () {
        return $this->belongsTo('Coursemaster');
    }


        public function studentcourses () {
        return $this->belongsTo('Studentcourse', 'student_id');
    }


        public function feecollections () {
        return $this->belongsTo('Feecollection', 'student_id');
    }

 }