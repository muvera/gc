
@extends('layouts.master')
@section('content')


<h1>Products</h1>


<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Main Image</th>
          <th>Style Images</th>
          <th>Control</th>
        </tr>
      </thead>
      <tbody>
      	
@foreach($products as $product)
<tr>
	<td>{{$product->id}}</td>
	<td><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></td>
	<td>{{$product->description}}</td>
	<td>

@if($product->img)
<img src="/uploads/products/{{$product->id}}/{{$product->img}}" width="100" >
@else
Upload Sample
@endif
@include('include.uploads.product')
  </td>

  <td> 

    @include('include.uploads.modals.style')
  </td>
	<td>
 
	<a href="{{route('products.edit', $product->id)}}" class="btn btn-default btn-block">Edit</a>
	{{Form::open(['method'=>'DELETE', 'route'=>['products.destroy', $product->id]])}}
	{{Form::hidden('id', $product->id)}}
	<button type="submit" class="btn btn-default btn-block">Delelte</button>
	{{Form::close()}}
	</td>
	


</tr>
@endforeach

      </tbody>
    </table>

<a href="{{route('products.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

@stop
