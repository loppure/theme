@extends('layout')

@section('content')

<section>
  <!-- TODO prima sezione reportage - presentazione -->
</section>
<section>
  <!-- TODO seconda sezione reportage - loop TERM reportage -->
</section>
<section>
  <!-- TODO terza sezione reportage - loop costum post type reportage -->
</section>

    <header class="header-taxonomy-progetti">
        @if( $taxonomy->cover )
            <figure style="background-image: url({{ $taxonomy->cover }}">
              <h1>{{ $taxonomy->name }}</h1>
            </figure>
        @else
            <div class="img-header">
              <h1>{{ $taxonomy->name }}</h1>
            </div>
        @endif

    </header>

    <section class="site-content content-post-citta">
        <div class="widget-sx" role="complementary">
    <?php
    // TODO: temporary
    (new Loppure\Component\Widgets\TimelineWidget())->widget('', '');
    ?>

            {{--{{ dynamic_sidebar('sidebar-sx') }} --}}
        </div>

        <div class="section-cont-article" id="section-cont-article">
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

        <div class="widget-dx" role="complementary">
            @include('Widget/Tax-citta/Categorie/index')
            @include('Widget/Tax-citta/Porta-citta/index')

            {{--{{ dynamic_sidebar('sidebar-dx') }} --}}
        </div>
    </section>

    <!-- TODO <section class="altre-citta">
        {{--@include('Widget/Tax-citta/Citta/index')--}}
    </section> -->
@endsection
