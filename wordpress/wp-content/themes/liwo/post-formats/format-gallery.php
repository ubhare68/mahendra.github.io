<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, 'liwo_image_gallery', true );
	
	if ( $attachments ) : 
	
	flex_assets();
?>
	<!-- Slide show -->
	<div id="flexslider-container" > 
        <div class="flexslider" >  
            <ul class="slides border2 dark_border">
	            <?php 
		  			foreach ( $attachments as $attachment ){
		  				echo '<li><img src="'.$attachment.'" alt="'.get_the_title().'"/></li>';
		  			}
		  		?>
               
            </ul>                 
        </div>
	</div>
<script>
jQuery(function(){

	jQuery('.flexslider').each(function(){
		var flexs = jQuery(this);
		flexs.flexslider({
			animation: "slide",
			slideshow: true,
			slideshowSpeed: 5000,
			start: function(slider){
				flexs.data("slid",slider)
				slider.pause();
			}
		});
	});
});
</script>
<?php 
	endif;
?>