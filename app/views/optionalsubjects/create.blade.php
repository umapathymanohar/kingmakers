@extends('layouts.scaffold')

@section('main')

<h1>Create Optionalsubject</h1>

{{ Form::open(array('route' => 'optionalsubjects.store')) }}
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


