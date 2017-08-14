@extends('layout')

@section('content')

<article id="post-{{ $post->id }}" data-image="image here" data-id="{{ $post->id }}" {{ post_class() }} class="single-post-standard">
  <header class="single-header">
    <div class="content-title">
      <h1 class="entry-title">{{ $post->title }}</h1>
    </div>
    <figure class="single-image" style="background-image: url({{ $post->thumbnail }})"></figure>
  </header>
    <div class="content-single">
      <div class="content-text">
        <div class="text">
          {{ $post->content }}
        </div>
        <div class="content-fonti">
            <h6>Fonti:</h6>
            <span>Foto:</span>
            <span>Informazioni presa da:</span>
        </div>
      </div> <!-- .text -->

        @include('Widget/Social/share/index')

      <div class="content-author-single">
        <div class="author-single">
            {{ $author->thumb }}
            <h4>{{ the_author_posts_link() }}</h4>
            <p class="author-bio">{{ get_the_author_meta( 'description' ) }}</p>
        </div>
      </div>
    </div> <!-- .content-single -->

    <div class="content-contenuti-consigliati">
      <div class="contenuti-consigliati consigliati-citta">
        <h6>Vuoi guardare altro su NOME DELLA CITTÀ</h6>
        <!-- Stampare altri contenuti consigliati -->
        <!-- solo quando ce la rubrica  -->
      </div>
      <div class="contenuti-consigliati consigliati-rubrica">
        <h6>Vuoi guardare altro NOME RISPETTIVA RUBRICA</h6>
        <!-- Stampare altri contenuti consigliati -->
        <!-- solo quando ce la rubrica pensieri-tra-le-pagine -->
      </div>
    </div>

    <footer class="footer-single">
        <div class="informativa">
            <article>
              <p>
        				I contenuti di questo sito sono realizzati da studenti e giovani
        				appassionati del proprio territorio. Questo progetto non persegue
        				nessuno scopo di lucro. Pertanto se sono presenti errori o imprecisioni
        				vi preghiamo di contattarci: qualsiasi feedback ci è utile per migliorare.
        				I contenuti testuali sono di proprietà dell'Associazione "L'oppure", ad eccezione
        				delle citazioni o delle trascrizioni di testi altrui. Chi intenda utilizzarli per
        				scopi non commerciali può farlo citando come fonte l'Associazione "L'oppure".
        				Qualora si voglia riprodurli per scopi commerciali, vi preghiamo di contattarci
        				alla mail info@loppure.it.
        			</p>
            </article>
        </div>
    </footer>
</article>

    {{--@include('Single.comments')--}}
@endsection
