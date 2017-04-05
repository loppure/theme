@extends('layout')

@section('content')

	<header class="page-header">
		<section>
			<h1 class="cerchio-logo-page icon-archive">Archivio</h1>
		</section>
	</header> <!-- .page-header -->
	
	<section class="page-gray section-archivio">
		<div class="section-cont-article post-archivio" id="section-cont-article">
			@if( $posts )
				@include('shared.general_loop')
			@else
				@include('shared.empty')
			@endif
		</div> <!-- .section-cont-article -->
	</section> <!-- .section-archivio -->
	
@endsection
