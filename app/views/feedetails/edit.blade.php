@extends('layouts.scaffold')

@section('main')

<h1>Edit Feedetail</h1>
{{ Form::model($feedetail, array('method' => 'PATCH', 'route' => array('feedetails.update', $feedetail->id))) }}
    <ul>
        <li>
            {{ Form::label('student_id', 'Student_id:') }}
            {{ Form::text('student_id') }}
        </li>

        <li>
            {{ Form::label('paidDate', 'PaidDate:') }}
            {{ Form::text('paidDate') }}
        </li>

        <li>
            {{ Form::label('paidAmount', 'PaidAmount:') }}
            {{ Form::text('paidAmount') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('feedetails.show', 'Cancel', $feedetail->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop