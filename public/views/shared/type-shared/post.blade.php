<article class="{{ $post->css_class }} card-post-standard" data-click-card data-seen data-id="{{ $post->id }}"
      @if( $post->source )
          data-source='{{ json_encode(json_encode($post->source)) }}'
      @endif
  data-url="{{ $post->permalink }}"
  style="background-image: url({{ $post->thumbnail }})" data-image-url="{{ $post->thumbnail }}"
  >
  <div class="sfondo">
    <header>
      @if ($post->category)
          <span class="text-name-rubrica {{ $post->category[0]->slug }}"><a href="{{ get_category_link( $post->category[0]->cat_ID ) }} ">{{ $post->category[0]->name }}</a></span>
      @endif

      <ul class="lista-citta">
        @foreach ($post->city as $city)
        <li class="{{ $city->slug }}"><a href="{{ $city->link }}">{{ $city->name }}</a></li>
        @endforeach

      </ul>
    </header>
    <div class="content-text">
      <h4><a href="{{ $post->permalink }}">{{ $post->title }}</a></h4>
    </div>

    <footer class="card-footer">
      <button class="button-like-post" data-love="{{ $post->love }}">{{ $post->love }}</button>
    </footer>


  </div>

</article>
