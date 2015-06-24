

<div class="panel panel-default">
  <div class="panel-body">
  	<h5><a href="{{route('categories.show', $product->categories()->first()->id)}}" >{{$product->categories()->first()->name}}</a></h5>

<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
@foreach($product->designs()->get() as $design)
 <li role="presentation" class="active"><a href="{{route('designs.show', $design->id)}}">{{$design->styles()->first()->name}}</a></li>
@endforeach
    </ul>

</div>
</div>