@extends('layout')

@section('content')

  <!-- TODO prima sezione rubrica - Presentazione della rubrica -->
<header class="header-category">
  <div class="immagine-categoria">
    <img src="#" />
  </div>
  <div class="descrizione-categoria">
    <h1>{{ $category }}</h1>
    <!-- stampa descrizione della rubrica -->
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
       nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident,
      sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>
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
