@extends('layouts.master')
@section('title')
Custom Edible Photos & Prints
@stop

@section('content')

<div class="row">
	<div class="col-md-6">
	<img src="http://storage.googleapis.com/anothermm/edible-image-cake.png" alt="Gogo Cake Edible Cake Images Banner" class="img-responsive">
	</div>
	<div class="col-md-6">

<div class="panel panel-default">
<div class="panel-heading"><h1>Custom Edible Images</h1></div>
		<div class="panel-body">
		<?php
		$category = Category::find(2);
		$categories = Category::get();
		?>

<div class="row">
@foreach($category->products()->get() as $product)
<div class="col-md-4">
<a href="{{route('products.show', $product->id)}}" >
<img src="/uploads/products/{{$product->id}}/{{$product->img}}" width="300" class="thumbnail img-responsive" >
</a>
</div>
@endforeach
</div>
<div class="panel-footer">
	@foreach($categories as $category)
	<strong><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></strong> | 
	@endforeach
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

