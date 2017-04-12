<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, 'liwo_portfolio_slider', true );
	
	if ( $attachments ) : 
	
	flex_assets();		
?>

<div class="portfolio_area_left">
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
	<?php the_content( ); ?>
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