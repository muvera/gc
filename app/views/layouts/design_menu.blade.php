
 <div class="row">
 <h5><a href="{{route('products.show', $product->id)}}" >More related {{$product->name}} products</a></h5>

@foreach($product->designs()->get() as $design)
<div class="col-md-3">
<a href="{{route('designs.show', $design->id)}}">
<img src="/uploads/products/{{$product->id}}/{{$design->styles()->first()->id}}/r{{$design->img}}" width="200" class="img-responsive" alt="{{$design->styles()->first()->name}}">
</a>
</div>
@endforeach

</div>

