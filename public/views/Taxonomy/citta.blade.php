@extends('layout')

@section('content')

    <header class="header-taxonomy-citta">
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

    <section class="page-gray content-post-citta">
        <div class="widget-sx" role="complementary">
            @include('Widget/Tax-citta/Timeline/index')
            @include('Widget/Tax-citta/Sostienici/index')

            {{--{{ dynamic_sidebar('sidebar-sx') }} --}}
        </div>

        <div class="section-cont-article" id="section-cont-article">
          @if( $posts )
              @include('shared.general_loop')

              {{ next_posts_link() }}
          @else
              @include('shared.empty')
          @endif
        </div>

        <div class="widget-dx" role="complementary">
            @include('Widget/Tax-citta/Categorie/index')
            @include('Widget/Tax-citta/Porta-citta/index')

            {{--{{ dynamic_sidebar('sidebar-dx') }} --}}
        </div>
    </section>

    <section class="altre-citta">
        @include('Widget/Tax-citta/Citta/index')
    </section>
@endsection
