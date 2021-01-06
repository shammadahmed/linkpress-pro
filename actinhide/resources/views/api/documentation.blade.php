@extends('master')

@section('title', 'API Documentation')

@section('content')
	<div class="block">
		<h3>API Documentation</h3>
		<hr>
		<h4>Get Link Details</h4>
		<p>To use the API to get all the details about the link, send a <code>GET</code> request to <a href="{{ url('/') }}">{{ url('/') }}</a>, with a <code>url</code> parameter.</p>
		<h5>Example</h5>
		<p>Here is an example of a <code>GET</code> request to our API with the <code>url</code> parameter.</p>
		<pre>GET {{ url('/') }}/api?url=laravel.com</pre>
		<p>This is the output that our API will return when you query for an url:</p>
		<pre>
{
  id: 113,
  url: "laravel.com",
  hash: "vo8Ao6",
  title: "Laravel - The PHP Framework For Web Artisans",
  description: "Laravel - The PHP framework for web artisans.",
  image: "http://laravel.com//assets/img/laravel-logo.png",
  visits: 1,
  created_at: "2016-01-14 09:06:24",
  updated_at: "2016-01-14 09:22:56"
}
</pre>
<br>
		<h4>Using the API in PHP</h4>
		<p>To use the API in your PHP application, you have to send a <code>GET</code> request through <code>file_get_contents()</code> or cURL: Both are reliable methods. You can see a sample code below using <code>file_get_contents()</code>.</p>
		<pre>
// Using JSON Response

$apiUrl       = {{ url('/') }}/api?url=google.com";
$response     = @json_decode(file_get_contents($api_url), true);

if ($response) {
    echo $response;
}
</pre>
	</div>
@endsection
