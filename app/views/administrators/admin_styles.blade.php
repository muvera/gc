
@extends('layouts.master')
@section('content')


<h1>Styles</h1>


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
      	
@foreach($styles as $style)
<tr>
	<td>{{$style->id}}</td>
	<td><a href="{{route('styles.show', $style->id)}}">{{$style->name}}</a></td>
	<td>{{$style->description}}</td>
	<td>{{$style->img}}</td>
	<td>

	<a href="{{route('styles.edit', $style->id)}}">Edit</a>
	{{Form::open(['method'=>'DELETE', 'route'=>['styles.destroy', $style->id]])}}
	{{Form::hidden('id', $style->id)}}
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}
	</td>
	
</tr>
@endforeach

      </tbody>
    </table>

<a href="{{route('styles.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

@stop
