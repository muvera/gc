@extends('layouts.master')
@section('content')
<div class="row">

  <h3><a href="/" class="">Gallery</a> - {{$category->name}}</h3>

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
