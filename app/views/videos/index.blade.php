
@extends('layouts.master')
@section('content')


<h1>Video Gallery</h1>


<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Video</th>
          <th>Category</th>
          @if(Auth::user())
  @if(Auth::user()->roles()->first()->name = 'admin')
          <th>Control</th>
  @endif
@endif
        </tr>
      </thead>
      <tbody>
      
@foreach($videos as $video)
<tr>
	<td>{{$video->id}}</td>
	<td>
<h4><a href="{{route('videos.show', $video->id)}}">{{$video->name}}</a></h4>
    
  <br>
{{$video->video}}
  </td>
	<td>{{$video->description}}</td>
	<td></td>
  <td>{{$video->vidcategories()->first()->name}}</td>
@if(Auth::user())
  @if(Auth::user()->roles()->first()->name = 'admin')
	<td>

	{{Form::open(['method'=>'DELETE', 'route'=>['videos.destroy', $video->id]])}}
	{{Form::hidden('id', $video->id)}}
    <a href="{{route('videos.edit', $video->id)}}" class="btn btn-default">Edit</a>
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}

	</td>
    @endif
@endif	
</tr>
@endforeach
      </tbody>
    </table>
@if(Auth::user())
  @if(Auth::user()->roles()->first()->name = 'admin')
<a href="{{route('videos.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>
  @endif
@endif
@stop
