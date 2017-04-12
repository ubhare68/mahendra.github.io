<div class="liwo fusection2">
    <div class="container">
    	<?php $loop = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => $columns, 'taxonomy' => 'service-category' ) ); ?>
		<?php $type2 = 1; ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="<?php $type2%2==1 ? echo 'left'; : echo 'right'; ?>"> <i class="fa <?php echo get_post_meta( get_the_id(), "liwo_service_select_icon", true ); ?>"></i>
		        <div class="clearfix"></div>
		        <h5><?php single_cat_title('',true); ?></h5>
		        <strong><?php the_title( ); ?></strong>
		        <?php the_excerpt(); ?>
		        <br />
		        <a href="<?php get_permalink( ); ?>" class="more2"><?php echo __('Read more', 'themestudio'); ?></a> 
	        </div>
	    	<?php $type2++; ?>
		<?php endwhile; wp_reset_query(); ?>
    </div>
</div>