@extends('layouts.scaffold')

@section('main')

<h1>Edit Feesmaster</h1>
{{ Form::model($feesmaster, array('method' => 'PATCH', 'route' => array('feesmasters.update', $feesmaster->id))) }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('feesmasters.show', 'Cancel', $feesmaster->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop