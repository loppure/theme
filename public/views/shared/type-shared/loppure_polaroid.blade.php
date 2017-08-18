<article class="{{ $post->css_class }} card-post-polaroid" data-click-card data-seen data-id="{{ $post->id }}"
         @if( $post->source )
         data-source='{{ json_encode(json_encode($post->source)) }}'
         @endif
         data-url="{{ $post->permalink }}"
>
    <figure>
        <header>
            @if ($post->progetto)
                <span class="text-name-progetto"><a href="{{ $post->progetto[0]->link }}">{{ $post->progetto[0]->name }}</a></span>
            @endif
            <!-- Stampo la tipologia di progetto -->
        </header>
    </figure>
    <footer>
        <h3><a href="{{ $post->permalink }}">{{ $post->title }}</a></h3>
        <!-- Nome della fotografia -->
    </footer>
</article>
