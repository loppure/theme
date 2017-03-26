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
				    <figure class="single-image" style="background-image: /* image here */">IMAGE HERE</figure>

						@include('Widget/Social/share/index')

						<div class="content-text">
	              <div class="text">
		                {{ $post->content }}

		                <p>Eventuali fonti qua</p>
	              </div> <!-- .text -->
            </div> <!-- .content-text -->
					</div> <!-- .content-single -->

					<section class="widget-area sidebar-single" role="complementary">
							<!-- widget Last article -->
							@include('Widget/Citta/index')
							@include('Widget/Categorie/index')
							{{--{{ dynamic_sidebar('sidebar-single') }}--}}
					</section> <!-- .widget-area -->

				</div> <!-- .entry-content-wrapper -->
      </div> <!-- .entry-content -->
		</section> <!-- .single-content-wrapper -->

			  <footer>
					<div class="informative">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
							eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
							ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
							aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
							in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
							sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum.
						</p>
					</div>
					<div class="content-author-single">
			      <img src="#" /> <!--#TODO Immagine autore qui -->
			      <h4>{{ the_author_posts_link() }}</h4>
			      <p class="author-bio">{{ get_the_author_meta( 'description' ) }}</p>
					</div>
		    </footer>
	  </article>
		{{--
	  @include('Single.comments')
			--}}
@endsection
