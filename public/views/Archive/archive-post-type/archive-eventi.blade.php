@extends('layout')

@section('content')

	<header>
		<h1>Eventi</h1>
	</header>

	<section>
		<h3>Prossimi eventi</h3>
	</section>
	<section>
		<h3>Eventi passati</h3>
	</section>

	<section>
		<!--TODO prima sezione archive reportage - loop post type Reportage -->
		@if( $posts )
			@include('shared.general_loop')
		@else
			@include('shared.empty')
		@endif
	</section>

@endsection
