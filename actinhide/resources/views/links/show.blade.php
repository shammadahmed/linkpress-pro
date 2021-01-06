@extends('master')

@section('title', "$sLink->title")

@section('content')
	<?php
$appData = App\App::first();
?>
	<div class="cos hidden-sm hidden-md hidden-lg">
		<b>
			<a href="{{ url($sLink->url) }}">
				<i class="fa fa-external-link"></i>
				<span class="link-text">
					Continue To Site
				</span>
			</a>
		</b>
	</div>
	<!-- Nav tabs -->
	<ul class="nav nav-justified linksTab" role="tablist">
	  <li role="presentation" class="active">
	  	<a href="#meta" aria-controls="meta"ole="tab" data-toggle="tab">
	  		<i class="fa fa-code"></i>
	  		<span class="link-text">Meta</span>
	  	</a>
	  </li>
	  <li role="presentation">
	  	<a href="#whois" aria-controls="whois" role="tab" data-toggle="tab">
	  		<i class="fa fa-info"></i>
	  		<span class="link-text">Whois</span>
	  	</a>
	  </li>
	  <li role="presentation">
	  	<a href="#statistics" aria-controls="statistics" role="tab" data-toggle="tab">
	  		<i class="fa fa-pie-chart"></i>
	  		<span class="link-text">Stats</span>
	  	</a>
	  </li>
	</ul>
	<div class="block">
		<div class="linkBlock">
			<div class="tab-content">
			  <div role="tabpanel" class="tab-pane fade in active" id="meta">
			  	<div class="row arow">
					<div class="col-md-2 preview hidden-xs">
						<img src="{{ $sLink->image }}" onError="this.onerror=null;this.src='{{ asset('images/preview.jpg') }}';" alt="Website Preview"  class="previewImg">
					</div>
					<div class="col-md-10">
						<a href="{{ url($sLink->hash) }}"><h3>{{ $sLink->title }}</h3></a>
						<form method="POST" class="ajax" action="{{ url('favorites/' . $sLink->id) }}" accept-charset="UTF-8">
						    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
							{!! csrf_field() !!}
							{{ method_field('PUT') }}
							<div id="stars" class="starrr"></div>
						</form>
						<p>{{ $sLink->description }}</p>
						<a href="{{ buildUrl($sLink->url) }}">
							{{ $sLink->url }}
						</a>
						<div class="keywords">
							@foreach($sLink->keywords as $keyword)
								<span class="label label-warning">{{ $keyword->name }}</span>
							@endforeach
						</div>
						<div class="share-buttons hidden-xs">
							@include('links.share-buttons-show')
						</div>
					</div>
				</div>

			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="whois">
			  	  <h3>Whois data for {{ $sLink->domain }}</h3>
				  <div class="whois-loader">
					  <h4>Loding...</h4>
					  <img src="{{ asset('images/loader.gif') }}" id="loader">
				  </div>
				  <p class="whois-info"></p>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="statistics">
				  <h3>Stats for {{ $sLink->domain }}</h3>
				  <div class="stats">
				  	@include('partials.stats')
				  </div>
				  @include('partials.alexa')
			  </div>
 			</div>
		</div>
		<span class='divider'></span>
		<div>
			{!! $appData->ad !!}
		</div>
		@include('partials.comments')
	</div>
@endsection

@section('js')
	@include('partials.favoriteJS')
	<script>
		(function($, window) {
			$.ajax({
			    type: "GET",
			    url: "{{ url('whois') }}",
			    data: { domain: "{{ $sLink->domain }}" },
			    success: function(data) {
			    	$('.whois-loader').hide();
				    $.each(data, function(int, val) {
				    	$('p.whois-info').append(
				    		$('p.whois-info').append(document.createTextNode(val)).append('<br>')
				    	);
					});
			    },
		        error: function(jqXHR,error, errorThrown) {
		            if(jqXHR.status&&jqXHR.status==400){
				    	$('p.whois-info').text(jqXHR.responseText);
				    	console.log(jqXHR.responseText);
		            }else{
				    	$('p.whois-info').text(jqXHR.responseText);
				    	console.log(jqXHR.responseText);
		            }
		        }
			},"json");
		})(window.jQuery, window);
	</script>
@endsection