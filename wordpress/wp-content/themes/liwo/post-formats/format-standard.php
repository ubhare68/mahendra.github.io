<?php
$url = '';
if (wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) {
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
 }
?>
<?php if ($url !=''): ?>

<div class="container-fluid ">
  <div class="row-fluid">
    <div class="span12">
	
		<img alt="<?php the_title(); ?>" src="<?php echo $url ?>" class="scale-with-grid">
  
      <div class="separator_mini"></div> 
    </div>
  </div>
</div>


<?php endif ?>