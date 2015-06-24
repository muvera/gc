@extends('layouts.master')
@section('title')
Digital Cake Decorating & Custom Edible Images for Cakes, Cookies and Pastries. Online ditigital cake decorating for bakers and bakeries. Lessons, Tutorials, Videos, Step by step. 
@stop

		<?php
		$products = Product::where('feature', '=', 1)->get();
		?>

@section('content')

<div class="row">

	<div class="col-md-2">
    @include('layouts.user_menu')
</div>
	<div class="col-md-10">

@include('include.carrusel')



<div class="panel panel-default">


<div class="panel-heading">Popular Products</div>
		<div class="panel-body">
<div class="row">
@foreach($products as $product)
<div class="col-md-4 thumbnail ">
<a href="{{route('products.show', $product->id)}}" >
<img src="/uploads/products/{{$product->id}}/{{$product->img}}" width="300" class="img-responsive" >

<h3>{{str_limit($product->name, '22')}}</h3>
</a>
{{str_limit($product->description, '45')}}
<br>
${{$product->styles()->first()->price}}
</div>
@endforeach
</div>

<div class="panel-footer">
<h1>Welcome to Digital Cake Decorating by GogoCake</h1>
<p>We specialize in edible printing design for cakes, cupcakes and pastries since 2008. Our company was started in Palo Alto California and has establish a loyal following since. We have been featured in multiple TV shows, Magazines and our product designs have appear in movies and thousands of cakes around the country. 
	<br>
	Thank you for using our edible image digital products and services. We hope you have fun designing your own edible image in our website of lear how to doit from our lessons and video tutorials. If you have any feed back please send us an email to sales@gogocakes.com</p>
</div>



		</div>
</div>

	</div>



  </div>

<style>
	
@media (min-width: 768px) and (max-width: 991px) {
    .portfolio>.clear:nth-child(4n)::before {
      content: '';
      display: table;
      clear: both;
    }
}
@media (min-width: 992px) {
    .portfolio>.clear:nth-child(6n)::before {  
      content: '';
      display: table;
      clear: both;
    }
}

.responsive-video {
position: relative;
padding-bottom: 56.25%;
padding-top: 0px; overflow: hidden;
}


.responsive-video iframe,
.responsive-video object,
.responsive-video embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
</style>




	
@foreach($vidcategories as $category)
<div class="container panel panel-default">
  <div class="row portfolio">
  	<div class="panel-heading"><h3> <span class="glyphicon glyphicon-film"></span> {{$category->name}}</h3></div>

	@foreach($category->videos()->get() as $video)
    <div class="col-sm-5 col-md-4">
		<div class="thumbnail">
	<h4>{{$video->name}}</h4>
	<center>
		<div class="responsive-video">
	{{$video->video}}
		</div>
	</center>
	<br>
	{{str_limit($video->description, '45')}}
	
		</div>
	</div>

  <div class="clear"></div>

	@endforeach
</div>
</div>
@endforeach



</div>

<center>
	<p>Upload a Photo or Image and have us print it on edible sugar sheets which you can use to create fabulous cakes, cookies, cupcakes and other edible art creations!</p>
</center>
@stop

