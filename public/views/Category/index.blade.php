@extends('layout')

@section('content')

	<header class="page-header header-category">
		<h1>{{ $category }}</h1>
		<!-- TODO <a class="info" href="#">Informazioni</a> -->
	</header>

	<section class="page-gray page-category">

		<div class="widget-sx" role="complementary">
				@include('Widget/Rubriche/Timeline/index')
				{{-- @include('Widget/Sostienici/index') --}}

			 {{--{{ dynamic_sidebar('sidebar-sx') }}--}}
		</div>

		<div class="section-cont-article post-category">
			@if( $posts )
				@include('shared.general_loop')

				{{ next_posts_link() }}

			@else
				@include('shared.empty')
			@endif
		</div>
		<div class="widget-dx" role="complementary">
				@include('Widget/Rubriche/Citta/index')
				@include('Widget/Rubriche/Porta-citta/index')

				{{--{{ dynamic_sidebar('sidebar-dx') }}--}}
		</div>
	</section>

@endsection
