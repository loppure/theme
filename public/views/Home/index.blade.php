@extends('layout')

@section('content')

  <section class="section-page">

    <!-- TODO primo sezione home -->
    <!-- Questo contine il menu di navigazione - Payoff - Input di ricerca -->
    <div class="section-blur">
      <div class="radian-blur"></div>
    </div>
    <div class="control-home">
      @include('ControlNavigation.controlnavigation')
    </div>
    <div class="payoff-home">
      <h3>Uno sguardo sulla tua città ovvunque tu ti trovi</h3>
      <!-- TODO inserire logo istituzionale -->
    </div>

  </section>

  <section class="section-page ricerca">
    <!-- TODO seconda sezione home -->
    <!-- Questa parte compare solo quando avviene la ricerca -->
    <div class="ricerca-home">
      <!-- TODO aggiungere comandi di ricerca -->
    </div>
    <div class="content-risultati-ricerca-home">
      <!-- TODO stampare i risultati di ricerca -->
    </div>
  </section>

  <section class="section-home">
    <!-- TODO terza sezione home -->
    <!-- Questa parte contiene il loop della home -->

    <div class="block-sinistra" role="complementary">
      @include('Widget/Home/HomeBlockSinistra/index')
    </div>

    <div class="bock-centrale">

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
