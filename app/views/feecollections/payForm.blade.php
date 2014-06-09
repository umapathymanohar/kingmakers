@extends('layouts.scaffold')

@section('main')


<?php 
   $results = DB::select('SELECT ins.id, ins.student_id, ins.installmentDate, ins.installmentAmount, ins.paidStatus, fc.courseFees, fc.studentCourse, fc.remainingAmount, sr.studentName, fc.initialPayment  FROM installments as ins inner join feecollections as fc on fc.student_id = ins.student_id inner join studentregistrations as sr on sr.student_id = ins.student_id where ins.id ="' . $id . '"');

?>
          <div class="row-fluid">
            <div class="span12">
            <div class="box">


<form method="POST" action="/kingmakers/public/paid" accept-charset="UTF-8" class="form-horizontal" >


  <legend>
      Fees Payment
    </legend>


<hr class="space">
    <div class="row-fluid">
      <div class="span6">
        
         <div class="control-group">
      <label class="control-label">Student Name</label>
      <div class="controls docs-input-sizes">
 <input type="hidden" placeholder=""  name="id" id="id" class="span3" value="{{$id}}"> 
        <input type="text" placeholder="" disabled="disabled" name="studentName" id="studentName" class="span3" value="{{$results[0]->studentName}}"> 
 
      </div>

    </div>


        <div class="control-group">
      <label class="control-label">Student ID</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder="" disabled="disabled" name="student_id" id="student_id" class="span3" value="{{$results[0]->student_id}}" > 
 
      </div>

    </div>

        <div class="control-group">
      <label class="control-label">Course Name</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder="" disabled="disabled" name="courseName" id="courseName" class="span3" value="{{$results[0]->studentCourse}}" > 
 
      </div>

    </div>

        <div class="control-group">
      <label class="control-label">Total Fees</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder="" disabled="disabled" name="courseFees" id="courseFees" class="span3" value="{{$results[0]->courseFees}}" > 
 
      </div>

    </div>

        <div class="control-group">
      <label class="control-label">Initial Payment</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder="" disabled="disabled" name="initialPayment" id="initialPayment" class="span3" value="{{$results[0]->initialPayment}}" > 
 
      </div>

    </div>







      </div>
      <div class="span6">
        
                <div class="control-group">
      <label class="control-label">Installment Amount</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder="" disabled="disabled" name="installmentAmount" id="installmentAmount" class="span3" value="{{$results[0]->installmentAmount}}" > 
 
      </div>

    </div>
        <div class="control-group">
      <label class="control-label">Remaining Amount</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder="" disabled="disabled" name="remainingAmount" id="remainingAmount" class="span3" value="{{$results[0]->remainingAmount}}" > 
 
      </div>

    </div>

        <div class="control-group">
      <label class="control-label">Installment Date</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder="" disabled="disabled" name="installmentDate" id="installmentDate" class="span3" value="{{$results[0]->installmentDate}}" > 
 
      </div>

    </div>


        <div class="control-group">
      <label class="control-label">Payment Date</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder=""   name="paymentDate" id="paymentDate" class="span3" value="{{$results[0]->installmentDate}}" > 
 
      </div>

    </div>


        <div class="control-group">
      <label class="control-label">Payment Amount</label>
      <div class="controls docs-input-sizes">

        <input type="text" placeholder=""  name="paymentAmount" id="paymentAmount" class="span3" value="{{$results[0]->installmentAmount}}" > 
 
      </div>
      </div>


              <div class="control-group">

      <div class="controls docs-input-sizes">
      <input type="submit" class="span3 btn btn-primary" value="Pay">

 
      </div>
      </div>

    </div>

   

    </div>

    {{Form::close()}}
              
            </div>
 
            </div>
          </div>
 


 
                    


 
@stop
