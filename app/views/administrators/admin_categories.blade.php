
@extends('layouts.master')
@section('content')


<h1>Categories</h1>


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
	<td><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></td>
	<td>{{$category->description}}</td>
	<td>

<!-- Image Section Starts -->
<img src="/uploads/categories/{{$category->id}}/{{$category->img}}" width="100">
@include('include.uploads.category')
<!-- Image Section Ends -->
	</td>
	<td>

	<a href="{{route('categories.edit', $category->id)}}">Edit</a>
	{{Form::open(['method'=>'DELETE', 'route'=>['categories.destroy', $category->id]])}}
	{{Form::hidden('id', $category->id)}}
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}
	</td>
	
</tr>
@endforeach

      </tbody>
    </table>

<a href="{{route('categories.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

@stop
