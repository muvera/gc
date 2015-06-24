@extends('layouts.master')
@section('title')
{{$category->name}}
@stop
@section('content')
<div class="row">
<div class="col-md-2">
	
	@include('layouts.user_menu')

</div>
<div class="col-md-10 panel panel-default">
	  <h4>
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li class="active">{{$category->name}}</li>
</ol>
</h4>


<div class="row">
@foreach($category->products()->get() as $product)
<div class="col-md-4">
<a href="{{route('products.show', $product->id)}}" class="">
<img src="/uploads/products/{{$product->id}}/{{$product->img}}" class="thumbnail img-responsive" >
</a>
</div>
@endforeach
</div>

</div>

@stop

</div>

