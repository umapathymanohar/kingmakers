@extends('layouts.scaffold')

@section('main')


<div class="row-fluid">
  
          <div class="span12">
           <div class="page-header">
            <input class="pull-right" type="text" id="searchAssignStudentsID" placeholder="Search students by ID">
            <input class="pull-right" type="text" id="searchAssignStudents" placeholder="Search students by name">
            
  
          </div>
          @if ($studentregistrations->count())
           <table class="table table-bordered table-striped prepend-top">
            <thead>
              <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Joined</th>
                <th colspan="4">Actions</th>
              </tr>
            </thead>
            <tbody id="searchAssignStudentsResults">
            	 @foreach ($studentregistrations as $student)

             <tr>
             		<td>{{{ $student->student_id }}}</td>
             	    <td>{{{ $student->studentName }}}</td>
             	    <td>{{{ $student->studentEmail }}}</td>
             	    <td>{{{ $student->studentPhone }}}</td>
              

              <td>{{ date("F j, Y",strtotime($student->created_at)) }}</td>
              <td>

<?php 
       $feecollectionCount = Feecollection::where('student_id', $student->student_id)->count();

?>
        @if ($feecollectionCount > 0)
           <a class="btn" href="{{URL::route('assigncourses.show', array($student->id))}}" title="View">

               View </a>

                          <a class="btn btn-warning" href="{{URL::to('assigncourseseditview/'.$student->id)}}" title="View">

               Edit</a>

@else
           <a class="btn btn-warning" href="{{URL::route('assigncourses.edit', array($student->id))}}" title="View">

               Edit</a>
@endif

   
           </td>
            </tr>
                    @endforeach
          </tbody>
        </table>
        @else
    There are no student
@endif
        <hr>

        <?php echo $studentregistrations->links(); ?>
       <!-- <div class="pagination pagination-centered">
  <ul>
    <li class="disabled"><a href="#">« PREV</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">NEXT »</a></li>
  </ul>
</div> -->
      </div>
</div>



 
                    

@stop