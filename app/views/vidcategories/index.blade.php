
@extends('layouts.master')
@section('content')


<h1>Show All Video Categories</h1>


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
      	




@foreach($categories as $category)
<tr>
	<td>{{$category->id}}</td>
	<td><a href="{{route('vidcategories.show', $category->id)}}">{{$category->name}}</a></td>
	<td>{{$category->description}}</td>
	<td>{{$category->img}}</td>
	<td>

	<a href="{{route('vidcategories.edit', $category->id)}}">Edit</a>
	{{Form::open(['method'=>'DELETE', 'route'=>['vidcategories.destroy', $category->id]])}}
	{{Form::hidden('id', $category->id)}}
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}
	</td>
	


</tr>
@endforeach


      </tbody>
    </table>




<a href="{{route('vidcategories.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

@stop
