<?php
	/**
	 * category.php
	 * The main post loop in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	**/
	
	$post = new stdClass();
	$post->ID = 24;
	get_header();
	global $liwo; 
	
?>
	
    <div class="page_title">
      <div class="container">
        <div class="title">
          <h1><?php echo sprintf( __('Your Search For:','themestudio') . ' %s', get_search_query()); ?></h1>
        </div>
        <div class="pagenation"><?php ts_breadcrumbs(); ?></div>
      </div>
    </div>
	
	<div class="container">
		
	<?php 
		switch ($liwo['blog_page_layout']) {
			case 'fulwidth':
	?>
		<div class="content_fullwidth">
	    	<?php get_template_part('loop/loop', 'blog'.$liwo['blog_style'] );  ?>
	    </div>
	    <!-- end content full width area -->
	<?php
			break;

			case 'left-sidebar':
	?>
		
		<!-- left sidebar starts -->
	    <div class="left_sidebar">
	    	<?php get_sidebar( 'left' ); ?>
	    </div>
	    <div class="content_right">
	    	<?php get_template_part('loop/loop', 'blog'.$liwo['blog_style'] );  ?>
	    </div>
	    <!-- end content left side area -->
	<?php
			break;
			
			default:
	?>
		<div class="content_left">
			<?php get_template_part('loop/loop', 'blog'.$liwo['blog_style']); ?>
	    </div>
	    <!-- end content left side area -->
		<!-- right sidebar starts -->
	    <div class="right_sidebar">
	    	<?php get_sidebar( 'right' ); ?>
	    </div>
	<?php
			break;
		}
	?>
	</div>

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();