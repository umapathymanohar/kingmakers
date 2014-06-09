@extends('layouts.scaffold')

@section('main')


<div class="row">
  
 
 <div class="span12">
<a href="{{URL::to('reports/getfeecollectionpdf')}}" target="_blank" class="btn btn-success pull-right">Print</a> 
 
 

 </div>
 </div>       
<div class="row-fluid">
  
          <div class="span12">
 
          
           <table class="table table-bordered table-striped prepend-top">
            <thead>
              <tr>

     <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Course</th>
                <th>Course Total Fees</th>
                <th>Collected Fees</th>
               
              </tr>
            </thead>
            <tbody id="searchAssignStudents">
              <?php     $studentRecords = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->where('feecollections.remainingAmount', '>', 0)->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.id', 'studentregistrations.student_id', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));
?>
               @foreach ($studentRecords as $student)

             <tr>
                <td>{{ $student->student_id }}</td>
                  <td>{{ $student->studentName }}</td>
                  <td>{{ $student->studentCourse }}</td>
                  <td>{{ $student->courseFees }}</td>
                  <td>{{ $student->courseFees  - $student->remainingAmount }} </td>
 
 
            </tr>
                    @endforeach
          </tbody>
        </table>
 
        <hr>

      </div>
</div>

@stop


