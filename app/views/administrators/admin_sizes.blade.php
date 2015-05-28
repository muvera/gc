
@extends('layouts.master')
@section('content')


<h1>Sizes</h1>


<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Control</th>
        </tr>
      </thead>
      <tbody>
      
@foreach($sizes as $size)
<tr>
	<td>{{$size->id}}</td>
	<td><a href="{{route('sizes.show', $size->id)}}">{{$size->name}}</a></td>
	<td>{{$size->description}}</td>
	<td>{{$size->img}}</td>
	<td>

	<a href="{{route('sizes.edit', $size->id)}}">Edit</a>
	{{Form::open(['method'=>'DELETE', 'route'=>['sizes.destroy', $size->id]])}}
	{{Form::hidden('id', $size->id)}}
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}
	</td>
	


</tr>
@endforeach

     </tbody>
    </table>

<a href="{{route('sizes.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

@stop
