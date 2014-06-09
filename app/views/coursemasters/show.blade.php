@extends('layouts.scaffold')

@section('main')

<h1>Show Coursemaster</h1>

<p>{{ link_to_route('coursemasters.index', 'Return to all coursemasters') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>courseCategory_id</th>
				<th>CourseName</th>
				<th>CourseDescription</th>
				<th>CourseFees</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $coursemaster->courseCategory_id }}}</td>
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
    </tbody>
</table>

@stop