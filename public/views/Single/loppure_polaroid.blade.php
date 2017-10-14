@extends('layout')

@section('content')

<article id="post-{{ $post->id }}" data-id="{{ $post->id }}" {{ post_class() }}>
  <div class="content-immagine-polaroid">
    <figure style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}"></figure>
  </div>
  <div class="content-text-polaroid">
    <header class="single-header">
      <h1 class="entry-title">{{ $post->title }}</h1>
    </header>

    <div class="text">
        {{ $post->content }}
    </div> <!-- .text -->

  </div>

</article>

<div class="content-extra">
  <div class="author-single">
      <h4>{{ the_author_posts_link() }}</h4>
      <p class="author-bio">{{ get_the_author_meta( 'description' ) }}</p>
  </div>


  @include('Widget/Social/share/index')

  <div class="informativa">
    <h6>Uso dei contenuti</h6>
    <p>
      I contenuti di questo sito sono realizzati da studenti e giovani
      appassionati del proprio territorio. Questo progetto non persegue
      nessuno scopo di lucro. Pertanto se sono presenti errori o imprecisioni
      vi preghiamo di contattarci: qualsiasi feedback ci è utile per migliorare.
      I contenuti testuali sono di proprietà dell'<span>Associazione L'oppure</span>, ad eccezione
      delle citazioni o delle trascrizioni di testi altrui. Chi intenda utilizzarli per
      scopi non commerciali può farlo citando come fonte <span>l'associazione L'oppure</span>.
      Qualora si voglia riprodurli per scopi commerciali, vi preghiamo di contattarci
      alla mail </span>info@loppure.it</span>.
    </p>
  </div>
</div>

    {{--@include('Single.comments')--}}
@endsection
