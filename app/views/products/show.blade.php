@extends('layouts.master')
@section('title')
{{$product->name}}
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
  <li class="active">{{$product->name}}</li>
</ol>
</h4>

@foreach($product->designs()->get() as $design)
      <div class="row">
        <div class="col-md-4">
     <a href="{{route('designs.show', $design->id)}}" class="thumbnail" width="300">
    <img src="/uploads/products/{{$product->id}}/{{$design->styles->first()->id}}/r{{$design->img}}"  alt="{{$design->name}}">
    </a>   
        </div>
        <div class="col-md-7">
        
        <h4>{{$design->styles()->first()->name}}</h4>
        Price: ${{$design->styles()->first()->price}}<br>
        <small>Customizable: @if($design->styles()->first()->customize == 1) Yes @else No @endif</small><br>
        <small>Dimentions: {{$design->styles()->first()->dimention}} inches</small><br>
        <small>Images Per sheet: {{$design->styles()->first()->count}}</small><br>
        <small>Precut: @if($design->styles()->first()->precut == 1) Yes @else No @endif </small><br>
        <small>Sheet Color: @if($design->styles()->first()->color == 0) White @else Other @endif</small><br>
        <small>Material: {{$design->styles()->first()->material}}</small><br>

        <a href="{{route('designs.show', $design->id)}}" width="300"> 
          <button class="btn btn-primary">View Product</button>
        </a>
        </div>
        

      </div>
@endforeach

</div>
@stop
</div>
</div>