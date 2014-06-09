@extends('layouts.scaffold')

@section('main')

<h1>All Optionalsubjects</h1>

<p>{{ link_to_route('optionalsubjects.create', 'Add new optionalsubject') }}</p>

@if ($optionalsubjects->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>optionalSubjectName</th>
				<th>OptionalSubjectDescription</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($optionalsubjects as $optionalsubject)
                <tr>
                    <td>{{{ $optionalsubject->optionalSubjectName }}}</td>
					<td>{{{ $optionalsubject->optionalSubjectDescription }}}</td>
                    <td>{{ link_to_route('optionalsubjects.edit', 'Edit', array($optionalsubject->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('optionalsubjects.destroy', $optionalsubject->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no optionalsubjects
@endif

@stop