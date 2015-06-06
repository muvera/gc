
@extends('layouts.master')
@section('content')


<h1>Show All Videos</h1>


<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Video</th>
          <th>Category</th>
          <th>Control</th>
        </tr>
      </thead>
      <tbody>
      
@foreach($videos as $video)
<tr>
	<td>{{$video->id}}</td>
	<td><a href="{{route('videos.show', $video->id)}}">{{$video->name}}</a></td>
	<td>{{$video->description}}</td>
	<td>{{$video->video}}</td>
  <td>{{$video->vidcategories()->first()->name}}</td>

	<td>

	{{Form::open(['method'=>'DELETE', 'route'=>['videos.destroy', $video->id]])}}
	{{Form::hidden('id', $video->id)}}
    <a href="{{route('videos.edit', $video->id)}}" class="btn btn-default">Edit</a>
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}
	</td>
	
</tr>
@endforeach
      </tbody>
    </table>

<a href="{{route('videos.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

@stop
