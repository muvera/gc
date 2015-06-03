@extends('layouts.master')
@section('content')

<center>
	<h1>Thank you!</h1>
	<h2><strong>Order #:</strong> {{$invoice}}</h2>
	<h3><strong>Email: {{$email}}</strong></h3>
	 
</center>

@stop