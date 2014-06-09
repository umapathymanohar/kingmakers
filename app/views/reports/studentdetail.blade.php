@extends('layouts.scaffold')

@section('main')


<div class="row-fluid">
  
          <div class="span12">
           <div class="page-header">
                    <a href="{{URL::to('reports/studentdetailspdf')}}" target="_blank" class="btn btn-success pull-right studentdetailspdf">Print</a> 
<input class="pull-right" type="text" id="StudentIDReport" placeholder="Search Students by ID">
            <input class="pull-right" type="text" id="StudentNameReport" placeholder="Search Students by Name">
  
  <?php 
     $category = Coursemaster::lists('courseName', 'id');
  ?>
  <div  >
               
  {{ Form::select('studentCourse', array('' => 'Select Course') + $category, '',array('id' => 'studentCourseReport', 'class'=>'span2'))}}
                    </div>
<div  >
           
  {{ Form::select('studentBatch', array('' => 'Select Batch', 'Regular'=> 'Regular', 'Weekend'=>'Weekend'), '',array('id' => 'studentBatchReport', 'class'=>'span2'))}}
  </div>

<?php $studentregistrations = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('studentcourses', 'studentcourses.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.studentEmail','studentregistrations.studentPhoto','studentregistrations.studentPhone', 'studentregistrations.studentDateOfJoining', 'studentregistrations.id', 'studentregistrations.student_id','studentcourses.batch', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));

?>
 
          </div>
          <div class="complicatedreport">
            <table class="table table-bordered table-striped prepend-top ">
            <thead>
              <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Course Name</th>
                <th>Batch</th>
                
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Joined</th>
                
              </tr>
            </thead>
            <tbody id="studentResults">
               @foreach ($studentregistrations as $student)

             <tr>
                <td>{{{ $student->student_id }}}</td>
                  <td>{{{ $student->studentName }}}</td>
                  <td>{{{ $student->studentCourse }}}</td>
                  <td>{{{ $student->batch }}}</td>
                  
                  <td>{{{ $student->studentEmail }}}</td>
                  <td>{{{ $student->studentPhone }}}</td>
              <td>  @if ($student->studentPhoto)

              <img width="50" src="/kingmakers/public/student_assets/{{{ $student->id }}}/photo.jpg" alt="">
                  @else
<img width="50" src="/kingmakers/public/assets/images/user.png" alt="">
                  @endif
              </td>

              <td>{{ date("d/m/Y",strtotime($student->studentDateOfJoining)) }}</td>
               
    
            </tr>
                    @endforeach
          </tbody>
        </table>
 
 </div>
      </div>
</div>



 
                    

@stop

