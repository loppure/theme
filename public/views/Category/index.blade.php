@extends('layout')

@section('content')

    <header class="page-header header-category">
        <h1>{{ $category }}</h1>
        <!-- TODO <a class="info" href="#">Informazioni</a> -->
    </header>


    <section class="page-gray page-category">

        <div class="widget-sx" role="complementary">
    <?php
    // TODO: temporary
    (new Loppure\Component\Widgets\TimelineWidget())->widget('', '');
    ?>
                {{-- @include('Widget/Sostienici/index') --}}

             {{--{{ dynamic_sidebar('sidebar-sx') }}--}}
        </div>

        <div class="section-cont-article post-category">
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
                @include('Widget/Rubriche/Citta/index')
                @include('Widget/Rubriche/Porta-citta/index')

                {{--{{ dynamic_sidebar('sidebar-dx') }}--}}
        </div>
    </section>

@endsection
