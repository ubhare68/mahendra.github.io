<?php 
	$columns = $options['services-layout'];
	$cat 	 = $options['services-cats'];
	$dem 	 = 1;
?>
<div class="liwo fusection1 container">
	<?php $loop = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => $options['services-layout'], 'taxonomy' => 'service-category' ) ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	    <div class="one_fourth <?php if($dem==$columns){ echo 'last'; } if(get_post_meta( get_the_id(), "liwo_service_helight_switch", true )=='1'){ echo ' helight'; } ?>"> <i class="fa <?php echo get_post_meta( get_the_id(), "liwo_service_select_icon", true ); ?> fa-4x"></i>
	      	<div class="clearfix"></div>
	      	<?php the_title( ); ?>
	      	<?php the_excerpt(); ?>
	      	<?php if($options['services_readmore']==1): ?>
	      		<a href="<?php echo get_permalink( ); ?>" class="more1">View Details</a>
	  		<?php endif; ?>
	    </div>
	    <!-- end section -->
	    <?php $dem++; ?>
  	<?php endwhile; wp_reset_query(); ?>
  	<?php unset($columns); unset($cat); unset($dem); ?>
</div>