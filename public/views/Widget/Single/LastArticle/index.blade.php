{{ $args['before_widget'] }}

{{ $args['before_title'] }} {{ $title }} {{ $args['after_title'] }}

<div class="ultimi_articoli_wrapper">

    <div class="ultimi_articoli_mask">
        <ul class="loppure_last_articles">
            @foreach( $posts as $post)
                <li class="art">
                    @if( $post->category )
                        <div class="cerchio cerchio-{{ $post->category->slug }}"></div>

                        <h4>{{ $post->category->name }}</h4>
                    @endif

                    <h5><a href="{{ $post->url }}" title="{{ $post->title }}">{{ $post->title }}</a></h5>
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{ $args['after_widget'] }}
