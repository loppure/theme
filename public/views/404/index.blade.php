@extends('layout')

@section('content')

	<h1>Yeeeeee 404</h1>
	<p>Index</p>
	<p> -- <em>Blade rocks</em></p>


	@if( $posts )
		@include('shared.general_loop')
	@else
		<p>No posts</p>
	@endif

@endsection
