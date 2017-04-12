<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>




<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<div class="avatar"><?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '60' ), '', get_comment_author() ); ?></div>
		<div class="comment-des"><div class="arrow-comment"></div>
		<div class="comment-by">
			<strong itemprop="author"><?php comment_author(); ?></strong>
				<span class="reply">
					<?php
						if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
							if ( wc_customer_bought_product( $comment->comment_author_email, $comment->user_id, $comment->comment_post_ID ) )
								echo '<em class="verified">(' . __( 'verified owner', 'woocommerce' ) . ')</em> ';
					?>
				</span>
				<span class="date"><time itemprop="datePublished" datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date( __( get_option( 'date_format' ), 'woocommerce' ) ); ?></time></span>
		</div>
		<div itemprop="description">
			<?php if ( $comment->comment_approved == '0' ) : ?>

			<p class="meta"><em><?php _e( 'Your comment is awaiting approval', 'woocommerce' ); ?></em></p>

		<?php endif; ?>
		<?php comment_text(); ?>
	</div>
		
		<?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) :
				$avclass = centum_get_rating_class($rating); ?>

			<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( __( 'Rated %d out of 5', 'woocommerce' ), $rating ) ?>">
				<div class="rating  <?php echo $avclass; ?>"><div class="star-rating"></div><div class="star-bg"></div></div>
			</div>
		<?php endif; ?>
</div>
<div class="clear"></div>
</div>









