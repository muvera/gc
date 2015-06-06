@extends('layouts.master')
@section('content')

<h1>Edit Design</h1>
{{Form::model($design,['method'=>'PATCH', 'route'=>['designs.update', $design->id]])}}
		<!-- name -->
<div class="form-group">
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class'=>'form-control']) }}
</div>

		<!-- description -->
	
{{Form::submit()}}
{{Form::close()}}

@stop