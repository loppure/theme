<article class="{{ $post->css_class }}" data-click-card data-seen data-id="{{ $post->id }}"
      @if( $post->source )
          data-source='{{ json_encode(json_encode($post->source)) }}'
      @endif
  data-url="{{ $post->permalink }}"
  >

  <header>
    <img src="#">
    <h4><a href="#">Nome</a></h4>
  </header>

  <div class="team-text">
    <p>{{ $author->bio }}</p>
  </div>

</article>
