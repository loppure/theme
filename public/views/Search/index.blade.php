@extends('layout')

@section('content')

	@if( $authors )
		
		<h3>Autori</h3>

		@foreach( $authors as $author )

			<article class="byline vcard">
				<header>
					{{ $author->thumb }}
					<h3><a href="{{ $author->url }}" rel="author">{{ $author->name }}</a></h3>
				</header>
				<section>
					<p>{{ $author->bio }}</p>
				</section>
				<footer>
					<p><a href="{{ $author->url }}" rel="author">Leggi i suoi articoli</a></p>
				</footer>
			</article>
			
		@endforeach
		
	@endif

	@if( $posts )
		@include('shared.general_loop')

		{{-- the_posts_navigator() --}}

	@else
		@include('shared.empty')
	@endif
	
@endsection
