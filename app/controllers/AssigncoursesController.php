<?php

class AssigncoursesController extends BaseController {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $studentregistrations = Studentregistration::paginate(10);

      return View::make('assigncourses.index', compact('studentregistrations'));
    }


    public function getStudentDetails($search)
    {
      if ($search == 'all'){
        return         $studentregistrations = Studentregistration::all();

      }
      else
      {
        return Studentregistration::where('studentName', 'like', $search . '%')->get();

      }


    }


    public function getStudentDetailsId($search)
    {
      if ($search == '0'){
        return         $studentregistrations = Studentregistration::all();

      }
      else
      {
        return Studentregistration::where('student_id', 'like', $search . '%')->get();

      }



    }





    public function show($id)
    {
      $studentregistration = Studentregistration::find($id);

      if (is_null($studentregistration))
      {
        return Redirect::route('studentregistrations.show');
      }

      return View::make('assigncourses.show', compact('studentregistration'));
    }


    public function editview($id)
    {

      $studentregistration = Studentregistration::find($id);

      if (is_null($studentregistration))
      {
        return Redirect::route('studentregistrations.index');
      }

      return View::make('assigncourses.viewedit', compact('studentregistration'));

    }
    public function edit($id)
    {
      $studentregistration = Studentregistration::find($id);

      if (is_null($studentregistration))
      {
        return Redirect::route('studentregistrations.index');
      }

      return View::make('assigncourses.edit', compact('studentregistration'));
    }



    public function store(){
      $studentCourseNames ="Course";



//$studentCourseNames = $studentCourseNames . $course->courseName . ' / ';

      if (isset($_POST['push'])){


        for ($i=0; $i < count(Input::get('availableCourses'));$i++)
        {
          $studentCourse = new Studentcourse;
          $studentCourse->student_id = Input::get('student_id');
          $studentCourse->courseselected = $_POST['availableCourses'][$i];

          $course = Coursemaster::where('id', $_POST['availableCourses'][$i])->first();

          $studentCourse->courseCategory = $_POST['studentCourseCategory_id'];

          $studentCourse->courseselectedname = $course->courseName;
          $studentCourse->coursefees = $course->courseFees;

          $studentCourse->save();

        }
      }

      if (isset($_POST['pull'])){

        for ($i=0; $i < count(Input::get('selectedCourses'));$i++)
        {

          Studentcourse::find($_POST['selectedCourses'][$i])->delete();

        }
      }


      if (isset($_POST['submit_data'])){


    $rules = array(
                'stud_id' => 'Required',
                'studentOptional_id'     => 'Required',
                'batch'       => 'Required',
                'studentCourseFees'  =>'Required',
                'initialPayment'=>'Required',
                'installmentAmount'=>'Required',
                'installments'=>'Required'
                        );
 

 
    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {

      return Redirect::to('assigncourses/'. Input::get('id') . '/edit')
            ->withInput()
            ->withErrors($validator)
            ->with('message', 'There were validation errors.');
       
    }

 $student_id = Input::get('stud_id');

     $studentcourses = Studentcourse::where('student_id', $student_id)->first();
     
    if ($studentcourses->courseCategory == 2){

  $generate_id = Input::get('studentOptional_id');
       if ($generate_id < 10 ){
        $generate_id = '0' .$generate_id;
      }

      $lastStudentID = Studentregistration::where('student_id', 'like', 'KMCS-'.$generate_id . '-%')->orderBy('student_id', 'desc')->first();
      if ($lastStudentID) {
        $lastStudentID = $lastStudentID->student_id;
      }
      else
      {

       $lastStudentID = 'KMCS-' . $generate_id . '-000';
     }
     $lastStudentID = explode('-', $lastStudentID);

     $currentStudentID = explode('_', $student_id);

     if ($currentStudentID[0] == 'Temp') {
       $newID =  $lastStudentID[2] + 1;
       if ($newID < 100)
       {
        if ($newID < 10) {
          $newID = '00' . $newID ;
        }
        else
        {
         $newID = '0' . $newID ; 
       }
     }
     $newID = 'KMCS-' . $generate_id .'-' . $newID ;


     $studentregistrations = Studentregistration::where('student_id', $student_id)->get();
     foreach ($studentregistrations as $studentregistration) {
       $studentregistration->student_id = $newID;
       $studentregistration->save();
     }


     $studentcourses = Studentcourse::where('student_id', $student_id)->get();
     foreach ($studentcourses as $studentcourse) {
       $studentcourse->student_id = $newID;
       $studentcourse->save();

     }


    
     $student_id = $newID;

     }
     else
     {
        $student_id = Input::get('stud_id');
     }

    }
     else
     {

  $generate_id = Input::get('studentOptional_id');
       if ($generate_id < 10 ){
        $generate_id = '0' .$generate_id;
      }

      $lastStudentID = Studentregistration::where('student_id', 'like', 'KMTN-'.$generate_id . '-%')->orderBy('student_id', 'desc')->first();
      if ($lastStudentID) {
        $lastStudentID = $lastStudentID->student_id;
      }
      else
      {

       $lastStudentID = 'KMTN-' . $generate_id . '-000';
     }
     $lastStudentID = explode('-', $lastStudentID);

     $currentStudentID = explode('_', $student_id);

     if ($currentStudentID[0] == 'Temp') {
       $newID =  $lastStudentID[2] + 1;
       if ($newID < 100)
       {
        if ($newID < 10) {
          $newID = '00' . $newID ;
        }
        else
        {
         $newID = '0' . $newID ; 
       }
     }
     $newID = 'KMTN-' . $generate_id .'-' . $newID ;


     $studentregistrations = Studentregistration::where('student_id', $student_id)->get();
     foreach ($studentregistrations as $studentregistration) {
       $studentregistration->student_id = $newID;
       $studentregistration->save();
     }


     $studentcourses = Studentcourse::where('student_id', $student_id)->get();
     foreach ($studentcourses as $studentcourse) {
       $studentcourse->student_id = $newID;
       $studentcourse->save();

     }


    
     $student_id = $newID;

     }
     else
     {
        $student_id = Input::get('stud_id');
     }
     }

      
     



         // $feecollections = Feecollection::where('student_id', $student_id)->get();
         // foreach ($feecollections as $feecollection) {
         //     $feecollection->student_id = $newID;
         // $feecollection->save();
         // }



         // $installments = Installment::where('student_id', $student_id)->get();
         // foreach ($installments as $installment) {
         // $installment->student_id = $newID;
         // $installment->save();

         // }


     Feecollection::where('student_id',   $student_id)->delete();
     Installment::where('student_id',   $student_id)->delete();


     $studentcourses = Studentcourse::where('student_id', $student_id)->get();

     $fees=0;
     foreach ($studentcourses as $studentcourse) {
      $fees += $studentcourse->coursefees;
    }

    $discountAmount = Input::get('studentDiscount');


    $grandAfter =0;
    $grandActual =0;
    $grandSalesTax =0;
    $grandDiscount =0;
    $coursefees=0;
    $grandTotal =0;

    foreach ($studentcourses as $studentcourse) {
      $coursefees += $studentcourse->coursefees;

      $discount = ($studentcourse->coursefees * $discountAmount)/$fees;
      if ($discount > 0){
        $salesTax = ($studentcourse->coursefees *12.36)/100;
        $totalFees = $studentcourse->coursefees + $salesTax;

        $totalFees = $totalFees - $discount;
        $salesTax = ($totalFees *12.36)/100;
        $coursefees = $totalFees- $salesTax;
        $grandTotal += $totalFees;


      }
      else
      {
        $salesTax = ($studentcourse->coursefees *12.36)/100;
        $totalFees = $studentcourse->coursefees - $discount + $salesTax;
        $grandTotal += $totalFees;
        $coursefees = $studentcourse->coursefees;
      }
      $grandAfter += $coursefees;
      $grandActual += $studentcourse->coursefees;
      $grandDiscount += $discount;
      $grandSalesTax +=  $salesTax;
      $studentcourse->batch = Input::get('batch');
      $studentcourse->discountAmount = round($discountAmount);
      $studentcourse->individualDiscountAmount = round($discount);
      $studentcourse->feesAfterDiscount = round($coursefees);
      $studentcourse->salesTax = round($salesTax);
      $studentcourse->feesPayable = round($totalFees);
      $studentcourse->discountDescription = Input::get('studentDiscountDescription');
      $studentcourse->save();
    }


    $feecollection = new Feecollection;
    $feecollection->student_id = $student_id;

    $feecollection->batch = Input::get('batch');
    $feecollection->courseFees = round(Input::get('studentCourseFees'));


    $getStudentCourses = Studentcourse::where('student_id', $student_id)->get();
    $studentSelectedCourses ="";
    if($getStudentCourses){

      foreach ($getStudentCourses as $getStudentCourse) {
        $studentSelectedCourses = $studentSelectedCourses . $getStudentCourse->courseselectedname . '/';
      }
    }



    $feecollection->studentCourse = $studentSelectedCourses;
    $feecollection->studentOptional = Input::get('studentOptional_id');
    $feecollection->initialPayment = round(Input::get('initialPayment'));
    $feecollection->installmentAmount = round(Input::get('installmentAmount'));
    $feecollection->remainingAmount = round(Input::get('installmentAmount'));
    $feecollection->installments = Input::get('installments');
    $feecollection->save();

    $newdate = date("Y-m-j");  

    if(Input::get('installments') > 0 ){
      $installmentAmount  = round(Input::get('installmentAmount')/ Input::get('installments'));


      for ($i=0; $i < Input::get('installments'); $i++) { 
        $newdate = strtotime ( '+1 month' , strtotime ( $newdate ) ) ;
        $newdate = date ( 'j-m-Y' , $newdate );


        //$effectiveDate = date('Y-m-d', strtotime("+1 months", strtotime($todayDate)));
        $installments = new Installment;
        $installments->student_id =  $student_id;
        $installments->installmentDate =  $newdate;
        $installments->installmentAmount =  $installmentAmount;
        $installments->paidStatus =  "Pending";
        $installments->paidDate =  "";
        $installments->save();

      }





  }
  return Redirect::route('assigncourses.index');

}



return "success";

}

public function getavailablecourses($ids){

  $pieces = explode("~", $ids);
  $student_id= $pieces[0]; 
  $id = $pieces[1]; 



  $courseselected = Studentcourse::select('courseselected')->where('student_id', $student_id)->get();
  $stack = array();
  foreach ($courseselected as $keyvalue) {
    array_push($stack, $keyvalue->courseselected);
  }
  if ($stack){
    return $courses = Coursemaster::where('courseCategory_id', $id)->whereNotIn('id',  $stack)->get();  
  }
  else
  {
   return $courses = Coursemaster::where('courseCategory_id', $id)->get();   
 }


}


public function getselectedcourses($id){
  return $courses = Studentcourse::where('student_id', $id)->get();

}



}