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
  <div class="control-group">
    <label class="control-label">Date of Joining</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" disabled="disabled" name="studentDateOfJoining" id="studentDateOfJoining" value="{{$studentregistration->studentDateOfJoining}}" class="span4">
    </div>

  </div>
  
</fieldset>
<div class="box gray-box">
  <legend>
    Course Details
  </legend>


  
   {{ Form::open(array('route' => 'assigncourses.store', 'class'=> 'ajax')) }}
  


  <div class="control-group">
    <label class="control-label" for="select01">Course Category</label>
    <div class="controls">
<?php $studentcourse = Studentcourse::where('student_id', $studentregistration->student_id)->first()  ?>

<?php 
     $category = Coursecategory::lists('courseCategoryName', 'id');
  ?>
  @if ($studentcourse)
  {{ Form::select('studentCourseCategory_id', array('' => 'Select') + $category, $studentcourse->courseCategory, array('id' => 'studentCourseCategory_id',  'class'=>'span2'))}}
  @else
  {{ Form::select('studentCourseCategory_id', array('' => 'Select') + $category, '', array('id' => 'studentCourseCategory_id',  'class'=>'span2'))}}
  @endif

      
    </div>

  </div>


  <div class="control-group">
    <input type="hidden" placeholder=""  name="student_id" id="student_id" value="{{$studentregistration->student_id}}"  class="span4"> 
    <label class="control-label" for="select01">Course Selected</label>
    <div class="controls">
    <select multiple="multiple" id="availableCourses" style="height:200px; width:200px;" class="span2" name="availableCourses[]">
    </select>       

                   <input type="submit" name ="push"  id ="push" class="btn" value=">"/>              
                  <input type="submit" name ="pull" id ="pull" class="btn"  value="<"/>

    <select multiple="multiple" id="selectedCourses" style="height:200px; width:200px;" class="span2" name="selectedCourses[]">
    </select>       


    </div>
    </div>
</form>

{{ Form::open(array('route' => 'assigncourses.store', 'class'=> '')) }}
<input type="hidden" placeholder=""  name="stud_id" id="stud_id" value="{{$studentregistration->student_id}}"  class="span4"> 
<input type="hidden" placeholder=""  name="id" id="id" value="{{$studentregistration->id}}"  class="span4"> 
    <div class="control-group">
    <label class="control-label" for="select01">Optional Subject</label>
    <div class="controls">
          <div class="controls">
<?php 
     $optionalsubjects = Optionalsubject::lists('optionalSubjectName', 'id');
  ?>
                    
  {{ Form::select('studentOptional_id', array('' => 'Select') + $optionalsubjects, '',array('class'=>'span2'))}}
                    
{{ $errors->first('studentOptional_id', '* Please select student Optional Subject') }}

      
    </div>
    </div>

  </div>

  <br>
  <div class="control-group">
    <label class="control-label">Batch</label>
    <div class="controls docs-input-sizes">
    <select name="batch" id="batch" class="span4" >
      <option value="">Select</option>
      <option value="Regular">Regular</option>
      <option value="Weekend">Weekend</option>
    </select>

    {{ $errors->first('batch', '* Please select student batch') }}
    </div>

  </div>
  
  
    <br>
    <div class="control-group">
      <label class="control-label" for="select01">Discount (If Any)</label>
      <div class="controls">
        <input type="text" placeholder="" name="studentDiscount" id="studentDiscount" class="span4" value="0">
      </div>

    </div>
    <div class="control-group">
      <label class="control-label" for="select01">Reason for Discount</label>
      <div class="controls">
      <textarea name="studentDiscountDescription" id="studentDiscountDescription" cols="5" rows="5" class="span4"></textarea>
        
      </div>

    </div>


    <div class="control-group" id="discountedFees">
  
    </div>
    <div class="control-group">
      <label class="control-label" for="select01">Course Fees</label>
      <div class="controls">
        <input type="text" placeholder="" name="studentCourseFees" id="studentCourseFees" class="span4">
        {{ $errors->first('studentCourseFees', '* Please select student Course Fees') }}
      </div>

    </div>


        <div class="control-group">
      <label class="control-label" for="select01">Initial Payment</label>
      <div class="controls">
        <input type="text" placeholder="" name="initialPayment" id="initialPayment" class="span4">
        {{ $errors->first('initialPayment', '* Please select student Initial Payment') }}
      </div>

    </div>

        <div class="control-group">
      <label class="control-label" for="select01">Intallment Amount</label>
      <div class="controls">
        <input type="text" placeholder="" name="installmentAmount" id="installmentAmount" class="span4">
        {{ $errors->first('installmentAmount', '* Please select student Installment Amount') }}
      </div>

    </div>

    <div class="control-group">
      <label class="control-label" for="select01">No of Installments </label>
      <div class="controls">
        <select name="installments" id="installments" class="span2">
        <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        {{ $errors->first('installments', '* Please select Installments') }}
      </div>

    </div>


    <div class="control-group" id="installmentCuts">
     
    </div>
    <div class="control-group">
      
      <div class="controls">
      <button type="submit" id="submit_data" name="submit_data" class="btn btn-success span2 btn-large pull-right" >Save</button>
     <a href="{{URL::to('assigncourses')}}"   class="btn btn-warning btn-large span2 pull-right" >Cancel</a>
      </div>

    </div>

</form>
  </div>

</div>


<script>
  

  course_category_id = $('#studentCourseCategory_id').val();
  if (course_category_id){
  student_id = $('#student_id').val();
  getAvailableCourses(student_id+'~'+course_category_id);
  getSelectedCourses(student_id);
}
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

 
</script>

@stop


