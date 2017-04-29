@foreach( $posts as $post)

    <article class="{{ $post->css_class }}" data-id="{{ $post->id }}"
        @if( $post->source )
            data-source="{{ json_encode($post->source) }}"
        @endif
    >

        <header>
            <span class="img-category-post"></span>
            {{ $post->category_list }}
            @if ($post->city)
                <span class="text-name-citta"><a href="{{ $post->city[0]->link }}">{{ $post->city[0]->name }}</a></span>
            @endif
        </header>

        <section>
          <div class="text-card">
            <h3><a href="{{ $post->permalink }}">{{ $post->title }}</a></h3>
            @if( $post->description )
                <p>{{ $post->description }}</p>
            @else
                <p>{{ $post->excerpt }}</p>
            @endif
          </div>
          <div class="img-post" style="background-image: url({{ $post->thumbnail }})" data-image-url="">

          </div>
        </section>

        <footer class="card-footer">
          <button class="button-like-post" data-love="{{ $post->love }}">{{ $post->love }} &#9829;</button>
          <button>Commenta</button>
            @include('shared.comment-form')
        </footer>

    </article>

@endforeach
