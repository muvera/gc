@extends('layouts.master')
@section('content')

<h1>Create New Product</h1>
{{Form::open(['route'=>'products.store'])}}

		<!-- $category -->
<div class="form-group">
{{ Form::label('category', 'Category') }}
<select name="category_id" class="form-control">
	@foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  	@endforeach
</select>
</div>

		<!-- $category -->
<div class="form-group">
{{ Form::label('style', 'Style') }}
<select name="style_id" class="form-control">
	@foreach($styles as $style)
  <option value="{{$style->id}}">{{$style->name}}</option>
  	@endforeach
</select>
</div>

		<!-- $category -->
<div class="form-group">
{{ Form::label('size', 'Size') }}
<select name="size_id" class="form-control">
	@foreach($sizes as $size)
  <option value="{{$size->id}}">{{$size->name}}</option>
  	@endforeach
</select>
</div>


		<!-- name -->
<div class="form-group">
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class'=>'form-control']) }}
</div>

		<!-- Description -->
<div class="form-group">
		{{ Form::label('description', 'Description:') }}
		{{ Form::textarea('description', null, ['class'=>'form-control']) }}
</div>


{{Form::submit()}}
{{Form::close()}}

@stop
