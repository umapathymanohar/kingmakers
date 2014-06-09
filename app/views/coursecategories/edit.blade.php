@extends('layouts.scaffold')

@section('main')

<h1>Edit Coursecategory</h1>
{{ Form::model($coursecategory, array('method' => 'PATCH', 'route' => array('coursecategories.update', $coursecategory->id))) }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('coursecategories.show', 'Cancel', $coursecategory->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop