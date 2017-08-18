@extends('layout')

@section('content')

<div class="site-content page-standard">
    <header class="header-page">
        <h1 class="title-page">{{ the_title() }}</h1>
    </header>

    <section>
      <div class="content-share-in-city">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna
          aliqua. Ut enim ad minim veniam, quis nostrud exercitation
          ullamco laboris nisi ut aliquip ex ea commodo consequat.
          sunt in culpa qui officia deserunt mollit anim id est laborum.
        <p>
        <div class="share-in-city">
        </div>
      </div>
    </section>
    <section>
      <!-- div per ogni rubrica del territorio -->

      <div>
        <header>
          <h4>Nome della rubrica</h4>
        </header>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
           Ut enim ad minim veniam, quis nostrud exercitation ullamco
           laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <footer>
          <article>
          <!-- Card classica ultimo articolo in merito -->
          <article>
        </footer>
      </div>


    </section>
</div>
@endsection
