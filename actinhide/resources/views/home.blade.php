@extends('master')

@section('title', 'Home')
@section('content')
		<?php
$appData = App\App::first();
?>

	@include('partials.shortener')
	</div>
	<div class="links-counter  pseudo pseudo-inverse">
		<div class="block shortener-content">
			<h1 class="text-center">
				<i class="fa fa-link"></i>
				{{ App\Link::all()->count() }}
			</h1>
			<h1 class="text-center shortener-heading">
				Links Shortened Worldwide
			</h1>
		</div>
	</div>
	<div class="jumbotron bgc-success pseudo pseudo-success">
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-9 text-right">
	        <h2>Shorten</h2>
	        <p>
	          Links are long. Shorten and brand the links you share, and keep track of them as they travel across the internet. Share your links across all your marketing channels-including email, SMS, display, social and more-and collect key insights into each channel’s performance and audience.
	          <a href="{{ url('link/create') }}"></a>
	        </p>
	      </div>
	      <div class="col-sm-2 text-center ft-icon"><i class="fa fa-link fa-5x"></i></div>
	    </div>
	  </div>
	</div>
	<div class="jumbotron bgc-danger pseudo pseudo-danger">
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-2 text-center ft-icon"><i class="fa fa-share-alt fa-5x"></i></div>
	      <div class="col-sm-9 text-left">
	        <h2>Share</h2>
	        <p>Optimize your links for all devices using mobile deep links. These links recongnize what device your customers are on and directs them to the right content in your brand’s app or the mobile web, providing the best customer experience every time.</p>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="jumbotron bgc-info pseudo pseudo-info">
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-9 text-right">
	        <h2>Measure</h2>
	        <p>
	          Track individual link analytics, gather audience intelligence and measure campaign performance in one location. Measure and track performance through link analytics. Use these insights to learn what content is popular, where it’s popular and who it’s popular with to improve your marketing efforts.
	        </p>
	      </div>
	      <div class="col-sm-2 text-center ft-icon"><i class="fa fa-pie-chart fa-5x"></i></div>
	    </div>
	  </div>
	</div>
	<div class="row">
		<div class="col-sm-2 col-md-2 hidden-xs">
			<!-- Sidebar -->
	        <nav id="sidebar-wrapper" role="navigation">
	            <ul class="nav sidebar-nav">
	                <li class="sidebar-brand">
	                    <a href="{{ url('links/categories') }}">
	                       Categories
	                    </a>
	                </li>
	                <li>
	                    <a href="#">Explore All</a>
	                </li>
	                <li><a href="{{ url('links/category/Arts') }}"> Arts</a></li>
			        <li><a href="{{ url('links/category/Entertainment') }}"> Entertainment</a></li>
			        <li><a href="{{ url('links/category/Autos') }}">Autos</a></li>
			        <li><a href="{{ url('links/category/Vehicles') }}">Vehicles</a></li>
			        <li><a href="{{ url('links/category/Beauty') }}">Beauty</a></li>
			        <li><a href="{{ url('links/category/Fitness') }}">Fitness</a></li>
			        <li><a href="{{ url('links/category/Books') }}">Books</a></li>
			        <li><a href="{{ url('links/category/Literature') }}">Literature</a></li>
			        <li><a href="{{ url('links/category/Business') }}">Business</a></li>
			        <li><a href="{{ url('links/category/Industry') }}">Industry</a></li>
			        <li><a href="{{ url('links/category/Career') }}">Career</a></li>
			        <li><a href="{{ url('links/category/Education') }}">Education</a></li>
			        <li><a href="{{ url('links/category/Computer') }}">Computer</a></li>
			        <li><a href="{{ url('links/category/Electronics') }}">Electronics</a></li>
			        <li><a href="{{ url('links/category/Finance') }}">Finance</a></li>
			        <li><a href="{{ url('links/category/Food') }}">Food</a></li>
			        <li><a href="{{ url('links/category/Drink') }}">Drink</a></li>
			        <li><a href="{{ url('links/category/Gambling') }}">Gambling</a></li>
			        <li><a href="{{ url('links/category/Games') }}">Games</a></li>
			        <li><a href="{{ url('links/category/Health') }}">Health</a></li>
			        <li><a href="{{ url('links/category/Home') }}">Home</a></li>
			        <li><a href="{{ url('links/category/Garden') }}">Garden</a></li>
			        <li><a href="{{ url('links/category/Internet') }}">Internet</a></li>
			        <li><a href="{{ url('links/category/Telecom') }}">Telecom</a></li>
			        <li><a href="{{ url('links/category/Law') }}">Law</a></li>
			        <li><a href="{{ url('links/category/Government') }}">Government</a></li>
			        <li><a href="{{ url('links/category/Law') }}">Law</a></li>
			        <li><a href="{{ url('links/category/News') }}">News</a></li>
			        <li><a href="{{ url('links/category/Media') }}">Media</a></li>
			        <li><a href="{{ url('links/category/People') }}">People</a></li>
			        <li><a href="{{ url('links/category/Society') }}">Society</a></li>
			        <li><a href="{{ url('links/category/Pets') }}">Pets</a></li>
			        <li><a href="{{ url('links/category/Animals') }}">Animals</a></li>
			        <li><a href="{{ url('links/category/Recreation') }}">Recreation</a></li>
			        <li><a href="{{ url('links/category/Hobbies') }}">Hobbies</a></li>
			        <li><a href="{{ url('links/category/Reference') }}">Reference</a></li>
			        <li><a href="{{ url('links/category/Science') }}">Science</a></li>
			        <li><a href="{{ url('links/category/Shopping') }}">Shopping</a></li>
			        <li><a href="{{ url('links/category/Sports') }}">Sports</a></li>
			        <li><a href="{{ url('links/category/Travel') }}">Travel</a></li>
	            </ul>
	        </nav>
	        <!-- /#sidebar-wrapper -->
		</div>
		<div class="col-sm-5 col-md-5">
			<div class="home-wrapper">
				@include('partials.links')
			</div>
		</div>
		<div class="col-sm-5">
			<div class="large-skyscrapper-ad">
				{!! $addData->ad !!}
			</div>
			<div class="large-skyscrapper-ad">
				{!! $addData->ad !!}
			</div>
		</div>
	</div>
@endsection
