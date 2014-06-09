@extends('layouts.scaffold')

@section('main')

<h1>Show Coursecategory</h1>

<p>{{ link_to_route('coursecategories.index', 'Return to all coursecategories') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>courseCategoryName</th>
				<th>CoursecategoryDescription</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $coursecategory->courseCategoryName }}}</td>
					<td>{{{ $coursecategory->coursecategoryDescription }}}</td>
                    <td>{{ link_to_route('coursecategories.edit', 'Edit', array($coursecategory->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('coursecategories.destroy', $coursecategory->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop