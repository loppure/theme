<article class="{{ $post->css_class }}" data-click-card data-id="{{ $post->id }}"
      @if( $post->source )
          data-source='{{ json_encode(json_encode($post->source)) }}'
      @endif
  data-url="{{ $post->permalink }}"
  style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}"
  >
  <div class="sfondo">
    <header>
        <span class="img-category-post"></span>
        {{ $post->category_list }}
        <!-- TODO rivedere come stampa le categorie -->
        @if ($post->city)
            <span class="text-name-citta"><a href="{{ $post->city[0]->link }}">{{ $post->city[0]->name }}</a></span>
        @endif
    </header>
    <div class="content-text">
      <h4><a href="{{ $post->permalink }}">{{ $post->title }}</a></h4>
      @if( $post->description )
          <p>{{ $post->description }}</p>
      @else
          <p>{{ $post->excerpt }}</p>
      @endif
    </div>

    <footer class="card-footer">
      <button class="button-like-post" data-love="{{ $post->love }}">{{ $post->love }} &#9829;</button>
      <button class="button-comments">Commenta</button>
      @include('shared.comment-form')
    </footer>

  </div>

</article>
