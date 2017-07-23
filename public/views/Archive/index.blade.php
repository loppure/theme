@extends('layout')

@section('content')


	<!-- TODO rivedere -->
	<header class="page-header header-author">
			<h1>Archivio</h1>
			<!-- TODO <a class="info" href="#">Informazioni</a> -->
	</header>

	<!-- TODO rivedere -->
	<section class="page-gray section-author">
		<div class="section-cont-article post-archivio" id="section-cont-article">
			@if( $posts )
				@include('shared.general_loop')
			@else
				@include('shared.empty')
			@endif
		</div> <!-- .section-cont-article -->
	</section> <!-- .section-archivio -->

@endsection
