@extends('layouts.main')
@section('script')
@include('include.upload_script')
@stop

@section('content')
<div class="row">

  <div class="col-md-5">
    <h3>
    <a href="/" class="">Gallery</a> 
    <a href="{{route('categories.show', $product->categories()->first()->id)}}" class=""> {{$product->categories()->first()->name}}</a>
    <a href="{{route('products.show', $product->id)}}">
    {{$product->name}}
	</a>
    
  </h3>


	@if('/uploads/products/'.$product->id .'/'.$design->id.'/'.$design->img == Session::get('current_design'))
	<img src="{{Session::get('preview')}}" width="500" class="img-responsive">
	@else
	<img src="/uploads/products/{{$product->id}}/{{$design->id}}/{{$design->img}}" width="500" class="img-responsive">
	@endif

{{Session::get('preview')}}
<br>


<br>Macth
{{'/uploads/products/'.$product->id .'/'.$design->id.'/'.$design->img}}
<br>Mathch
{{Session::get('current_design')}}

<?php
Session::put('current_design', '/uploads/products/'.$product->id .'/'.$design->id.'/'.$design->img)
?>

<br>




  </div>

<div class="col-md-5">
  <h3>Costumize</h3>
  <div class="row">
@include('pages.upload')
</div>
</div>

</div>
@stop
