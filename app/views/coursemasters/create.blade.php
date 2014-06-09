@extends('layouts.scaffold')

@section('main')

<h1>Create Coursemaster</h1>

{{ Form::open(array('route' => 'coursemasters.store')) }}
    <ul>
        <li>
          

            {{ Form::label('courseCategory_id', 'courseCategory_id:') }}
            
            {{ Form::select('courseCategory_id', Coursecategory::lists('courseCategoryName', 'id')) }}          
            
        </li>

        <li>
            {{ Form::label('courseName', 'CourseName:') }}
            {{ Form::text('courseName') }}
        </li>

        <li>
            {{ Form::label('courseDescription', 'CourseDescription:') }}
            {{ Form::text('courseDescription') }}
        </li>

        <li>
            {{ Form::label('courseFees', 'CourseFees:') }}
            {{ Form::text('courseFees') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


