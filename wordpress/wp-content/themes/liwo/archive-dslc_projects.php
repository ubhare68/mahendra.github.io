<?php 
	/**
	 * archive-dslc_projects.php
	 * The project archive used in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header();
	
?>

    <h1><?php echo get_option('Portfolio Title','Our Portfolio'); ?></h1>


	<div class="portfolio">
  
    <?php get_template_part('loop','loop/filters'); ?>
    
    <ul class="items col<?php get_option('portfolio_layout','4'); ?>">
      
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				
				/**
				 * Get portfolio posts by portfolio layout.
				 */
				get_template_part('loop/content', 'portfolio');
			
			endwhile;	
			else : 
				
				/**
				 * Display no posts message if none are found.
				 */
				get_template_part('loop/content','none');
				
			endif;
		?>
      
    </ul>
    
  </div><!-- /.portfolio --> 
  
<?php 
	get_footer();