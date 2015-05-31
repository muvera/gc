@extends('layouts.master')
@section('content')
<div class="row">

  <div class="col-md-10"><h3><a href="/" class="">Gallery</a> - {{$category->name}}</h3>

@foreach($category->products()->get() as $product)
<a href="{{route('products.show', $product->id)}}" class="">
<img src="/uploads/products/{{$product->id}}/{{$product->img}}" width="300" class="thumbnail">
</a>
@endforeach

  </div>
</div>
@stop
