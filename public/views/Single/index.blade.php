@extends('layout')

@section('content')

	  <article id="post-{{ $post->id }}" data-image="image here" data-id="{{ $post->id }}" {{ post_class() }}>
		    <header class="entry-header">
			      <h1 class="entry-title">{{ $post->title }}</h1>
		    </header>
		    <section class="single-content-wrapper">
			      <div class="entry-primary">
				        <figure class="entry-image" style="background-image: /* image here */">IMAGE HERE</figure>

				        <div class="entry-content-wrapper">
					          <div class="entry-content text-article">
						            <div class="entry-social">
							              <h3>Social</h3>
							              <ul>
								                <li class="item item-facebook">Facebook</li>
								                <li class="item item-twitter">Twitter</li>
								                <li class="item item-googleplus">Google+</li>
							              </ul>
						            </div> <!-- .entry-social -->
						            <div class="content-text">
							              <div class="text">
								                {{ $post->content }}

								                <p>Eventuali fonti qua</p>
							              </div> <!-- .text -->
							              <section class="widget-area sidebar-single" role="complementary">
								                <?php dynamic_sidebar('sidebar-single'); ?>
							              </section> <!-- .widget-area -->
						            </div> <!-- .content-text -->
					          </div> <!-- .entry-content -->
				        </div> <!-- .entry-content-wrapper -->
			      </div> <!-- .entry-primary -->
		    </section> <!-- .single-content-wrapper -->
		    <footer>
			      <p>#TODO Immagine autore qui</p>
			      <h4>{{ the_author_posts_link() }}</h4>
			      <p class="author-bio">{{ get_the_author_meta( 'description' ) }}</p>
		    </footer>
	  </article>
	  
	  @include('Single.comments')
	  
@endsection
