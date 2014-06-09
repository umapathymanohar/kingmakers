@extends('layouts.scaffold')

@section('main')

<h1>Show Feedetail</h1>

<p>{{ link_to_route('feedetails.index', 'Return to all feedetails') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Student_id</th>
				<th>PaidDate</th>
				<th>PaidAmount</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $feedetail->student_id }}}</td>
					<td>{{{ $feedetail->paidDate }}}</td>
					<td>{{{ $feedetail->paidAmount }}}</td>
                    <td>{{ link_to_route('feedetails.edit', 'Edit', array($feedetail->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('feedetails.destroy', $feedetail->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop