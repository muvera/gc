<?php
$categories = Category::get();
?>


<div class="panel panel-default">
  <div class="panel-body">
<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
@foreach($categories as $category)
	@if($category->active == 1)
	<li role="presentation" class="active"><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
	@endif
 
@endforeach
    </ul>

</div>
</div>