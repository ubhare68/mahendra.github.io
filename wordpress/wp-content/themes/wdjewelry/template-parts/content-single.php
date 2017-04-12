<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage wdjewelry
 * @since wdjewelry 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	 <?php $format = (get_post_format(get_the_ID()))?get_post_format(get_the_ID()):'standard'; ?>
	<?php if($format === 'video'){
			if(get_post_meta(get_the_ID(),'_link_video',true )):
				echo wdjewelry_wd_get_embbed_video(get_post_meta(get_the_ID(),'_link_video',true ));
			elseif(has_post_thumbnail()):
				the_post_thumbnail('full');
			endif;
		}elseif ($format === 'audio') {
			if(get_post_meta(get_the_ID(),'_link_audio',true )):
				echo wdjewelry_audio_soundcloud(get_post_meta(get_the_ID(),'_link_audio',true ));
			elseif(has_post_thumbnail()):
				the_post_thumbnail('full');
			endif;
		}else{
			if(has_post_thumbnail()):
				the_post_thumbnail('full');
		endif;
	}
	?>
	<div class="wd_single_header">
		<div class="wd_single_home"><a href="<?php echo esc_url(home_url('/' )); ?>"><?php echo esc_html__('home','wdjewelry' ); ?></a></div>
		<div class="wd_single_title"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
		<div class="content_author">
			<span><?php echo get_the_date(); ?></span>
			<span><?php echo get_the_author( ); ?></span>
			<span>  <?php comments_number( '0 comment', '1 comment', '% comment' ); ?></span>

		</div>
	</div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wdjewelry' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'wdjewelry' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="wd_single_tag"><?php echo get_the_tag_list('<p>Tags: ',', ','</p>'); ?></div>
		<div class="wd_sinle_social"><?php wdjewelry_share_social();?></div>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
