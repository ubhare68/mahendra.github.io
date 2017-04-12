<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since  wdjewelry 1.0
 */

$format = (get_post_format(get_the_ID())) ? get_post_format(get_the_ID()) : 'standard';
if ($format === 'quote'):
  $color = (get_post_meta(get_the_ID(), '_link_color', true)) ? get_post_meta(get_the_ID(), '_link_color', true) : '#e9f1f2';
  ?>
								<div class="wd_item_blog_list conten_item_quote" style="background-color: <?php echo esc_attr($color); ?>">
									<div class="content">
										<div class="content_infor">
											<?php echo wdjewelry_get_excerpt(get_the_excerpt(), 40); ?>
											<a href="<?php the_permalink();?>"><?php echo esc_html__('[...]', 'wdjewelry'); ?> </a>
										</div>
									</div>
								</div>
							<?php else: ?>
		<div class="wd_item_blog_list content_item_default">
			<div class='item_header'>
				<?php if ($format === 'video') {
  if (get_post_meta(get_the_ID(), '_link_video', true)):
    echo wdjewelry_wd_get_embbed_video(get_post_meta(get_the_ID(), '_link_video', true), '360px', '360px');
  elseif (has_post_thumbnail()):
    the_post_thumbnail(array(870, 524));
  endif;
} elseif ($format === 'audio') {
  if (get_post_meta(get_the_ID(), '_link_audio', true)):
    echo wdjewelry_audio_soundcloud(get_post_meta(get_the_ID(), '_link_audio', true));
  elseif (has_post_thumbnail()):
    the_post_thumbnail(array(870, 524));
  endif;
} else {
  if (has_post_thumbnail()):
    the_post_thumbnail(array(870, 524));
  endif;
}
?>
			</div> <!-- end div conten_itiem_blog -->

			<div class="item_content">
				<div class="wd_link_home">
					<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'wdjewelry'); ?></a>
				</div>
				<div class="content_title text_center">

					<h3> <a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
				</div>

				<div class="content_author">
					<span><?php echo get_the_date(); ?></span>
					<span><?php echo get_the_author(); ?></span>
					<span><?php comments_number('0 ', '1 ', '% ');?></span>

				</div>

				<div class="clear"></div>

				<div class="content_infor">
					<?php echo wdjewelry_get_excerpt(get_the_excerpt(), 40); ?>
					<p><a href="<?php the_permalink();?>" class='wd_read_more button'><?php echo esc_html__('Read More', 'wdjewelry'); ?></a></p>
				</div>
			</div>

		</div>
	<?php endif;?>