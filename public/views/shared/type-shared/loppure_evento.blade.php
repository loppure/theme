<article class="{{ $post->css_class }} card-evento" data-click-card data-id="{{ $post->id }}"
  style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}"
    @if( $post->source )
        data-source='{{ json_encode(json_encode($post->source)) }}'
    @endif
data-url="{{ $post->permalink }}"
>

  <header>
    <h3><a href="{{ $post->permalink }}">{{ $post->title }}</a></h3>
  </header>

  <div class="info-evento">
    <span class="ora">Ora</span>
    <span class="data">Data</span>
    <span class="indirizzo">Indirizzo</span>
  </div>

  <footer class="card-footer">
    <!-- <button class="button-like-post" data-love="{{ $post->love }}">{{ $post->love }} &#9829;</button>
    <button class="button-comments">Commenta</button>
      {{--@include('shared.comment-form')--}} -->
  </footer>

</article>
