@extends('layout')

@section('content')

<div class="page-gray page-standard">
    <header class="header-page">
        <h1 class="title-page">{{ the_title() }}</h1>
    </header>

    <section>

        @foreach( $authors as $author)

            <article class="box-team-max">
                    <header>
                            {{ $author->thumb }}
                            <h4><a href="{{ $author->url }}">{{ $author->name }}</a></h4>
                    </header>
                    <div class="box-team-text">
            <p>{{ $author->bio }}</p>
                    </div>
            </article>

    @endforeach



    </section>
</div>
@endsection
