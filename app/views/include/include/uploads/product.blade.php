{{Form::open(['route'=>'product_upload', 'files'=> true])}}

{{Form::hidden('product_id', $product->id)}}
		<!-- Thumbnail -->
<div class="form-group">

		{{ Form::file('img') }}
</div>

<button class="btn btn-primary" type="submit">Upload</button>
{{Form::close()}}