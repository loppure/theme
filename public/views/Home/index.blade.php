@extends('layout')

@section('content')

	  <header class="page-header home-header">
        <div class="wrapper-categories">
            <div class="category-box friuli-eat"></div>
            <div class="category-box cultura"></div>
            <div class="category-box a-parole-nostre"></div>
            <div class="category-box voli-sul-territorio"></div>
            <div class="category-box radici-nel-tempo"></div>
            <div class="category-box book-life"></div>
            <div class="category-box pausa-caffe"></div>
            <div class="category-box eventi"></div>
        </div>
        <div class="barra-nome-pagina home">
            <div class="logo-barra-home"></div>
            <div class="logo-barra-home"></div>
            <div class="logo-barra-home"></div>
        </div>
    </header>

    <section class="page-gray home-section">
        <div class="widget-area" role="complementary">
			      <?php dynamic_sidebar('sidebar-dx') ?>
		    </div>
        
        <div class="section-cont-article">
	          @if( $posts )
		            @include('shared.general_loop', ['show_city' => true])

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
