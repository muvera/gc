{{Form::open(['route'=>'rectangle_upload', 'files'=> true])}}


		<!-- Thumbnail -->
<div class="form-group">
		{{ Form::label('img', 'Image:') }}
		{{ Form::file('img') }}
</div>


<button type="submit" class="btn btn-primary">Upload</button>
{{Form::close()}}