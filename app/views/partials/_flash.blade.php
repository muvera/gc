@if(Session::has('notification'))
<div class="alert alert-info">
	<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
	<h4>{{Session::get('notification')}}</h4>
	
</div>
@endif
