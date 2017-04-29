@if( ! post_password_required() )
	  <div class="comments-area">
		    <!-- - tasti mostra/nascondi -->
		    <div class="comments-show-hide">
			      <div class="show-hide-img"></div>
			      <h3 data-show-text="Mostra i commenti" data-hide-text="Nascondi i commenti"></h3>
		    </div>

			  @include('shared.comment-form')
	  </div><!-- - #comments .comments-area -->
@endif
