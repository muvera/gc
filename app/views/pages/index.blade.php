@extends('layouts.master')
@section('title')
Custom Edible Photos & Prints
@stop

@section('content')

<div class="row">

	<h1>Custom Edible Photos & Prints</h1>
	<p>Upload a Photo or Image and have us print it on edible sugar sheets which you can use to create fabulous cakes, cookies, cupcakes and other edible art creations!</p>



<?php $categories = Category::get(); ?>

@foreach($categories as $category)
<a href="{{route('categories.show', $category->id)}}">
<img src="/uploads/categories/{{$category->id}}/{{$category->img}}" width="200" height="200">
</a>
@endforeach

  </div>
</div>
@stop

