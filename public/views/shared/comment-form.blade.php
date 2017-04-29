
@if( $post->comment_status == 'open' )
    <div class="comments-wrapper">
        <button class="close_comments"></button>

        @include('shared.comments')

	      <div class="respond">
		        {{ cancel_comment_reply_link() }}

		        <form action="{{ get_option('siteurl') }}/wp-comments-post.php" method="post" data-id="{{ $post->id }}" class="comment-form" data-selector="form">
			          @if( $user->logged )

				            <p>Sei loggato come <a href="{{ get_option('siteurl') }}/wp-admin/profile.php">{{ $user->name }}</a>. <a href="{{ wp_logout_url($post->permalink) }}" title="Log out of this account">Log out &raquo;</a></p>

			          @else

				            <p class="comment-form-author">
					              <input type="text" name="author" class="op-input" placeholder="Nome" size="22" tabindex="2" aria-required="true" required>
				            </p>

				            <p class="comment-form-email">
					              <input type="email" name="email" class="op-input" placeholder="Email" size="22" tabindex="2" aria-required="true" required>
				            </p>

			          @endif

			          <p class="comment-form-comment">
				            <textarea name="comment" tabindex="4" class="op-input" aria-required="true" required></textarea>
			          </p>

			          <p class="comment-notes">Nel rispetto della privacy non rendermo pubblica la tua mail.</p>

			          <p class="form-submit">
				            <input name="submit" type="submit" class="submit" tabindex="5" value="Commenta" />
			          </p>

			          <input type="hidden" name="comment_post_ID" value="" class="comment_post_ID">
			          <input type="hidden" name="comment_parent" class="comment_parent" value="">

		        </form>
	      </div>
    </div>
@endif
