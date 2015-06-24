{{Form::open(['route'=>'category_upload', 'files'=> true])}}

{{Form::hidden('category_id', $category->id)}}
		<!-- Thumbnail -->
<div class="form-group">

		{{ Form::file('img') }}
</div>

<button class="btn btn-primary" type="submit">Upload</button>
{{Form::close()}}