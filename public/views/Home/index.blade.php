@extends('layout')

@section('content')

    <header class="page-header home-header">
      @include('ControlNavigation.controlnavigation')
    </header>

    <section class="content-page">
      <div class="payoff-home">
        <h3>Uno sguardo sulla tua città ovvunque tu ti trovi</h3>
        <!-- TODO inserire logo istituzionale -->
      </div>
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
