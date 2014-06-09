@extends('layouts.scaffold')

@section('main')


<div class="row-fluid">
  
          <div class="span12">
           <div class="page-header">
<input class="pull-right" type="text" id="searchStudentsID" placeholder="Search Students by ID">
            <input class="pull-right" type="text" id="searchStudents" placeholder="Search Students by Name">
  
            <h3 class="page-title">All Students</h3>
<br>
<br>
            <p>
<a href="{{URL::route('studentregistrations.create')}}" class="btn btn-primary">Add new Students</a>

</p>
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
            <tbody id="studentResults">
            	 @foreach ($studentregistrations as $student)

             <tr>
             		<td>{{{ $student->student_id }}}</td>
             	    <td>{{{ $student->studentName }}}</td>
             	    <td>{{{ $student->studentEmail }}}</td>
             	    <td>{{{ $student->studentPhone }}}</td>
            

              <td>{{ date("d/m/Y",strtotime($student->studentDateOfJoining)) }}</td>
              <td><a href="{{URL::route('studentregistrations.show', array($student->id))}}" title="view" class="btn btn-warning" >View</a>
</td><td>
               <a href="{{URL::route('studentregistrations.edit', array($student->id))}}" title="Edit" class="btn btn-success">Edit

                </a>

           </td>
           <td>
                   {{ Form::open(array('method' => 'DELETE', 'route' => array('studentregistrations.destroy', $student->id))) }}
                   <button type="submit" class="btn btn-danger delete " >Delete</button>
                   {{ Form::close() }}
           </td>
<td>
               <a target="_blank" href="{{URL::to('getinitial/' . $student->id)}}" title="Initial Payment" class="btn">Print 

                </a>

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