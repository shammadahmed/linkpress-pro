<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $link->description or $appData->description }}">
    <meta name="keywords" content="@if(isset($link->keywords) AND !empty($link->keywords->toArray())){{ trim(implode($link->keywords->lists('name')->toArray(), ',')) }}@else{{ trim($appData->description) }} @endif">
    <title>
      @yield('title') | {{ $appData->name }}
    </title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">


<!--     <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/yamm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rrssb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stats.css') }}"> -->

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @include('partials.navbar')
{{--         <div class="block banner-ad">
          {!! $appData->ad !!}
        </div> --}}
    <div class="wrapper">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.min.js') }}"></script>
    @yield('js')
  </body>
</html>
