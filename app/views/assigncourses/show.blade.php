@extends('layouts.scaffold')

@section('main')

<fieldset>



  <div class="box gray-box">
   <legend>
    Personal Details
  </legend>





  <div class="control-group">
    <label class="control-label">Student Name</label>
    <div class="controls docs-input-sizes">

      <input type="text" placeholder="" disabled="disabled" name="studentName" id="studentName" value="{{$studentregistration->studentName}}"  class="span4"> 


    </div>

  </div>
  
  <div class="control-group">
    <label class="control-label">Date of Birth</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" disabled="disabled" name="studentDateOfBirth" id="studentDateOfBirth" value="{{$studentregistration->studentDateOfBirth}}">

    </div>

  </div>

  <div class="control-group">
    <label class="control-label">E-Mail</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" disabled="disabled" name="studentEmail" id="studentEmail" value="{{$studentregistration->studentEmail}}" class="span4">
    </div>

  </div>
  
</fieldset>
<div class="box gray-box">
  <legend>
    Course Details
  </legend>


<?php $studentcourse = Studentcourse::where('student_id', $studentregistration->student_id)->first()  ?>
  <div class="control-group">
    <label class="control-label" for="select01">Course Category</label>
    <div class="controls">
<?php 
     $category = Coursecategory::lists('courseCategoryName', 'id');
  ?>
  {{ Form::select('studentCourseCategory_id', array('' => 'Select') + $category, $studentcourse->courseCategory, array('id' => 'studentCourseCategory_id',  'disabled'=>'disabled',  'class'=>'span2'))}}
                    

      
    </div>

  </div>

  <div class="control-group">
    <input type="hidden" placeholder=""  name="student_id" id="student_id"  value="{{$studentregistration->student_id}}"  class="span4"> 
    <label class="control-label" for="select01">Course Selected</label>
    <div class="controls">
    <select multiple="multiple" id="availableCourses" style="height:200px; width:200px;" disabled="disabled"   class="span2" name="availableCourses[]">
    </select>       

                   <input type="submit" name ="push"  id ="push" class="btn"  disabled="disabled"  value=">"/>              
                  <input type="submit" name ="pull" id ="pull" class="btn"    disabled="disabled"  value="<"/>

    <select multiple="multiple" id="selectedCourses" style="height:200px; width:200px;"  disabled="disabled"   class="span2" name="selectedCourses[]">
    </select>       


    </div>
    </div>
</form>
{{ Form::open(array('route' => 'assigncourses.store', 'class'=> '')) }}
<input type="hidden" placeholder=""  name="stud_id" id="stud_id" value="{{$studentregistration->student_id}}"  class="span4"> 
    <div class="control-group">
    <label class="control-label" for="select01">Optional Subject</label>
    <div class="controls">
          <div class="controls">


<?php

          $feecollection = Feecollection::where('student_id', $studentregistration->student_id)->first();


          $studentCourse = Studentcourse::where('student_id', $studentregistration->student_id)->first();

     $optionalsubjects = Optionalsubject::lists('optionalSubjectName', 'id');
  ?>
                    
  {{ Form::select('studentOptional_id', array('' => 'Select') + $optionalsubjects, $feecollection->studentOptional,array('class'=>'span2',  'disabled'=>'disabled'))}}
                    

      
    </div>
    </div>

  </div>

  <br>
  <div class="control-group">
    <label class="control-label">Batch</label>
    <div class="controls docs-input-sizes">


  {{ Form::select('batch', array('' => 'Select', 'Regular'=> 'Regular', 'Weekend'=> 'Weekend'), $feecollection->batch,array('class'=>'span2',  'disabled'=>'disabled'))}}
                    

    </div>

  </div>
  
  
    <br>
    <div class="control-group">
      <label class="control-label" for="select01">Discount (If Any)</label>
      <div class="controls">
        <input type="text" placeholder="" name="studentDiscount" id="studentDiscount"    disabled="disabled" class="span4" value="{{ $studentCourse->discountAmount}}">
      </div>

    </div>
    <div class="control-group">
      <label class="control-label" for="select01">Reason for Discount</label>
      <div class="controls">
      <textarea name="studentDiscountDescription" id="studentDiscountDescription"    disabled="disabled"  cols="5" rows="5" class="span4">
      {{$studentCourse->discountDescription}}</textarea>
        
      </div>

    </div>


    <div class="control-group" id="discountedFees">
  
    </div>
    <div class="control-group">
      <label class="control-label" for="select01">Course Fees</label>
      <div class="controls">
        <input type="text" placeholder="" name="studentCourseFees" id="studentCourseFees"    disabled="disabled"  class="span4">
      </div>

    </div>


        <div class="control-group">
      <label class="control-label" for="select01">Initial Payment</label>
      <div class="controls">
        <input type="text" placeholder="" name="initialPayment" id="initialPayment"     disabled="disabled"  value="{{$feecollection->initialPayment}}" class="span4">
      </div>

    </div>

        <div class="control-group">
      <label class="control-label" for="select01">Intallment Amount</label>
      <div class="controls">
        <input type="text" placeholder="" name="installmentAmount" id="installmentAmount"    disabled="disabled"  class="span4"  value="{{$feecollection->installmentAmount}}">
      </div>

    </div>

    <div class="control-group">
      <label class="control-label" for="select01">No of Installments </label>
      <div class="controls">


      {{ Form::select('installments', array('' => 'Select', '1'=> '1', '2'=> '2', '3'=> '3', '4'=> '4', '5'=> '5'), $feecollection->installments,array('class'=>'span2', 'id'=>'installments', 'disabled'=>'disabled'))}}

      </div>

    </div>


    <div class="control-group" id="installmentCuts">
     
    </div>
    <div class="control-group">
      
      <div class="controls">
     <a href="{{URL::to('assigncourses')}}" class="btn btn-warning pull-right">Close</a>
      </div>

    </div>

