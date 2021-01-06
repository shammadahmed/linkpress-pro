<nav class="navbar yamm navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}"><h3 class="logo">{{ $appData->name }}</h3></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active visible-lg"><a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
        {{-- <li class="visible-lg"><a href="{{ url('links/import') }}">Bulk Import</a></li>
        <li class="visible-lg"><a href="{{ url('api/documentation') }}">API</a></li> --}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Link <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Share</li>
            <li><a href="{{ url('link/create') }}">Shorten Link</a></li>
            <li><a href="{{ url('links/import') }}">Bulk Import</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Explore</li>
            <li><a href="{{ url('links/top') }}">Top 10 Links</a></li>
            <li><a href="{{ url('links/categories') }}">Categories</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Developers</li>
            <li><a href="{{ url('api/documentation') }}">API documentation</a></li>
          </ul>
        </li>
        <li class="dropdown visible-md visible-lg">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('links/categories') }}">Explore All</a></li>
            <li role="separator" class="divider"></li>
            <div class="yamm-content">
				<div class="row">
					<div class="col-md-3">
				        <h4><a href="{{ url('links/category/Arts') }}"> Arts</a></h4>
				        <h4><a href="{{ url('links/category/Entertainment') }}"> Entertainment</a></h4>
				        <h4><a href="{{ url('links/category/Autos') }}">Autos</a></h4>
				        <h4><a href="{{ url('links/category/Vehicles') }}">Vehicles</a></h4>
				        <h4><a href="{{ url('links/category/Beauty') }}">Beauty</a></h4>
				        <h4><a href="{{ url('links/category/Fitness') }}">Fitness</a></h4>
				        <h4><a href="{{ url('links/category/Books') }}">Books</a></h4>
				        <h4><a href="{{ url('links/category/Literature') }}">Literature</a></h4>
				        <h4><a href="{{ url('links/category/Business') }}">Business</a></h4>
				        <h4><a href="{{ url('links/category/Industry') }}">Industry</a></h4>
					</div>
					<div class="col-md-3">
				        <h4><a href="{{ url('links/category/Career') }}">Career</a></h4>
				        <h4><a href="{{ url('links/category/Education') }}">Education</a></h4>
				        <h4><a href="{{ url('links/category/Computer') }}">Computer</a></h4>
				        <h4><a href="{{ url('links/category/Electronics') }}">Electronics</a></h4>
				        <h4><a href="{{ url('links/category/Finance') }}">Finance</a></h4>
				        <h4><a href="{{ url('links/category/Food') }}">Food</a></h4>
				        <h4><a href="{{ url('links/category/Drink') }}">Drink</a></h4>
				        <h4><a href="{{ url('links/category/Gambling') }}">Gambling</a></h4>
				        <h4><a href="{{ url('links/category/Games') }}">Games</a></h4>
				        <h4><a href="{{ url('links/category/Health') }}">Health</a></h4>
				    </div>
				    <div class="col-md-3">
				        <h4><a href="{{ url('links/category/Home') }}">Home</a></h4>
				        <h4><a href="{{ url('links/category/Garden') }}">Garden</a></h4>
				        <h4><a href="{{ url('links/category/Internet') }}">Internet</a></h4>
				        <h4><a href="{{ url('links/category/Telecom') }}">Telecom</a></h4>
				        <h4><a href="{{ url('links/category/Law') }}">Law</a></h4>
				        <h4><a href="{{ url('links/category/Government') }}">Government</a></h4>
				        <h4><a href="{{ url('links/category/Law') }}">Law</a></h4>
				        <h4><a href="{{ url('links/category/News') }}">News</a></h4>
				        <h4><a href="{{ url('links/category/Media') }}">Media</a></h4>
				        <h4><a href="{{ url('links/category/People') }}">People</a></h4>
					</div>
					<div class="col-md-3">
				        <h4><a href="{{ url('links/category/Society') }}">Society</a></h4>
				        <h4><a href="{{ url('links/category/Pets') }}">Pets</a></h4>
				        <h4><a href="{{ url('links/category/Animals') }}">Animals</a></h4>
				        <h4><a href="{{ url('links/category/Recreation') }}">Recreation</a></h4>
				        <h4><a href="{{ url('links/category/Hobbies') }}">Hobbies</a></h4>
				        <h4><a href="{{ url('links/category/Reference') }}">Reference</a></h4>
				        <h4><a href="{{ url('links/category/Science') }}">Science</a></h4>
				        <h4><a href="{{ url('links/category/Shopping') }}">Shopping</a></h4>
				        <h4><a href="{{ url('links/category/Sports') }}">Sports</a></h4>
				        <h4><a href="{{ url('links/category/Travel') }}">Travel</a></h4>
					</div>
				</div>
			</div>
          </ul>
        </li>
      </ul>
      <form method="GET" action="{{ url('link/search') }}" class="navbar-form navbar-left" role="search">
        <div class="input-group">
          <input name="q" value="{{ old('q') }}" type="text" class="form-control" placeholder="Search Links">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if(!empty($sLink))
          <a href="{{ buildUrl($sLink->url) }}" class="btn btn-danger link hidden-xs">
            <i class="fa fa-external-link"></i>
            <b class="link-text">Continue to site</b>
          </a>
        @else
          <li class="visible-lg"><a href="{{ url('links/top') }}" class="btn btn-lg">Top Links</a></li>
          <a href="{{ url('links') }}" class="btn btn-primary navbar-btn link">Explore The Directory</a>
        @endif
      </ul>
    </div>
  </div>
</nav>
