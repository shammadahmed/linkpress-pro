@extends('master')

@section('title', 'Bulk Import Links')

@section('content')
	<div class="shortener">
		<div class="block">
			<h1 class="text-center">Bulk Import Links</h1>
			<h4 class="text-muted text-center hidden-xs">UNLEASH THE POWER OF THE LINK</h4>
			@include('partials.errors')
			<form action="{{ url('links/import') }}" method="POST">
				{{ csrf_field() }}
				<textarea rows="5" class="form-control" name="url" placeholder="Enter links one on each line"></textarea>
				<button type="submit" class="btn btn-primary btn-lg btn-block">
					Bulk Import Links &nbsp;<i class="fa fa-long-arrow-right fa-lg"></i>
				</button>
			</form>
			@if (session()->has('shortenedLinks'))
			  	<div class="panel panel-success">
			  		<div class="panel-heading">
			  			Links Shortened Successfully!
			  		</div>
			  		<div class="panel-body">
			          @foreach (session()->get('shortenedLinks') as $slink)
			              <h4><a href="{{ $slink['hash'] }}">{{ $slink['title'] }}</a></h4>
			              <hr>
			          @endforeach
			  		</div>
			  	</div>
		      </ul>
			@endif
		</div>
	</div>
@endsection
