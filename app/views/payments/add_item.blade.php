
{{Form::open(['route'=>'add_item'])}}
{{Form::hidden('design_id', $design->id)}}
{{Form::hidden('preview', $preview)}}
		<!-- greetings -->
<div class="form-group">
		{{ Form::label('greetings', 'Custom Text:') }}
		{{ Form::text('greetings', null, ['class'=>'form-control']) }}
</div>
<button class="btn btn-success btn-block">Add to Cart</button>
{{Form::close()}}

@if(Session::get('items'))
You have {{count(Session::get('items'))}} <a href="/checkout">items.</a>

@endif