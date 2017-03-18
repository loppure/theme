@extends('layout')

@section('content')

	  <header class="page-header home-header">
        <div class="wrapper-box wrapper-categories">
            <div class="box-rettangolo-4 gusti-della-terra">
							<a href="#"> Gusti della Terra </a>
						</div>
            <div class="box-rettangolo-4 voli-sul-territorio">
							<a href="#"> Voli sul territorio </a>
						</div>
            <div class="box-rettangolo-4 radici-nel-tempo">
							<a href="#"> Radici nel tempo</a>
						</div>
            <div class="box-rettangolo-4 pensieri-tra-le-pagine">
							<a href="#"> Pensieri tra le pagine </a>
						</div>
            <div class="box-rettangolo-4 pausa-caffe">
							<a href="#"> Pausa caffè </a>
						</div>
						<div class="box-rettangolo-4 parole-nostre">
							<span class="date">Prossimamente</span>
							<a href="#"> A parole nostre </a>
						</div>
						<div class="box-rettangolo-4 reportage">
							<span class="date">Prossimamente</span>
							<a href="#"> Reportage </a>
						</div>
            <div class="box-rettangolo-4 progetti">
							<span class="date">Prossimamente</span>
							<a href="#"> Progetti </a>
						</div>
        </div>
    </header>

    <section class="page-gray home-section">
        <div class="widget-sx" role="complementary">
						@include('Widget/Timeline/index')
						{{-- @include('Widget/Sostienici/index') --}}

			     {{--{{ dynamic_sidebar('sidebar-sx') }}--}}
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
						@include('Widget/Citta/index')
						@include('Widget/Porta-citta/index')

						{{--{{ dynamic_sidebar('sidebar-dx') }}--}}
		    </div>

    </section>

@endsection
