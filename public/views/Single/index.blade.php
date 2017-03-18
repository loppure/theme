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

						<div class="single-social">
              <h3>Condividi</h3>
              <ul>
                <li class="item item-facebook">Facebook</li>
                <li class="item item-twitter">Twitter</li>
                <li class="item item-googleplus">Google+</li>
								<li class="item item-linkedin">Linkedin</li>
								<li class="item item-whatsapp">Whatsapp</li>
								<li class="item item-telegram">Telegram</li>
								<li class="item item-mail">Mail</li>
              </ul>
            </div> <!-- .entry-social -->

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
			      <p>#TODO Immagine autore qui</p>
			      <h4>{{ the_author_posts_link() }}</h4>
			      <p class="author-bio">{{ get_the_author_meta( 'description' ) }}</p>
		    </footer>
	  </article>

	  @include('Single.comments')

@endsection
