@extends('layouts.scaffold')

@section('main')

<h1>All Coursemasters</h1>

<p>{{ link_to_route('coursemasters.create', 'Add new coursemaster') }}</p>

@if ($coursemasters->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
				<th>CourseName</th>
				<th>CourseDescription</th>
				<th>CourseFees</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($coursemasters as $coursemaster)
                <tr>
					<td>{{{ $coursemaster->courseName }}}</td>
					<td>{{{ $coursemaster->courseDescription }}}</td>
					<td>{{{ $coursemaster->courseFees }}}</td>
                    <td>{{ link_to_route('coursemasters.edit', 'Edit', array($coursemaster->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('coursemasters.destroy', $coursemaster->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no coursemasters
@endif

@stop