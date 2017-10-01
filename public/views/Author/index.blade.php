@extends('layout')

@section('content')

	<header class="header-author">
		<img src="#" />
		<h1>{{ $author->name }}</h1>
		<p class="author-bio">{{ $author->bio }}</p>
	</header>

	<section class="section-page loop-article">
	  <!-- TODO seconda sezione rubrica - loop Rubrica -->
	  <div class="block-sinistra">
	  @include('Widget/Home/HomeBlockSinistra/index')
	  </div>

	  <div class="block-destra">
	    @if( $posts )
	        @include('shared.general_loop')


	    @else
	        @include('shared.empty')
	    @endif

	    <div class="content-button">
	      <button class="load-more" id="load-more">Carica altro</button>
	    </div>
	    <div class="link_to_next_page" hidden>
	        <?php next_posts_link(); ?>
	    </div>
	  </div>

	</section>

@endsection
