@extends('layout')

@section('content')

    <header class="page-header home-header">
        <nav class="wrapper-box wrapper-categories">
            <a href="{{ esc_url( home_url( '/rubriche' )) }}/gusti-della-terra" class="box-rettangolo-4 gusti-della-terra">
                <span class="img"></span>
                <span>Gusti della Terra</span>
            </a>
            <a href="{{ esc_url( home_url( '/rubriche' )) }}/voli-sul-territorio" class="box-rettangolo-4 voli-sul-territorio">
                <span class="img"></span>
                <span>Voli sul territorio</span>
            </a>
            <a href="{{ esc_url( home_url( '/rubriche' )) }}/radici-nel-tempo" class="box-rettangolo-4 radici-nel-tempo">
                <span class="img"></span>
                <span>Radici nel tempo</span>
            </a>
            <div class="box-rettangolo-4 parole-nostre prossimamente">
                <span class="date">Prossimamente</span>
                <a href="{{ esc_url( home_url( '/' )) }}/prossimamente"> A parole nostre </a>
            </div>
            <a href="{{ esc_url( home_url( '/rubriche' )) }}/gusti-della-terra" class="box-rettangolo-4 pausa-caffe">
                <span class="img"></span>
                <span>Pausa caffè</span>
            </a>
            <a href="{{ esc_url( home_url( '/rubriche' )) }}/pensieri-tra-le-pagine" class="box-rettangolo-4 pensieri-tra-le-pagine">
                <span class="img"></span>
                <span>Pensieri tra le pagine</span>
            </a>
            <div class="box-rettangolo-4 reportage prossimamente">
                <span class="date">Prossimamente</span>
                <a href="{{ esc_url( home_url( '/' )) }}/prossimamente"> Reportage </a>
            </div>
            <div class="box-rettangolo-4 progetti prossimamente">
                <span class="date">Prossimamente</span>
                <a href="{{ esc_url( home_url( '/' )) }}/prossimamente"> Progetti </a>
            </div>
        </nav>
    </header>

    <section class="page-gray home-section">
        <div class="widget-sx" role="complementary">
            @include('Widget/Home/Timeline/index')
            {{-- @include('Widget/Sostienici/index') --}}

            {{--{{ dynamic_sidebar('sidebar-sx') }}--}}
        </div>
        <div id="container"></div>
        <div class="widget-area" role="complementary">
            {{--{{ dynamic_sidebar('sidebar-dx') }}--}}
        </div>

        <div class="section-cont-article">
            @if( $posts )
                @include('shared.general_loop', ['show_city' => true])

                {{ next_posts_link() }}
            @else
                @include('shared.empty')
            @endif
        </div>

        <div class="widget-dx" role="complementary">
            @include('Widget/Home/Citta/index')
            @include('Widget/Home/Porta-citta/index')

            {{--{{ dynamic_sidebar('sidebar-dx') }}--}}
        </div>

    </section>

@endsection
