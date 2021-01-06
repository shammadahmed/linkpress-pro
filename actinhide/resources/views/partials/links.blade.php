<div class="block">
	<h3>@yield('heading', 'Recently Shared Links')</h3>
	<hr>
	<?php
$count = 1;
?>
	@if($links->first())
		@foreach($links as $link)
			@include('partials.link')
			@if($count % 2 == 0 && $count > 0)
		        {!! $appData->ad !!}
		    @endif
		    <?php $count++;?>
		@endforeach
	@else
		<p>Nothing to show here til yet.</p>
	@endif
</div>
