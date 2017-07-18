@extends('layout')

@section('content')

    <header class="page-header home-header">
        <nav class="wrapper-box wrapper-categories">
          <ul>
            <li class="box-rettangolo-4 gusti-della-terra">
              <a href="{{ esc_url( home_url( '/rubriche' )) }}/gusti-della-terra">
                Gusti della Terra
              </a>
            </li>
            <li class="box-rettangolo-4 voli-sul-territorio">
              <a href="{{ esc_url( home_url( '/rubriche' )) }}/voli-sul-territorio">
                Voli sul territorio
              </a>
            </li>
            <li class="box-rettangolo-4 radici-nel-tempo">
              <a href="{{ esc_url( home_url( '/rubriche' )) }}/radici-nel-tempo">
                Radici nel tempo
              </a>
            </li>
            <li class="box-rettangolo-4 parole-nostre prossimamente">
              <a href="{{ esc_url( home_url( '/' )) }}/prossimamente">
                A parole nostre
              </a>
            </li>
            <li class="box-rettangolo-4 pausa-caffe">
              <a href="{{ esc_url( home_url( '/rubriche' )) }}/gusti-della-terra">
                Pausa caffè
              </a>
            </li>
            <li class="box-rettangolo-4 pensieri-tra-le-pagine">
              <a href="{{ esc_url( home_url( '/rubriche' )) }}/pensieri-tra-le-pagine">
                Pensieri tra le pagine
              </a>
            </li>
            <li class="box-rettangolo-4 reportage prossimamente">
              <a href="{{ esc_url( home_url( '/' )) }}/prossimamente">
                Reportage
              </a>
            </li>
            <li class="box-rettangolo-4 progetti prossimamente">
              <a href="{{ esc_url( home_url( '/' )) }}/prossimamente">
                Progetti
              </a>
            </li>
          </ul>
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
