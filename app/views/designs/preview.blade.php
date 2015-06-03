@extends('layouts.product')
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
  Preview
    
  </h3>
	<img src="{{$preview}}" width="500" class="img-responsive">
<br>
  </div>

<div class="col-md-5">
  <h3>Customize</h3>
@include('pages.upload')
@include('payments.add_item')
</div>

</div>
@stop
