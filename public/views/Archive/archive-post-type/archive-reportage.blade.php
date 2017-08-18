@extends('layout')

@section('content')

	<header>
		<h1>Reportage</h1>
	</header>

	<section>
		<!--TODO prima sezione archive reportage - loop post type Reportage -->
		@if( $posts )
			@include('shared.general_loop')
		@else
			@include('shared.empty')
		@endif
	</section>

@endsection
