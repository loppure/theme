@extends('layout')

@section('content')

    <article id="post-{{ $post->id }}" data-image="image here" data-id="{{ $post->id }}" {{ post_class() }}>
        <header class="single-header">
            <div class="content-title">

                <h1 class="entry-title">{{ $post->title }}</h1>
            </div>
        </header>
        <section class="single-content-wrapper">
            <div class="content-single">
                <figure class="single-image" style="background-image: url({{ $post->thumbnail }})"></figure>

                @include('Widget/Social/share/index')

                <div class="content-text">
                    <div class="text">
                        {{ $post->content }}

                        <div class="content-fonti">
                            <h6>Fonti:</h6>
                            <span>Foto presa da Wikipedia</span>
                            <span>Informazioni presa da Wikipedia, sito 1, sito 2 e sito 3</span>
                        </div>
                    </div> <!-- .text -->
                </div> <!-- .content-text -->
            </div> <!-- .content-single -->

            <section class="widget-area sidebar-single" role="complementary">
                <!-- widget Last article -->
                @include('Widget/Single/Porta-citta/index')
                @include('Widget/Single/Categorie/index')
                @include('Widget/Single/Citta/index')
                {{--{{ dynamic_sidebar('sidebar-single') }}--}}
            </section> <!-- .widget-area -->
        </section> <!-- .single-content-wrapper -->

        <footer class="footer-single">
            <div class="informativa">
                <article>
                  <p>
            				I contenuti di questo sito sono realizzati da studenti e giovani
            				appassionati del proprio territorio. Questo progetto non persegue
            				nessuno scopo di lucro. Pertanto se sono presenti errori o imprecisioni
            				vi preghiamo di contattarci: qualsiasi feedback ci è utile per migliorare.
            				I contenuti testuali sono di proprietà dell'Associazione "L'oppure", ad eccezione
            				delle citazioni o delle trascrizioni di testi altrui. Chi intenda utilizzarli per
            				scopi non commerciali può farlo citando come fonte l'Associazione "L'oppure".
            				Qualora si voglia riprodurli per scopi commerciali, vi preghiamo di contattarci
            				alla mail info@loppure.it.
            			</p>
                </article>
            </div>
            <div class="content-author-single">
                <article class="author-single">
                    {{ $author->thumb }}
                    <h4>{{ the_author_posts_link() }}</h4>
                    <p class="author-bio">{{ get_the_author_meta( 'description' ) }}</p>
                </article>
            </div>
        </footer>

        <section class="widget-area sidebar-single-mobile" role="complementary">
            <!-- widget Last article -->
            @include('Widget/Single/Categorie/index')
            @include('Widget/Single/Porta-citta/index')
            @include('Widget/Single/Citta/index')
            {{--{{ dynamic_sidebar('sidebar-single') }}--}}
        </section> <!-- .widget-area -->
    </article>

    @include('Single.comments')
@endsection
