<?php 
	/**
	 * taxonomy.php
	 * The template for display taxonomy archives Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header(); 
	
?>
    <?php if(!is_home() & !is_front_page()){ ?>
      <div class="page_title">
        <div class="container">
          <div class="title">
            <h1><?php echo get_queried_object()->name; ?></h1>
          </div>
          <div class="pagenation"><?php ts_breadcrumbs(); ?></div>
        </div>
      </div>
    <?php } ?>
  
      <div class="portfolio">
		
        <ul class="items col4">
          
          <?php 
          	if ( have_posts() ) : while ( have_posts() ) : the_post();
          		
          		/**
          		 * Get blog posts by blog layout.
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