@foreach( $posts as $post)

    <article class="{{ $post->css_class }}" data-id="{{ $post->id }}"
        @if( $post->source )
            data-source="{{ json_encode($post->source) }}"
        @endif
    >

        <header>
            <span class="img-category-post"></span>
                {{ $post->category_list }}
            <span class="text-name-citta">Pordenone</span>
        </header>

        <section>
          <div class="text-card">
            <h3><a href="{{ $post->permalink }}">{{ $post->title }}</a></h3>
            @if( $post->description )
                <p>{{ $post->description }}</p>
            @endif
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada
              fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies
              eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
              Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
            </p>
          </div>
          <div class="img-post" style="background-image: url({{ $post->thumbnail }})" data-image-url="">
            <!-- TODO implementare successivamente
            {{--
            <button class="button-like-post" data-love="{{ $post->love }}">{{ $post->love }} &#9829;</button>
            <button>Commenta</button>
          --}}-->
          </div>
        </section>

        <footer>
            @include('shared.comment-form')
        </footer>

    </article>

@endforeach
