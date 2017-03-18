@extends('layout')

@section('content')

	  <header>
		    @if( $taxonomy->cover )
			      <div class="img-header" style="background-image: url({{ $taxonomy->cover }}"></div>
		    @else
			      <div class="img-header"></div>
		    @endif

		    <div class="barra-nome-pagina">
			      <h1>{{ $taxonomy->name }}</h1>
		    </div>

		    <div class="cerchio-logo-page"></div>
		    
	  </header>

	  <section class="page-gray">
		    <div class="widget-area" role="complementary">
			      {{ dynamic_sidebar('sidebar-dx') }}
		    </div>

		    <div class="section-cont-article" id="section-cont-article">
			      @if( $posts )
				        @include('shared.general_loop')

				        {{ next_posts_link() }}
			      @else
				        @include('shared.empty')
			      @endif
		    </div>

		    <div class="widget-area" role="complementary">
			      <?php dynamic_sidebar('sidebar-sx') ?>
		    </div>
	  </section>
@endsection
