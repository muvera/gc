@extends('layouts.master')
@section('content')
<div class="row">

  <h4>
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li class="active">{{$category->name}}</li>
</ol>
</h4>


<div class="row">
@foreach($category->products()->get() as $product)
<div class="col-md-3">
<a href="{{route('products.show', $product->id)}}" class="">
<img src="/uploads/products/{{$product->id}}/{{$product->img}}" width="300" class="thumbnail img-responsive" >
</a>
</div>
@endforeach
</div>

  
</div>
@stop
