<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required()|| !comments_open()) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>

		<h3><?php echo esc_html__('Comment','wdjewelry' );  ?></h3>
		<ol class="commentlist">
			<?php
			$pages = get_comment_pages_count();
			$per_page = get_option('comments_per_page' );
			
				$comments = get_comments(array(
			'post_id' => $post->ID,
			
		));
				wp_list_comments( array(
					'page' => '1',
					//'per_page' => '1',
					'callback'=>'wdjewelry_item_list_comment',
					'reply_text' => 'Reply'
				),$comments);
			?>
		</ol><!-- .comment-list -->
		<?php if ($pages>1) : ?>
			<p class="text-center"><a href="javascrip:void(0)" id="load_comment"><?php echo esc_html__('VIEW MORE COMMENT ','wdjewelry' ); ?><img src="<?php echo get_template_directory_uri().'/images/ajax-loader.gif' ?>"></a></p>
		<?php endif; ?>
		<?php 
		wp_localize_script('wdjewelry-comment-ajax','ajax_comment',array('post_id'=>$post->ID,'per_page'=>$per_page,'pages'=>$pages,'comment_ajax_url'=> admin_url( 'admin-ajax.php' )));
		wp_enqueue_script('wdjewelry-comment-ajax');
		?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'wdjewelry' ); ?></p>
		<?php endif; ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wdjewelry' ); ?></p>
	<?php endif; ?>
<div id="review_form">
					<?php
						$commenter = wp_get_current_commenter();

						$comment_form = array(
							'title_reply'          => have_comments() ? esc_html__('POST YOUR COMMENT','wdjewelry' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'wdjewelry' ), get_the_title() ),
							'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'wdjewelry' ),
							'comment_notes_before' => '',
							'comment_notes_after'  => '',
							'fields'               => array(
								'author' => '<div class ="wd_header_field"><p class="comment-form-author"><input id="author" name="author" type="text" placeholder ="'.esc_attr__("Username*",'wdjewelry' ).'" size="30" aria-required="true" /></p>',
								'email'  => '<p class="comment-form-email"><input id="email" name="email" placeholder = "'.esc_attr__("Email*",'wdjewelry' ).'" type="text"  size="30" aria-required="true" /></p>',
								'website'  => '<p class="comment-form-website"><input placeholder ="'.esc_attr__("Website",'wdjewelry' ).'" id="website" name="website" type="text" size="30" aria-required="true" /></p></div>',
								'subject' => '<p class="comment-form-subject"><textarea placeholder="'.esc_attr__('Subject*','wdjewelry' ).'" id="subject" name="subject" cols="45" rows="8" aria-required="true"></textarea></p>',
								
								'content_comment' => '<p class="comment-form-comment">
								<textarea  id="comment" name="comment" placeholder="'.esc_attr__('Content','wdjewelry' ).'" cols="45" rows="2" aria-required="true"></textarea></p>',
							),
							'label_submit'  => esc_html__( 'Submit', 'wdjewelry' ),
							'logged_in_as'  => '',
							'comment_field' => ''
						);
						if(is_user_logged_in()){
						$comment_form['comment_field'] .= '<p class="comment-form-comment">
								<textarea  id="comment" name="comment" placeholder="'.esc_attr__('Comment','wdjewelry' ).'" cols="45" rows="8" aria-required="true"></textarea></p>';

						}
						comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
					?>
				</div>

</div><!-- .comments-area -->


