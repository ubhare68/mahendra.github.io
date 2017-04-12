<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since  wdjewelry 1.0
 */
?>
<div class="content_item_default">
	
		<?php
		if(has_post_thumbnail()):
			echo "<div class='item_header'>";
			the_post_thumbnail(array( 870,524));
			echo "</div>";
		endif;
		?>
					
	<div class="item_content">
		<div class="wd_link_home">
			<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home','wdjewelry'); ?></a>
		</div>
		<div class="content_title">
			<h3> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
		</div>

		<div class="content_author">
			<span><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php echo get_the_date(); ?></a></span>
			<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo esc_html__('Post By:','wdjewelry').' '.get_the_author(); ?></a></span>
			<span><?php comments_number( '0 comment', '1 comment', '% comment' ); ?></span>

		</div>

		<div class="clear"></div>

		<div class="content_infor">
		<?php
				the_content( sprintf(
							wp_kses_post(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wdjewelry' )),
							the_title( '<span class="screen-reader-text">', '</span>', false )
						) );

						wp_link_pages( array( 'before' => '<div class="wp-pagenavi"><span class="page-links-title">' . esc_html__( 'Pages:', 'wdjewelry' ) . '</span>', 'after' => '</div>', 'link_before' => '<span class="pager">', 'link_after' => '</span>' ) );
					?>
		</div>
		<div class="content__read-more">
			<p> <a href="<?php the_permalink(); ?>" class='button' title='<?php echo esc_html__('read more','wdjewelry' ); ?>'><?php echo esc_html__('Read More','wdjewelry' ); ?></a></p>
		</div>
		
	<div class="entry-footer">
		<div class="wd_content_tag"><?php echo get_the_tag_list('<p>'.esc_html__("Tags:","wdjewelry" ).'',', ','</p>'); ?></div>
		<?php $category_list = get_the_category_list(__( ', ', 'wdjewelry' )); ?>
		<?php if($category_list): ?>
		<div class="wd_content_category"><?php echo esc_html__('Category :' ,'wdjewelry' ).wp_kses_post($category_list ); ?></div>
		<?php endif;?>

	</div>
	</div>

	</div>
