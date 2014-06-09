@extends('layouts.scaffold')

@section('main')
<?php 




?>
<div class="row-fluid">
  
          <div class="span12">
           <div class="page-header">
            <input class="pull-right" type="text" id="searchFeesStudents" placeholder="Search students by Name">
            <input class="pull-right" type="text" id="searchFeesStudentsID" placeholder="Search students by ID">
  
          </div>
          
           <table class="table table-bordered table-striped prepend-top">
            <thead>
              <tr>

                <th>Student ID</th>
                <th>Student Name</th>
                <th>Course Selected</th>
                <th>Course Fees (in Rs.)</th>
                <th>Fees to be collected (in Rs.)</th>
                <th colspan="4">Actions</th>
              </tr>
            </thead>
            <tbody id="searchStudentsFeesResults">
            	 @foreach ($studentRecords as $student)


<?php 
if ($student->remainingAmount == 0){
    
  Installment::where('student_id', $student->student_id)->where('paidStatus', 'Pending')->delete();

}
else {
?> 
             <tr>
             		 <td>{{ $student->student_id }}</td>
             	    <td>{{ $student->studentName }}</td>
                  <td>{{ $student->studentCourse }}</td>
                  <td>{{ $student->courseFees }}</td>
                  <td>{{ $student->remainingAmount }}</td>

              <td>
 
      
           <a class="btn btn-warning" href="{{URL::to('search/'.$student->student_id )}}" title="View">

               Pay</a>
 
           </td>
            </tr>
            <?php 
          }
            ?>
                    @endforeach
          </tbody>
        </table>
 
        <hr>

      </div>
</div>
 
@stop