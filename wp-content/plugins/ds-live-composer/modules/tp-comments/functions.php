<?php

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function dslc_display_comments( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	
	switch ( $comment->comment_type ) :
		
		case 'pingback' :
		case 'trackback' :
			?>
			<li class="dslc-comments-pingback">
				<p><?php _e( 'Pingback:', 'dslc_string' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'dslc_string' ), ' ' ); ?></p>
			<?php
		break;
		default :
			?>

			<li <?php comment_class( 'dslc-comment' ); ?> id="dslc-comment-<?php comment_ID(); ?>">

				<div class="dslc-comment-inner">

					<div class="dslc-comment-info dslc-clearfix">

						<ul class="dslc-comment-meta dslc-clearfix">
							<li class="dslc-comment-meta-author"><span class="dslc-comment-author-avatar"><?php echo get_avatar( $comment, 33 ); ?></span><?php echo get_comment_author_link(); ?></li>
							<li class="dslc-comment-meta-date"><?php echo get_comment_date(); ?></li>
						</ul>

						<span class="dslc-comment-reply">
							<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</span>

					</div><!-- .comment-info -->

					<div class="dslc-comment-main">
						
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<p><em><?php _e( 'Your comment is awaiting moderation.', 'dd_string' ); ?></em></p>
						<?php endif; ?>
						<?php comment_text(); ?>

					</div><!-- .comment-main -->

				</div><!-- .comment-inner -->

			<?php

			break;
	endswitch;

}