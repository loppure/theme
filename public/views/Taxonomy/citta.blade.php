@extends('layout')

@section('content')

<section class="presentazione-paesaggistica">
  <!-- TODO prima sezione città - presentazione -->
  <!-- TODO slideshow js e creare il ripetitore-->
  <!-- Ripetitore Slideshow con informazioni sul posto -->

  <figure>
    <h1>{{ $taxonomy->name }}</h1>
  </figure>
  <div class="testo-presentazione">
    <h6>Titolo breve pillola</h6>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
       nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
       reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
       pariatur. Excepteur sint occaecat cupidatat non proident,
      sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>
</section>

<section>
  <!-- TODO seconda sezione città - intro e ricerca -->
  <div class="intro-cartina">
    <div class="testo-cartina">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident,
        sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>

  <!-- Ricerca -->
  <div class="ricerca">
  </div>
  <div class="spazio-ricerca">
  </div>
</section>

<section>
  <!-- TODO terza sezione città - ultimi aricoli delle rubriche -->
  <!-- creare un loop che carica 1 article per ogni rubrica e dentro article carichi l'ultimo articolo della rispettiva rubrica -->
  <article>
    <header>
      <h6>Nome della rubrica</h6>
      <p>Presentazione rubrica</p>
    </header>
    <div class="content-fast-rubrica">
    </div>
  </article>
</section>

@endsection
