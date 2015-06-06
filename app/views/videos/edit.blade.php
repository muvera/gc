@extends('layouts.master')
@section('content')

<h1>Update Video</h1>
{{Form::model($video,['method'=>'PATCH', 'route'=>['videos.update',$video->id]])}}

		<!-- $category -->
<div class="form-group">
{{ Form::label('$category', 'Category') }}
<select name="category_id" class="form-control">
	@foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  	@endforeach
</select>
</div>

		<!-- name -->
<div class="form-group">
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class'=>'form-control']) }}
</div>



{{$video->video}}
		<!-- Description -->
<div class="form-group">
		{{ Form::label('description', 'Description:') }}
		{{ Form::text('description', null, ['class'=>'form-control']) }}
</div>

		<!-- level -->
<div class="form-group">
{{ Form::label('level', 'Level') }}
<select name="level" class="form-control">
  <option value="1">Beginner</option>
  <option value="2">Intermediate</option>
  <option value="3">Expert</option>
</select>
</div>


		<!-- order -->
<div class="form-group">
{{ Form::label('order', 'Order') }}
<select name="order" class="form-control">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select>
</div>

		<!-- video -->
<div class="form-group">
		{{ Form::label('video', 'Video:') }}
		{{ Form::textarea('video', null, ['class'=>'form-control']) }}
</div>

<button class="btn btn-primary" type="submit">Save</button>
{{Form::close()}}
@stop