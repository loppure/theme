<article class="{{ $post->css_class }} card-post-polaroid" data-click-card data-seen data-id="{{ $post->id }}"
         @if( $post->source )
         data-source='{{ json_encode(json_encode($post->source)) }}'
         @endif
         data-url="{{ $post->permalink }}"
>
  <div class="contenuto-post-polaroid">
    <figure style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}">
        <header>
            @if ($post->category)
                <span class="text-name-rubrica"><a href="{{ $post->category[0]->link }}">{{ $post->category[0]->name }}</a></span>
            @endif
            @if ($post->progetti)
                <span class="text-name-progetto"><a href="{{ $post->progetti[0]->link }}">{{ $post->progetti[0]->name }}</a></span>
            @endif
            <!-- Stampo la tipologia di progetto -->
        </header>
    </figure>
    <footer>
        <h3><a href="{{ $post->permalink }}">{{ $post->title }}</a></h3>
        <span>Venezia</span>
    </footer>
  </div>
</article>
