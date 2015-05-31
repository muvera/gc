@extends('layouts.master')
@section('content')
<div class="row">

  <div class="col-md-12">
  	<h3>
  	<a href="/" class="">Gallery</a> 
  	<a href="{{route('categories.show', $product->categories()->first()->id)}}" class=""> {{$product->categories()->first()->name}}</a>
  	
  	{{$product->name}}
  </h3>
@foreach($product->designs()->get() as $design)
      <div class="col-md-5">
        {{$design->styles()->first()->name}}
        <a href="{{route('designs.show', $design->id)}}" class="thumbnail">
    <img src="/uploads/products/{{$product->id}}/{{$design->styles->first()->id}}/{{$design->img}}"  alt="{{$design->name}}">

    </a>
      </div>
@endforeach


  </div>



</div>
@stop
