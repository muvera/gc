@extends('layouts.master')
@section('content')
<div class="row">

  <div class="col-md-10"><h1>Gallery</h1>
  
  <?php
  $categories = Category::get();
  ?>

@foreach($categories as $category)
<a href="{{route('categories.show', $category->id)}}">
<img src="/uploads/categories/{{$category->id}}/{{$category->img}}" width="200" height="200">
</a>
@endforeach

  </div>
</div>
@stop


viewindex