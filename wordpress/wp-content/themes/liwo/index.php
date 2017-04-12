<?php
	/**
	 * index.php
	 * The main post loop in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	**/

	get_header();
	global $liwo; 
	
?>
	
	<div class="container">
		
	<?php 
		if(isset($liwo['blog_page_layout'])){
			$blog_page_layout = $liwo['blog_page_layout'];
		} else {
			$blog_page_layout = 'fulwidth';
		}
		switch ($blog_page_layout) {
			case 'fulwidth':
			if(isset($liwo['blog_style'])){
				$blog_style = $liwo['blog_style'];
			} else {
				$blog_style = 'list';
			}
	?>
		<div class="content_fullwidth">
	    	<?php get_template_part('loop/loop', 'blog'.$blog_style );  ?>
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