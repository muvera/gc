<h1>Login</h1>
{{Form::open(['route'=>'sessions.store'])}}

		<!-- email -->
<div class="form-group">
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email', null, ['class'=>'form-control']) }}
</div>

		<!-- password -->
<div class="form-group">
		{{ Form::label('password', 'password:') }}
		{{ Form::text('password', null, ['class'=>'form-control']) }}
</div>

{{Form::submit()}}
{{Form::close()}}
