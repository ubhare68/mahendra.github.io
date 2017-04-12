<?php
	/**
	 * single-dslc_projects.php
	 * The single projects post template in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header(); 
	the_post();

?>
	<?php if(!is_home() & !is_front_page()){ ?>
		<div class="page_title">
	      <div class="container">
	        <div class="title">
	          <h1><?php the_title( ); ?></h1>
	        </div>
	        <div class="pagenation"><?php ts_breadcrumbs(); ?></div>
	      </div>
	    </div>
	<?php } ?>

  
  	<div class="container">
       <?php get_template_part('loop/content', 'portfolio'); ?>
	</div>
	<!-- end content area -->
	<div class="clearfix mar_top5"></div>

<?php
		
    get_template_part('loop/content','postnav'); 

?>

<?php 
	get_footer(); 