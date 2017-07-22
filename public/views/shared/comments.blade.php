{{--
  Sarebbe da rivere questa parte poichè mettere una lista di `article' dentro un
  `footer' non è il massimo della semantica. Cambiarlo con una lista?

@foreach( $post->comments as $comment )

    <article class="comment-content" data-comment-id="{{ $comment['id'] }}">
        <header class="vcard author entry-title">
            <h3>{{ $comment['author'] }}</h3>
        </header>
        <section class="comment-body">
            <p>{{ $comment['body'] }}</p>
        </section>

        @if( isset($comment['sons']) )
            <section class="sons">
                @foreach( $comment['sons'] as $son)
                    <article data-comment-id="{{ $son['id'] }}" class="son">
                        <header class="vcard author entry-title">
                            <h3>{{ $son['author'] }}</h3>
                        </header>
                        <section class="comment-body">
                            <p>{{ $son['body'] }} </p>
                        </section>
                    </article>
                @endforeach
            </section>
        @endif

        <footer class="rispondi">
            <button class="reply-anchor">rispondi</button>
        </footer>
    </article>

@endforeach

  --}}