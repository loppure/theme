<article class="{{ $post->css_class }} card-evento" data-click-card data-id="{{ $post->id }}"
    @if( $post->source )
        data-source='{{ json_encode(json_encode($post->source)) }}'
    @endif
data-url="{{ $post->permalink }}"
>
  <figure style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}">
    @if ($post->category)
        <span class="text-name-rubrica"><a href="{{ $post->category[0]->link }}">{{ $post->category[0]->name }}</a></span>
    @endif
    <div class="calendario">
      <span class="giorno">Ven</span>
      <span class="giorno">3</span>
      <span class="mese">Marzo</span>
    </div>
  </figure>
  <header>
    @if ($post->city)
        <span class="text-name-citta"><a href="{{ $post->city[0]->link }}">{{ $post->city[0]->name }}</a></span>
    @endif
    <h3><a href="{{ $post->permalink }}">{{ $post->title }}</a></h3>
  </header>


  <footer class="card-footer">
    <button>Partecipo</button>
    <button>Guardo</button>
  </footer>

</article>
