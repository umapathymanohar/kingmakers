@extends('layouts.scaffold')

@section('main')

<h1>Create Feesmaster</h1>

{{ Form::open(array('route' => 'feesmasters.store')) }}
    <ul>
        <li>
            {{ Form::label('student_id', 'Student_id:') }}
            {{ Form::text('student_id') }}
        </li>

        <li>
            {{ Form::label('remainingFees', 'RemainingFees:') }}
            {{ Form::text('remainingFees') }}
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


