<?php 
global $post;
  
$url = '';
$url = get_post_meta( $post->ID, 'straightway-post-image', true );
if (wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) {
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
}

?>

<div class="portfolio_area_left">
<?php if ($url !=''): ?>
	<img alt="<?php the_title(); ?>" src="<?php echo $url ?>" class="scale-with-grid">
<?php endif ?>
<div class="clearfix mar_top2"></div>
<?php the_content( ); ?>
</div>