@foreach( $posts as $post)

    <article class="{{ $post->css_class }}" data-id="{{ $post->id }}"
        @if( $post->source )
            data-source="{{ json_encode($post->source) }}"
        @endif
    >

        <header>
            <div class="img-category-post"></div>
            <div class="img-article-post"></div>
            <div class="text-header-post">
                {{ $post->category_list }}
                <span class="date-post">{{ $post->time }}</span>
            </div>
        </header>

        <section>
            @if( $post->description )
                <p>{{ $post->description }}</p>
            @endif

            <div class="content-article-post">
                <div class="img-post" style="background-image: url({{ $post->thumbnail }})"
                     data-image-url="{{ $post->hd_thumb }}"></div>

                @if( $post->type != "image")
                    <div class="title-article-post">
                        <div class="cicle-color-category-post"></div>
                        <h3><a href="{{ $post->permalink }}">{{ $post->title }}</a></h3>
                    </div>
                @endif
            </div>
        </section>

        <footer>
            <button class="button-like-post" data-love="{{ $post->love }}">{{ $post->love }} &#9829;</button>
            <button class="comments-button">Commenta</button>

            @include('shared.comment-form')
        </footer>

    </article>

@endforeach
