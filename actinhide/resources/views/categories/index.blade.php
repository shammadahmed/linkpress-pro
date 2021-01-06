@extends('master')

@section('title', 'Categories')
@section('content')
	<div class="block">
		<h3>Categories</h3>
		<hr>
		<div class="row">
		    <div class="col-md-4">
				<?php $count = 1?>
				@foreach($categories as $category)
					<h4>
						{{ $category['name'] }}
						<a href="{{ url('links/category/' . $category['name']) }}" class="pull-right">
							({{ $category['count'] }})
						</a>
					</h4>
					@if($count % 14 == 0 && $count > 0)
				        </div>
				        <div class="col-md-4">
				    @endif
				    <?php $count++;?>
				@endforeach
		</div>
	</div>
@endsection
