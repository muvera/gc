@extends('layouts.master')
@section('content')

<h1>Create Lesson</h1>
{{Form::open(['route'=>'learnings.store'])}}

		<!-- $category -->
<div class="form-group">
{{ Form::label('category', 'Category') }}
<select name="category_id">
	@foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  	@endforeach
</select>
</div>

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

		<!-- Description -->
<div class="form-group">
		{{ Form::label('body', 'Body:') }}
		{{ Form::textarea('body', null, ['class'=>'form-control']) }}
</div>

{{Form::submit()}}
{{Form::close()}}

@stop
