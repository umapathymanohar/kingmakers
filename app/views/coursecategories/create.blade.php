@extends('layouts.scaffold')

@section('main')

<h1>Create Coursecategory</h1>

{{ Form::open(array('route' => 'coursecategories.store')) }}
    <ul>
        <li>
            {{ Form::label('courseCategoryName', 'courseCategoryName:') }}
            {{ Form::text('courseCategoryName') }}
        </li>

        <li>
            {{ Form::label('coursecategoryDescription', 'CoursecategoryDescription:') }}
            {{ Form::text('coursecategoryDescription') }}
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


