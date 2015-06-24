
@extends('layouts.master')
@section('content')


<h1>Show All pproducts</h1>


<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Control</th>
        </tr>
      </thead>
      <tbody>
      	


      </tbody>
    </table>





@foreach($products as $product)
<tr>
	<td>{{$product->id}}</td>
	<td><a href="{{route('pproducts.show', $product->id)}}">{{$product->name}}</a></td>
	<td>{{$product->description}}</td>
	<td>{{$product->img}}</td>
	<td>

	<a href="{{route('pproducts.edit', $product->id)}}">Edit</a>
	{{Form::open(['method'=>'DELETE', 'route'=>['pproducts.destroy', $product->id]])}}
	{{Form::hidden('id', $product->id)}}
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}
	</td>
	


</tr>
@endforeach

<a href="{{route('pproducts.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

@stop
