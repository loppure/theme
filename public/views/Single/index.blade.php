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
							@include('Widget/Single/Categorie/index')
							@include('Widget/Single/Porta-citta/index')
							@include('Widget/Single/Citta/index')
							{{--{{ dynamic_sidebar('sidebar-single') }}--}}
					</section> <!-- .widget-area -->

				</div> <!-- .entry-content-wrapper -->
      </div> <!-- .entry-content -->
		</section> <!-- .single-content-wrapper -->

			  <footer class="footer-single">
					<div class="informativa">
						<article>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
								eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
								ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
								aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
								in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
								sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
								mollit anim id est laborum.
							</p>
						</article>
					</div>
					<div class="content-author-single">
						<article class="author-single">
				      <img src="#" /> <!--#TODO Immagine autore qui -->
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
		{{--
	  @include('Single.comments')
			--}}
@endsection
