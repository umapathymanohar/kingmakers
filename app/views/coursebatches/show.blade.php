@extends('layouts.scaffold')

@section('main')

<h1>Show Coursebatch</h1>

<p>{{ link_to_route('coursebatches.index', 'Return to all coursebatches') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>batchName</th>
				<th>BatchDescription</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $coursebatch->batchName }}}</td>
					<td>{{{ $coursebatch->batchDescription }}}</td>
                    <td>{{ link_to_route('coursebatches.edit', 'Edit', array($coursebatch->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('coursebatches.destroy', $coursebatch->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop