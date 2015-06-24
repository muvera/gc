<div class="panel">
<div class="panel-heading"><h3>Categories</h3></div>
	<div class="panel-body">
	@foreach($categories as $category)
	<a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
	<br>
	@endforeach

	</div>
</div>