@extends('layout')

@section('content')

	<header class="page-header img-header header-category">
		<h1 class="cerchio-logo-page">{{ $category }}</h1>
	</header>

	<section class="page-gray section-category">
		<div class="section-cont-article post-category">
			@if( $posts )
				@include('shared.general_loop')
				
				{{ next_posts_link() }}
				
			@else
				@include('shared.empty')
			@endif
		</div>
	</section>
	
@endsection
