@if(Session::has('success'))
<div class="alert alert-success">
	{{ Session::get('success') }}
</div>
@elseif(Session::has('danger'))
<div class="alert alert-danger">
	{{ Session::get('danger') }}
</div>
@endif