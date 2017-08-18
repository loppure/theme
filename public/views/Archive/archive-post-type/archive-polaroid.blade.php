@extends('layout')

@section('content')

<header>
	<h1>Polaroid</h1>
</header>

<section>
	<!--TODO prima sezione archive polaroid - loop post type Polaroid -->
	@if( $posts )
		@include('shared.general_loop')
	@else
		@include('shared.empty')
	@endif
</section>

@endsection
