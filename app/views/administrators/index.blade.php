@extends('layouts.master')
@section('content')
<div class="row">
<h1>Orders</h1>
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Invoice</th>
          <th>Name</th>
          <th>Description</th>
          <th>Shipping</th>
          <th>Control</th>
        </tr>
      </thead>
      <tbody>
      	


@foreach($orders as $order)
<tr>
	<td>{{$order->id}}</td>
  <td>{{$order->invoice}}</td>
	<td><a href="{{route('orders.show',$order->id)}}">{{$order->first_name}} {{$order->last_name}}</a></td>
	<td>

<?php
$items = unserialize($order->items);
?>

{{var_dump($items)}}

  </td>
	<td>{{$order->shipping}}</td>
	<td>

	<a href="{{route('orders.edit',$order->id)}}">Edit</a>
	{{Form::open(['method'=>'DELETE', 'route'=>['orders.destroy',$order->id]])}}
	{{Form::hidden('id',$order->id)}}
	<button type="submit" class="btn btn-default">Submit</button>
	{{Form::close()}}
	</td>
	


</tr>
@endforeach

      </tbody>
    </table>

<a href="{{route('orders.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>

</div>
@stop


