@extends('layouts.product')
@section('script')
@include('include.upload_script')
@stop

@section('content')
<div class="row">
  <h4>
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="{{route('categories.show', $product->categories()->first()->id)}}" class=""> {{$product->categories()->first()->name}}</a></li>
  <li><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></li>
  <li><a href="{{route('designs.show', $design->id)}}">{{$design->name}}</a></li>
  <li class="active">Preview</li>
</ol>
</h4>


  <div class="col-md-5">
	<img src="{{$preview}}" width="500" class="img-responsive">
<br>
  </div>

<div class="col-md-5">
<a class="btn btn-default" href="{{route('designs.show', $design->id)}}"> <span class="glyphicon glyphicon-picture"></span> Change Image</a>
@include('payments.add_item')
</div>

</div>
@stop
