@extends('layout')

@section('content')

  <section class="section-page">

    <!-- TODO primo sezione home -->
    <!-- Questo contine il menu di navigazione - Payoff - Input di ricerca -->
    <div class="control-home">
      @include('ControlNavigation.controlnavigation')
    </div>

    @include('Slideshow.slideshow-home')
  </section>

  <section class="section-page section-ricerca">
    <!-- TODO seconda sezione home -->
    <!-- Questa parte compare solo quando avviene la ricerca -->
    <div class="content-ricerca">
      @include('shared.searchform')
    </div>
    <div class="content-risultati-ricerca">
      <!-- TODO stampare i risultati di ricerca -->
    </div>
  </section>

  <section class="section-page loop-article">
    <!-- TODO terza sezione home -->
    <!-- Questa parte contiene il loop della home -->

    <div class="block-sinistra" role="complementary">
      @include('Widget/Home/HomeBlockSinistra/index')
    </div>

    <div class="block-centrale">

        @if( $posts )
            @include('shared.general_loop', ['show_city' => true])

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

    <div class="block-destra" role="complementary">
        @include('Widget/Home/HomeBlockDestra/index')
    </div>

  </section>

@endsection
