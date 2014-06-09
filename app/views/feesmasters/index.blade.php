@extends('layouts.scaffold')

@section('main')

<h1>All Feesmasters</h1>

<p>{{ link_to_route('feesmasters.create', 'Add new feesmaster') }}</p>

@if ($feesmasters->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Student_id</th>
				<th>RemainingFees</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($feesmasters as $feesmaster)
                <tr>
                    <td>{{{ $feesmaster->student_id }}}</td>
					<td>{{{ $feesmaster->remainingFees }}}</td>
                    <td>{{ link_to_route('feesmasters.edit', 'Edit', array($feesmaster->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('feesmasters.destroy', $feesmaster->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no feesmasters
@endif

@stop