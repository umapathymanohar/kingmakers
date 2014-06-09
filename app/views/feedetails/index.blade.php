@extends('layouts.scaffold')

@section('main')

<h1>All Feedetails</h1>

<p>{{ link_to_route('feedetails.create', 'Add new feedetail') }}</p>

@if ($feedetails->count())

      <table class="table table-bordered table-striped prepend-top">
            <thead>
              <tr>
                <th>#</th>
                <th>id</th>
                <th>Date</th>
                <th>Amount</th>
                
                <th colspan="4">Actions</th>
              </tr>
            </thead>
            <tbody>
                 @foreach ($feedetails as $feedetail)

             <tr>
                   <td>{{{ $feedetail->id }}}</td>
                    <td>{{{ $feedetail->paidDate }}}</td>
                    <td>{{{ $feedetail->paidAmount }}}</td>
              <td><span title="Toggle inactive / active" class="label success status">inactive </span></td>

              <td>{{ date("F j, Y",strtotime($feedetail->created_at)) }}</td>
              <td><a href="{{URL::route('feedetails.show', array($feedetail->id))}}" title="view"><i class="icon-eye-open green large"></i></a>
</td><td>
               <a href="{{URL::route('feedetails.edit', array($feedetail->id))}}" title="Edit">

                <i class="icon-fire orange large"></i></a>

           </td>
           <td>
                   {{ Form::open(array('method' => 'DELETE', 'route' => array('feedetails.destroy', $feedetail->id))) }}
                   <button type="submit"><i class="icon-trash red"></i></button>
                   {{ Form::close() }}
           </td>
            </tr>
                    @endforeach
          </tbody>
        </table>

 
@else
    There are no feedetails
@endif

@stop