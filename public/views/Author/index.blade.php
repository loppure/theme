@extends('layout')

@section('content')

	<header class="page-header">
		{{ $author->thumb }}
		<h1>{{ $author->name }}</h1>
		<p class="author-bio">{{ $author->bio }}</p>
	</header>

	<section class="page-gray section-category">
		<div class="section-cont-article post-category">
			@if( $posts )

				@include('shared.general_loop')

				{{ the_posts_navigation() }}

			@else

				@include('shared.empty')

			@endif
		</div>
	</section>

@endsection
