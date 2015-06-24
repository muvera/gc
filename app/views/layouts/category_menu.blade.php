<div class="panel panel-default">
  <div class="panel-body">
  	<h5><a href="/" >Home</a></h5>
<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
@foreach($products as $product)
 <li role="presentation" class="active"><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></li>
@endforeach
    </ul>

</div>
</div>