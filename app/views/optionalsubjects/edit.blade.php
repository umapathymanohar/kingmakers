@extends('layouts.scaffold')

@section('main')

<h1>Edit Optionalsubject</h1>
{{ Form::model($optionalsubject, array('method' => 'PATCH', 'route' => array('optionalsubjects.update', $optionalsubject->id))) }}
    <ul>
        <li>
            {{ Form::label('optionalSubjectName', 'optionalSubjectName:') }}
            {{ Form::text('optionalSubjectName') }}
        </li>

        <li>
            {{ Form::label('optionalSubjectDescription', 'OptionalSubjectDescription:') }}
            {{ Form::text('optionalSubjectDescription') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('optionalsubjects.show', 'Cancel', $optionalsubject->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop