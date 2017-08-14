<article class="{{ $post->css_class }} card-post-standard" data-click-card data-id="{{ $post->id }}"
      @if( $post->source )
          data-source='{{ json_encode(json_encode($post->source)) }}'
      @endif
  data-url="{{ $post->permalink }}"
  style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}"
  >
  <div class="sfondo">
    <header>
        @if ($post->category)
            <span class="text-name-rubrica {{ $post->category[0]->name }}"><a href="{{ $post->category[0]->link }}">{{ $post->category[0]->name }}</a></span>
        @endif
        @if ($post->city)
            <span class="text-name-citta"><a href="{{ $post->city[0]->link }}">{{ $post->city[0]->name }}</a></span>
        @endif
    </header>
    <div class="content-text">
      <h4><a href="{{ $post->permalink }}">{{ $post->title }}</a></h4>
    </div>

    <footer class="card-footer">
      <button class="button-like-post" data-love="{{ $post->love }}">{{ $post->love }}</button>
    </footer>


  </div>

</article>
