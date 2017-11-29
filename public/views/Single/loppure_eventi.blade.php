@extends('layout')

@section('content')

<article id="post-{{ $post->id }}" data-image="image here" data-id="{{ $post->id }}" {{ post_class() }}>
  <header class="single-header">
    <figure class="single-image" style="background-image: url({{ $post->thumbnail }})">
      <h1 class="entry-title">{{ $post->title }}</h1>
    </figure>
  </header>
  <div class="info-evento">
    <div class="orario">
      <span>ora</span>
    </div>
    <div class="data">
      <span>Data</span>
    </div>
    <div class="indirizzo">
      <span>indirizzo</span>
    </div>
  </div>

  <div class="text-description">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
      nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
      reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
      pariatur. Excepteur sint occaecat cupidatat non proident,
      sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>
  <div class="content-curatore">
    <!-- Evento tenuto da -->
    <article class="card-curatore-evento">
      <header>
        <img src="#" />
        <h4>Nome curatore 1</h4>
      </header>
      <div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
        </p>
      </div>
    </article>
    <article class="card-curatore-evento">
      <header>
        <img src="#" />
        <h4>Nome curatore 2</h4>
      </header>
      <div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
        </p>
      </div>
    </article>
  </div>
  <div class="content-informazioni-rubrica">
    <h5>Nome della rubrica</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
      ulpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>
  <div class="maps-evento">
    <!-- Cartina evento -->
  </div>

  <footer class="content-social">
    @include('Widget/Social/share/index')
  </footer>

</article>

    {{--@include('Single.comments')--}}
@endsection
