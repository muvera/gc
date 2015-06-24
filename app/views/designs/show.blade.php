@extends('layouts.product')

@section('title')
{{$design->name}}
@stop

@section('script')
@include('include.upload_script')
@stop


@section('content')


<div class="row">
<div class="col-md-2">
    @include('layouts.user_menu')
</div>

<div class="col-md-10 panel panel-default">
<div class="row">

  <h4>
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="{{route('categories.show', $product->categories()->first()->id)}}" class=""> {{$product->categories()->first()->name}}</a></li>
  <li><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></li>
  <li class="active">{{$design->name}}</li>
</ol>
</h4>

<div class="col-md-6">

@if($design->costumize == 1)
	<!-- // If product is an upload -->
<a data-ip-modal="#avatarModal">
 <img src="/uploads/products/{{$product->id}}/{{$design->styles()->first()->id}}/r{{$design->img}}" width="500" class="img-responsive">
</a>
@else
<img src="/uploads/products/{{$product->id}}/{{$design->styles()->first()->id}}/r{{$design->img}}" width="500" class="img-responsive">
@endif

<!-- Product info -->
        <h4>{{$design->name}}</h4>
        <small><strong>Cut Type:</strong> {{$design->styles()->first()->name}}</small><br>
        <small><strong>Size: </strong>{{$design->styles()->first()->dimention}} inches</small><br>
        <strong>Price:</strong> ${{$design->styles()->first()->price}}<br>
        <small>Status: In Stock</small> <br>
        <small>Customizable: @if($design->styles()->first()->customize == 1) Yes @else No @endif</small><br>
        <small>Images Per sheet: {{$design->styles()->first()->count}}</small><br>
        <small>Precut: @if($design->styles()->first()->precut == 1) Yes @else No @endif </small><br>
        <small>Sheet Color: @if($design->styles()->first()->color == 0) White @else Other @endif</small><br>
        <small>Material: {{$design->styles()->first()->material}}</small><br>

<?php
Session::put('current_design', '/uploads/products/'.$product->id .'/'.$design->styles()->first()->id.'/'.$design->img)
?>
</div>


<div class="col-md-6">
@if($design->costumize == 1)
@include('pages.upload')
@else
@include('payments.add_design')
@endif

@include('layouts.design_menu')


</div>
</div>
@stop

</div>
</div>
