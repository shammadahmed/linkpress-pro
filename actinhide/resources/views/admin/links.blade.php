@extends('admin.layout')

@section('title', 'Manage Links')
@section('panel')
	<h3>Manage Links</h3>
	<hr>
	@include('partials.session')
	<div class="table-responsive">
	    <table class="table table-hover">
	    	<thead>
		    	<tr>
		    		<th>#</th>
		    		<th>Link</th>
		    		<th>Delete</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    		@foreach($links as $link)
		    		<tr>
		    			<td>{{ $link->id }}</td>
		    			<td>
			    			<a href="{{ url($link->hash) }}">
			    				{{ $link->title }}
			    			</a>
		    			</td>
		    			<td>
		    				<form role="form" method="POST" action="{{ url('link/' . $link->hash) }}">
		    					{{ method_field('DELETE') }}
		    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    					<button type="submit" class="btn btn-danger">
			    					<i class="fa fa-trash"></i>
		    					</button>
			    			</form>
		    			</td>
		    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
	</div>
	{!! $links->render() !!}
@endsection
