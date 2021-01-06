<div class="row">
	<div class="col-sm-2 col-md-2 preview hidden-xs">
		<img src="{{ $link->image }}" onError="this.onerror=null;this.src='{{ asset('images/preview.jpg') }}';" alt="Website Preview"  class="img-responsive previewImg">
	</div>
	<div class="col-sm-10 col-md-10">
		<a href="{{ url($link->hash) }}"><h3>{{ $link->title }}</h3></a>
		<p>{{ $link->description }}</p>
		{{-- <p><b>Visits:</b> {{ $link->visits }} <b>Hash:</b> {{ $link->hash }}</p> --}}
		<a href="{{ buildUrl($link->url) }}">{{ $link->url }}</a>
		<div class="keywords">
			@foreach($link->keywords as $keyword)
				<span class="label label-warning">{{ $keyword->name }}</span>
			@endforeach
		</div>
		<div class="share-buttons hidden-xs">
			@include('links.share-buttons')
		</div>
	</div>
	<span class='divider'></span>
</div>
