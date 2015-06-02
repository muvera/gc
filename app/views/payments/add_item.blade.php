
{{Form::open(['route'=>'add_item'])}}
{{Form::hidden('design_id', $design->id)}}
{{Form::hidden('preview', 'preview.jpg')}}
<button class="btn btn-success btn-block">Add to Cart</button>
{{Form::close()}}

@if(Session::get('items'))
You have {{count(Session::get('items'))}} items.
<a href="/checkout" class="btn btn-primary">Checkout</a>

<a href="/delete_items">Delete</a>
@endif