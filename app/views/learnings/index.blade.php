
@extends('layouts.master')
@section('meta')
Digital Cake Decorating
@stop
@section('content')

<div class="row">
  <div class="col-md-8">
   <h1>Digital Cake Decorating</h1>
<p>Welcome to GogoCake learning center for cake decorating. 
  <br>
We provide easy to understand learning material for bakeries, students and home bakers.
<br>
Cake decorating classes are $100 a week plus materials. At the moment we don't charge for online 
lessons but if you find this material usefull and it helps you in some kind of way, please buy us lunch. 
<br>
It will give us energy to keep posting free cake decorating material for your institution or business.
 
  </div>
  <div class="col-md-4">
    <h1>$5 Bucks Donation</h1>
    <h4>Keep cake decorating alive!</h4>
    <br>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WFKWNN9RKDV38">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
  </div>
</div>

<hr>


<div class="row">
<h1>Lessons</h1>

<a href="/learnings/12"><h3>Lesson 1. Baker Tools Essentials <small> Time: 44 minutes</small></h3></a>
    <a href="#"><h3>Lesson 2. How to Decorate a traditional cake <small> Time: 2 hours</small></h3></a>
    <a href="#"><h3>Lesson 3. Digital Edible Images 101 <small> Time: 10 minutes</small></h3></a>
    <a href="#"><h3>Lesson 4. Introduction Digital Design <small> Time: 20 minutes</small></h3></a>
    <a href="#"><h3>Lesson 5. Edible Paper Types <small> Time: 10 minutes</small></h3></a>
    <a href="#"><h3>Lesson 6. Edible Printer Machines<small> Time: 20 minutes</small></h3></a>
    <a href="#"><h3>Lesson 7. Food Coloring for Printers <small> Time: 15 minutes</small></h3></a>   
</div>

<h1>Articles</h1>
<hr>
<div class="row">
      
@foreach($categories as $category)
<h3>{{$category->name}}</h3>


@foreach($category->learnings()->get() as $learning)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    	@if(!$learning->imgs()->first())
    	Add an Image
    	@else
    	<img src="/uploads/learnings/{{$learning->id}}/c{{$learning->imgs()->first()->img}}" alt="" width="300">
    	@endif

      
      <div class="caption">
        <h4>  <a href="{{route('learnings.show', $learning->id)}}">{{str_limit($learning->title, 20)}}</a></h4>
	Lesson Id:{{$learning->id}} {{str_limit($learning->description, 20)}}
  <br>
 Level: {{$learning->learcategories()->first()->name}}
	

	  @if(Auth::user())
    @if(Auth::user()->roles()->first()->name == 'admin')
	{{Form::open(['method'=>'DELETE', 'route'=>['learnings.destroy', $learning->id]])}}
	{{Form::hidden('id', $learning->id)}}
	<a href="{{route('learnings.edit', $learning->id)}}" class="btn btn-default">Edit</a>
	<button type="submit" class="btn btn-default">Delete</button>
	{{Form::close()}}

	@endif
	@endif
	      </div>
    </div>
  </div>
@endforeach

<hr>

@endforeach

</div>

  @if(Auth::user())
    @if(Auth::user()->roles()->first()->name == 'admin')
<a href="{{route('learnings.create')}}"> <button type="button" class="btn btn-default"> Create New </button></a>
@endif
@endif
@stop
