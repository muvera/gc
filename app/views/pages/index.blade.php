@extends('layouts.main')
@section('content')

<div class="row">
<?php $categories = Category::get(); ?>

@foreach($categories as $category)
<a href="{{route('categories.show', $category->id)}}">
<img src="/uploads/categories/{{$category->id}}/{{$category->img}}" width="200" height="200">
</a>
@endforeach

  </div>
</div>
@stop

