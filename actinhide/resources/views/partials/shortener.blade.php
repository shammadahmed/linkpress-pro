</div>
<div class="shortener pseudo pseudo-primary">
	<div class="block shortener-content">
		<h1 class="text-center shortener-heading">Unleash the power of link</h1>
		<p class="text-center shortener-paragraph hidden-xs">
			The link connects your marketing efforts to how and where your customers experience your brand. Are you getting the most out of it?
		</p>
		@include('partials.errors')
		<form action="{{ route('link.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" name="url" id="url" placeholder="Paste a link to shorten it" class=" form-control input-lg">
				<div class="input-group-btn">
					<button type="submit" class=" btn btn-lg btn-primary" style="width:70px">
						<i class="fa fa-long-arrow-right fa-lg"></i>
					</button>
						<i class="fa fa-long-arrow-right fa-lg"></i>
					</button>
				</div>
			</div>
			<input type="text" name="hash" id="hash" placeholder="(Optional) Link alias" class="form-control input-md">
		</form>
	</div>
</div>
<div class="wrapper">