</form>
  </div>

</div>


<script>
  

  course_category_id = $('#studentCourseCategory_id').val();
  student_id = $('#student_id').val();
  getAvailableCourses(student_id+'~'+course_category_id);
  getSelectedCourses(student_id);
installmentCalculator();
function getAvailableCourses(course_category_id){

 $.ajax({

  url: '/kingmakers/public/getavailablecourses/' + course_category_id,
  type: 'POST',
  dataType: 'json',
  success: function(data) {
console.log(data);
    var str ="";
    if (data != 0) { 

      for (var i = 0; i < data.length; i++) {
        str += '<option value="'+data[i].id+'">'+data[i].courseName+'</option>';
      }

      $('#availableCourses').html(str);
    }

  },
  error: function (xhr, ajaxOptions, thrownError) {
    console.log(xhr.status);
    console.log(thrownError);
  },
});

 
}
 

function getSelectedCourses(student_id){

 $.ajax({

  url: '/kingmakers/public/getselectedcourses/' + student_id,
  type: 'POST',
  dataType: 'json',
  success: function(data) {

    var str ="";
    if (data != 0) { 





      tablestart='<table class="table table-bordered"><thead><th>Course Name</th><th>Course Fees</th><th>Discount</th><th>Sales Tax</th><th>Fees Payable</th></thead><tbody>';
      tabletr ='';
      coursefees=0;
      for (var i = 0; i < data.length; i++) {
        coursefees += parseFloat(data[i].coursefees);
        tabletr += '<tr><td>'+data[i].courseselectedname+'</td><td>'+data[i].coursefees+'</td><td>0</td><td>0</td><td>'+data[i].coursefees+'</td></tr>';
        str += '<option value="'+data[i].id+'">'+data[i].courseselectedname+'</option>';
      }
      $('#selectedCourses').html(str);
      tableend = '</tbody></table>';
     // $('#discountedFees').html(tablestart + tabletr + tableend);

      $('#studentCourseFees').val(coursefees);
  calculate();

    }


  },
  error: function (xhr, ajaxOptions, thrownError) {
    console.log(xhr.status);
    console.log(thrownError);
  },
});


}



function installmentCalculator(){

  installments = parseFloat($('#installments').val());
  installmentAmount = parseFloat($('#installmentAmount').val());
  monthlyInstallmentAmount =  installmentAmount/installments ;
  monthlyInstallmentAmount = Math.round(monthlyInstallmentAmount);
  var formattedDate = new Date();
  var d = formattedDate.getDate();
  var m =  formattedDate.getMonth();
  var y = formattedDate.getFullYear();



  todayDate = d + "/" + m + "/" + y;
  m = parseFloat(m);
  tablestart = '<table class="table table-bordered"><thead><tr><th>Installment Date</th><th>Installment Amount</th></tr></thead><tbody>';
  tabletr="";
  for (var i = 0; i < installments; i++) {
    console.log(m);
    if (m == 12){
      m = 0;
      y = parseFloat(y) + 1;
    }
    m = m + 1;

    installmentDate = d + "/" + m  + "/" + y;
    tabletr += '<tr><td>'+ installmentDate +'</td><td>'+monthlyInstallmentAmount +'</td></tr>';

  };
  tableend='</tbody></table>';
  $('#installmentCuts').html(tablestart+ tabletr+ tableend);

}
</script>
@stop