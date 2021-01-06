@extends('admin.layout')

@section('title', 'Protection')
@section('panel')
	<h3>Protection Center</h3>
	<hr>
	@include('partials.errors')
	@include('partials.session')
	<p>Delete all the links containing this word:</p>
	<form role="form" action="{{ url('admin/protection') }}" method="POST">
		<div class="form-group">
			<input type="text" class="form-control" name="word">
		</div>
		<button class="btn btn-warning btn-lg btn-block">Delete Links</button>
	</form>
@endsection
