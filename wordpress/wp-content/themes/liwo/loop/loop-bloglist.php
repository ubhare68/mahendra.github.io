<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	/**
	 * Get blog posts by blog layout.
	 */
	get_template_part('loop/content', 'postlist');

endwhile;	
else : 
	
	/**
	 * Display no posts message if none are found.
	 */
	get_template_part('loop/content','none');
	
endif;

/**
 * Post pagination, use ts_pagination() first and fall back to default
 */
?>

<?php
	echo function_exists('ts_pagination') ? ts_pagination() : posts_nav_link();
?>