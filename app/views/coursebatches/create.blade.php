@extends('layouts.scaffold')

@section('main')

<h1>Create Coursebatch</h1>

{{ Form::open(array('route' => 'coursebatches.store')) }}
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


