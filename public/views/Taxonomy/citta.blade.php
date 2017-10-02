@extends('layout')

@section('content')

<section class="section-page presentazione-paesaggistica">
  <!-- TODO prima sezione città - presentazione -->
  <!-- TODO slideshow js e creare il ripetitore-->
  <!-- Ripetitore Slideshow con informazioni sul posto -->

  <header>
    @include('Slideshow.slideshow-citta')
    <h1>{{ $taxonomy->name }}</h1>
  </header>

</section>

<section class="section-page">
  <!-- TODO seconda sezione città - intro e ricerca -->
  <div class="intro-cartina">
    <img scr="#" />
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

  <div>
    <div class="content-col-servizi-città">
      <div class="col-servizi promozione">
        <h2>Promozione</h2>
      </div>
      <div class="col-servizi eventi">
        <h2>Eventi</h2>
      </div>
    </div>
  </div>

  <div class="content-contenuto-servizi">
    <div class="contento-servizio" id="promozione">
      <!-- Card citta rubrica Gusti della terra -->
      <article class="card-citta-rubrica gusti-della-terra">
        <header>
          <h6>Gusti della terra</h6>
          <p>Presentazione rubrica</p>
        </header>
        <div class="content-fast-rubrica">

          <!-- TODO TEMPORANEO TOGLIERE SOLO QUANDO OMAR FA LA MAGIA -->
          <article class="post-13449 post type-post status-publish format-standard has-post-thumbnail hentry category-gusti-della-terra tag-asin tag-clauzetto tag-formadi-salat tag-formaggio tag-formaggio-asino tag-formaggio-salato tag-friuli tag-friuli-venezia-giulia tag-tradizione tag-val-darzino tag-vito-dasio citta-pordenone citta-udine card card-post-standard" data-click-card data-seen data-id="13449"
          data-source='&quot;{\&quot;link\&quot;:\&quot;\&quot;,\&quot;text\&quot;:\&quot;\&quot;}&quot;'
          data-url="http://localhost:8000/loppure/salat-e-asin-la-tradizione-e-salata-in-friuli/"
          style="background-image: url(http://localhost:8000/loppure/wp-content/uploads/2017/07/carnia_malghe-600x400.jpg)" data-image-url="http://localhost:8000/loppure/wp-content/uploads/2017/07/carnia_malghe-600x400.jpg"
          >
          <div class="sfondo">
          <header>
          <span class="text-name-rubrica gusti-della-terra"><a href="">Gusti della terra</a></span>
          <span class="text-name-citta pordenone"><a href="http://localhost:8000/loppure/sezione/pordenone/">Pordenone</a></span>
          </header>
          <div class="content-text">
          <h4><a href="http://localhost:8000/loppure/salat-e-asin-la-tradizione-e-salata-in-friuli/">Sal&acirc;t e As&igrave;n: la tradizione &egrave; salata in Friuli</a></h4>
          </div>

          <footer class="card-footer">
          <button class="button-like-post" data-love="1">1</button>
          </footer>


          </div>

          </article>
        </div>
      </article>

      <!-- Card citta rubrica Voli sul territorio -->
      <article class="card-citta-rubrica voli-sul-territorio">
        <header>
          <h6>Voli sul territorio</h6>
          <p>Presentazione rubrica</p>
        </header>
        <div class="content-fast-rubrica">

        <!-- TODO TEMPORANEO TOGLIERE SOLO QUANDO OMAR FA LA MAGIA -->
        <article class="post-13449 post type-post status-publish format-standard has-post-thumbnail hentry category-gusti-della-terra tag-asin tag-clauzetto tag-formadi-salat tag-formaggio tag-formaggio-asino tag-formaggio-salato tag-friuli tag-friuli-venezia-giulia tag-tradizione tag-val-darzino tag-vito-dasio citta-pordenone citta-udine card card-post-standard" data-click-card data-seen data-id="13449"
        data-source='&quot;{\&quot;link\&quot;:\&quot;\&quot;,\&quot;text\&quot;:\&quot;\&quot;}&quot;'
        data-url="http://localhost:8000/loppure/salat-e-asin-la-tradizione-e-salata-in-friuli/"
        style="background-image: url(http://localhost:8000/loppure/wp-content/uploads/2017/07/carnia_malghe-600x400.jpg)" data-image-url="http://localhost:8000/loppure/wp-content/uploads/2017/07/carnia_malghe-600x400.jpg"
        >
        <div class="sfondo">
        <header>
        <span class="text-name-rubrica gusti-della-terra"><a href="">Gusti della terra</a></span>
        <span class="text-name-citta pordenone"><a href="http://localhost:8000/loppure/sezione/pordenone/">Pordenone</a></span>
        </header>
        <div class="content-text">
        <h4><a href="http://localhost:8000/loppure/salat-e-asin-la-tradizione-e-salata-in-friuli/">Sal&acirc;t e As&igrave;n: la tradizione &egrave; salata in Friuli</a></h4>
        </div>

        <footer class="card-footer">
        <button class="button-like-post" data-love="1">1</button>
        </footer>


        </div>

        </article>

        </div>
      </article>

      <!-- Card citta rubrica Radici nel tempo -->
      <article class="card-citta-rubrica radici-nel-tempo">
        <header>
          <h6>Radici nel tempo</h6>
          <p>Presentazione rubrica</p>
        </header>
        <div class="content-fast-rubrica">
          <!-- TODO TEMPORANEO TOGLIERE SOLO QUANDO OMAR FA LA MAGIA -->
          <article class="post-13449 post type-post status-publish format-standard has-post-thumbnail hentry category-gusti-della-terra tag-asin tag-clauzetto tag-formadi-salat tag-formaggio tag-formaggio-asino tag-formaggio-salato tag-friuli tag-friuli-venezia-giulia tag-tradizione tag-val-darzino tag-vito-dasio citta-pordenone citta-udine card card-post-standard" data-click-card data-seen data-id="13449"
          data-source='&quot;{\&quot;link\&quot;:\&quot;\&quot;,\&quot;text\&quot;:\&quot;\&quot;}&quot;'
          data-url="http://localhost:8000/loppure/salat-e-asin-la-tradizione-e-salata-in-friuli/"
          style="background-image: url(http://localhost:8000/loppure/wp-content/uploads/2017/07/carnia_malghe-600x400.jpg)" data-image-url="http://localhost:8000/loppure/wp-content/uploads/2017/07/carnia_malghe-600x400.jpg"
          >
          <div class="sfondo">
          <header>
          <span class="text-name-rubrica gusti-della-terra"><a href="">Gusti della terra</a></span>
          <span class="text-name-citta pordenone"><a href="http://localhost:8000/loppure/sezione/pordenone/">Pordenone</a></span>
          </header>
          <div class="content-text">
          <h4><a href="http://localhost:8000/loppure/salat-e-asin-la-tradizione-e-salata-in-friuli/">Sal&acirc;t e As&igrave;n: la tradizione &egrave; salata in Friuli</a></h4>
          </div>

          <footer class="card-footer">
          <button class="button-like-post" data-love="1">1</button>
          </footer>


          </div>

          </article>
        </div>
      </article>
    </div>
      <div class="contento-servizio" id="eventi">
        <div class="nessun-evento">
          <h6>Non abbiamo in programma nessun evento</h6>
          <p>Siccome non abbiamo eventi in programma, aiutaci a crearne uno</p>
          <span>Scrivi alla email</span>
          <a>info@loppure.it</a>
        </div>
      </div>
  </div>

</section>

@endsection
