<article class="{{ $post->css_class }} card-post-standard" data-click-card data-id="{{ $post->id }}"
      @if( $post->source )
          data-source='{{ json_encode(json_encode($post->source)) }}'
      @endif
  data-url="{{ $post->permalink }}"
  style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}"
  >
  <div class="sfondo">
    <header>
      <h4><a href="{{ $post->permalink }}">{{ $post->title }}</a></h4>
    </header>
    <div class="content-text">
      @if( $post->description )
          <p>{{ $post->description }}</p>
      @else
          <p>{{ $post->excerpt }}</p>
      @endif
    </div>

    <footer class="card-footer">
      <a href="{{ $post->permalink }}" class="button">Leggi</a>
    </footer>


  </div>

</article>
