<?php
function wdjewelry_item_list_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo esc_html($tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'],"","",array("class"=>"")); ?>
	</div>
	<div class="comment-left" >
	<div class="comment-meta commentmetadata">
		<span><?php printf(  '<cite class="fn">%s</cite>', get_comment_author_link() ); ?><span>
		<span class="date_comment">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( '%1$s ', get_comment_date() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)','wdjewelry' ), '  ', '' );
		?>
	</span>
		
	</div>


	<?php comment_text(); ?>
	<span clas="row-fluid">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</span>
	</div>

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}