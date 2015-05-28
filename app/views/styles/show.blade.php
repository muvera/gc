@extends('layouts.master')
@section('content')
<div class="row">

  <div class="col-md-5"><h3><a href="/" class="">Gallery</a> {{$product->name}}</h3>
<img src="{{$product->img}}" width="500" class="img-responsive">

  </div>

<div class="col-md-5">
  <h3><a href="{{route('products.show', $product->products()->first()->id)}}Styles" class="">Back</a> Sample</h3>
  <div class="row">
Sample
</div>


</div>

</div>
@stop


viewindex