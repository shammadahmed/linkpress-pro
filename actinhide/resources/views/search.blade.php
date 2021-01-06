@extends('master')

@section('title', 'Search Results')

@section('content')
	<div class="block">
		<h3>Showing search results for "{{ old('q') }}"</h3>
		<p>{{ $links->count() }} results found</p>
		<hr>
		@foreach($links as $link)
			@include('partials.link')
		@endforeach
	</div>
	<div class="block">
		{!! $links->render() !!}
	</div>
@endsection
