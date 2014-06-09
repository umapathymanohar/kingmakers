@extends('layouts.scaffold')

@section('main')

<h1>All Coursebatches</h1>

<p>{{ link_to_route('coursebatches.create', 'Add new coursebatch') }}</p>

@if ($coursebatches->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>batchName</th>
				<th>BatchDescription</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($coursebatches as $coursebatch)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no coursebatches
@endif

@stop