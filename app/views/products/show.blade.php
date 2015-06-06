@extends('layouts.master')
@section('content')
<div class="row">

  <div class="col-md-12">

  <h4>
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="{{route('categories.show', $product->categories()->first()->id)}}" class=""> {{$product->categories()->first()->name}}</a></li>
  <li class="active">{{$product->name}}</li>
</ol>
</h4>


  

  	
  	
  	

@foreach($product->designs()->get() as $design)
      <div class="col-md-5">
        {{$design->styles()->first()->name}}
        <a href="{{route('designs.show', $design->id)}}" class="thumbnail">
    <img src="/uploads/products/{{$product->id}}/{{$design->styles->first()->id}}/r{{$design->img}}"  alt="{{$design->name}}">

    </a>
      </div>
@endforeach


  </div>



</div>
@stop
