@extends('layout')

@section('content')

<section>
	<!--TODO prima sezione archive team - introduzione -->
	<h1>Polaroid</h1>

</section>

<section>
	<!--TODO seconda sezione archive team - loop post type Team -->
	@if( $posts )
		@include('shared.general_loop')
	@else
		@include('shared.empty')
	@endif
</section>

<section>
	<!--TODO terza sezione archive team - entra far parte de L'oppure -->
</section>

@endsection
