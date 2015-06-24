@extends('layouts.master')
@section('content')

<h1>Edit Learning</h1>



@foreach($learning->imgs()->get() as $images)
<a href="/uploads/learnings/{{$learning->id}}/{{$images->img}}">
<img src="/uploads/learnings/{{$learning->id}}/c{{$images->img}}" width="100">
</a>
Name: {{$images->name}}
<div class="form-group">

<input type="text" value="<img src='/uploads/learnings/{{$learning->id}}/c{{$images->img}}' alt='{{$images->name}}' width='400'> " class="form-control">
</div>
<hr>



@endforeach

{{Form::open(['route'=>'learnings_upload', 'files'=> true])}}

{{Form::hidden('learning_id',$learning->id)}}
{{Form::hidden('category_id',$learning->learcategories()->first()->id)}}

		<!-- name -->
<div class="form-group">
		{{ Form::label('name', 'Image Name:') }}
		{{ Form::text('name', null, ['class'=>'form-control']) }}
</div>
		<!-- Thumbnail -->
<div class="form-group">
		{{ Form::label('img', 'Image:') }}
		{{ Form::file('img') }}
</div>



{{Form::submit()}}
{{Form::close()}}

<hr>


{{Form::model($learning,['method'=>'PATCH', 'route'=>['learnings.update',$learning->id]])}}
		<!-- name -->
<div class="form-group">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class'=>'form-control']) }}
</div>


		<!-- name -->
<div class="form-group">
		{{ Form::label('description', 'Description:') }}
		{{ Form::text('description', null, ['class'=>'form-control']) }}
</div>



		<!-- description -->
<div class="form-group">
		{{ Form::label('body', 'Body:') }}@include('videos.modal')	
		{{ Form::textarea('body', null, ['class'=>'form-control']) }}
</div>

<button class="btn btn-primary" type="submit">Submit</button>
{{Form::close()}}


@stop