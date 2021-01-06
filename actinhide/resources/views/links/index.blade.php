@extends('master')

@section('title', 'The Links Directory')
@section('heading')
	The Links Directory
@endsection

@section('content')
</div>
<div class="banner-ad">
	{!! $appData->ad !!}
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
				<div class="block">
					{!! $links->render() !!}
				</div>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="large-skyscrapper-ad">
				{!! $appData->ad !!}
			</div>
			<div class="large-skyscrapper-ad">
				{!! $appData->ad !!}
			</div>
		</div>
	</div>
@endsection
