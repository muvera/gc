@extends('layouts.master')
@section('content')

<center>
	<h1>Thank you!</h1>
	<h2><strong>Order #:</strong> {{$invoice}}</h2>
	<h2>Order was placed successfully! Please check your email for a tracking number at the end of the business day.</h2>
	<h3><strong>Email: {{$email}}</strong></h3>
	 
</center>

@stop