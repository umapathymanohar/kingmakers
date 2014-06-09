@extends('layouts.scaffold')

@section('main')

<h1>Edit Coursemaster</h1>
{{ Form::model($coursemaster, array('method' => 'PATCH', 'route' => array('coursemasters.update', $coursemaster->id))) }}
    <ul>
        <li>
            {{ Form::label('courseCategory_id', 'courseCategory_id:') }}
            {{ Form::text('courseCategory_id') }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('coursemasters.show', 'Cancel', $coursemaster->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop