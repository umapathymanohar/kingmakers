@extends('layouts.scaffold')

@section('main')

<h1>Edit Coursebatch</h1>
{{ Form::model($coursebatch, array('method' => 'PATCH', 'route' => array('coursebatches.update', $coursebatch->id))) }}
    <ul>
        <li>
            {{ Form::label('batchName', 'batchName:') }}
            {{ Form::text('batchName') }}
        </li>

        <li>
            {{ Form::label('batchDescription', 'BatchDescription:') }}
            {{ Form::text('batchDescription') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('coursebatches.show', 'Cancel', $coursebatch->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop