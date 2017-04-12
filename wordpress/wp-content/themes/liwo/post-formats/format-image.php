<?php 
global $post;
  
$url = '';
$url = get_post_meta( $post->ID, 'liwo_post_image', true );
if (wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) {
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
}

?>
<?php if ($url !=''): ?>
<div class="image_frame">
    <img alt="<?php the_title(); ?>" src="<?php echo $url ?>" class="scale-with-grid">
</div>
<?php endif ?>