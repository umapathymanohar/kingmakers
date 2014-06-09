@extends('layouts.scaffold')

@section('main')

<h1>All Coursecategories</h1>

<p>{{ link_to_route('coursecategories.create', 'Add new coursecategory') }}</p>

@if ($coursecategories->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>courseCategoryName</th>
				<th>CoursecategoryDescription</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($coursecategories as $coursecategory)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no coursecategories
@endif

@stop