<?php 
	/**
	 * single.php
	 * The single blog post template in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header(); 
	the_post();	
	
	$format = get_post_format();

	if( false === $format ) 
		$format = 'standard';
		
	
?>
<?php
	get_template_part('loop/content','postnav');
	global $post;
	global $liwo;

?>
	
    <?php if(!is_home() & !is_front_page()){ ?>
	    <div class="page_title">
	      <div class="container">
	        <div class="title">
	          <h1><?php the_title( ); ?></h1>
	        </div>
	        <div class="pagenation"><?php if(function_exists('ts_breadcrumbs')){ ts_breadcrumbs(); } ?></div>
	      </div>
	    </div>
	<?php } ?>
		
	<div class="container">
		<?php if (isset($liwo['blog_page_layout'])): ?>
			<?php if ($liwo['blog_page_layout']=='left-sidebar'): ?>
			<div class="left_sidebar">
		    	<?php get_sidebar( 'left' ); ?>
		    </div>
		    <div class="content_right">
		      <div class="blog_post">
		        <div class="blog_postcontent">
		          	<?php if(has_post_thumbnail()){ ?>
			          <div class="image_frame">
			          	<a href="<?php echo get_permalink(); ?>">
			          		<?php
			          			global $post;
								$img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
								echo '<img src="'.$img_url[0].'" />';
			          		?>
			          	</a>
			          </div>
			    	<?php } ?>
			    		
			    	<?php 
			    		$year  = get_the_time( 'Y' );
						$month = get_the_time( 'm' );
						$day   = get_the_time( 'd' );
			    	?>
		          <a href="<?php echo get_day_link( $year, $month, $day ); ?>" class="date"><strong><?php the_time( 'd' ); ?></strong><i><?php the_time( 'F' ); ?></i></a>
		          <h3><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h3>
		          <?php get_template_part('loop/content', 'metapost'); ?>
		          <div class="post_info_content">
		            <?php the_content( ); ?>
		          </div>
		        </div>
		      </div>
		      <!-- /# end post -->
		      <div class="clearfix divider_line"></div>
		      <?php 
		      	if($liwo['blog_social_switch']){
			      	get_template_part('content-parts/single', 'social' );
			    }
		      ?>
		      <!-- end share post links -->
		      <div class="clearfix"></div>
		      <?php 
		      	if($liwo['blog_author_switch']){
			      	get_template_part('loop/content', 'author' );
			    }
		      ?>
		      <!-- end about author -->
		      <div class="clearfix mar_top5"></div>
		      <div class="one_half">
		        <div class="popular-posts-area">
		          <?php get_template_part('loop/content', 'postrecent'); ?>
		        </div>
		      </div>
		      <!-- end recent posts -->
		      <div class="one_half last">
		        <div class="popular-posts-area">
		        	<?php get_template_part('loop/content', 'postpopular'); ?>
		        </div>
		      </div>
		      <!-- end popular posts -->
		      <div class="clearfix divider_line"></div>
		      <?php if(comments_open()) comments_template(); ?>
		      
		      <!-- end comment form -->
		      <div class="clearfix mar_top2"></div>
		    </div>
			<?php endif ?>
		<?php endif ?>
	    <!-- end content left side area -->

		<?php if (isset($liwo['blog_page_layout'])): ?>
		    <?php if ($liwo['blog_page_layout']=='right-sidebar'): ?>
			<div class="content_left">
		      <div class="blog_post">
		        <div class="blog_postcontent">
		        	
	        		<?php switch ($format) {
	        			case 'image':
	        				get_template_part('post-formats/format', 'image');
	        			break;

	        			case 'video':
	        				get_template_part('post-formats/format', 'video');
	        			break;

	        			case 'gallery':
	        				get_template_part('post-formats/format', 'gallery');
	        			break;

	        			case 'audio':
	        				get_template_part('post-formats/format', 'audio');
	        			break;
	        			
	        			default:
	        				get_template_part('post-formats/format', 'standard');
	        			break;
	        		} ?>

		          <a href="<?php the_permalink(); ?>" class="date"><strong><?php the_time( 'd' ); ?></strong><i><?php the_time( 'F' ); ?></i></a>
		          <h3><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h3>
		          <?php get_template_part('loop/content', 'metapost'); ?>
		          <div class="post_info_content">
		            <?php the_content( ); ?>
		          </div>
		        </div>
		      </div>
		      <!-- /# end post -->
		      <div class="clearfix divider_line"></div>
		      <?php get_template_part('content-parts/single', 'social' ); ?>
		      <!-- end share post links -->
		      <div class="clearfix"></div>
		      <?php get_template_part( 'loop/content', 'author' ); ?>
		      <div class="clearfix mar_top5"></div>
		      <div class="one_half">
		        <div class="popular-posts-area">
		          <?php get_template_part('loop/content', 'postrecent'); ?>
		        </div>
		      </div>
		      <!-- end recent posts -->
		      <div class="one_half last">
		        <div class="popular-posts-area">
		        	<?php get_template_part('loop/content', 'postpopular'); ?>
		        </div>
		      </div>
		      <!-- end popular posts -->
		      <div class="clearfix divider_line"></div>
		      <?php comments_template(); ?>
		      
		      <!-- end comment form -->
		      <div class="clearfix mar_top2"></div>
		    </div>
		    <div class="right_sidebar">
		    	<?php get_sidebar( 'right' ); ?>
		    </div>
		    <!-- right sidebar starts -->
		    <?php endif ?>
		<?php endif ?>

		<?php if (isset($liwo['blog_page_layout'])): ?>
		    <?php if ($liwo['blog_page_layout']=='fulwidth'): ?>
			    <div class="content_fullwidth">
			      <div class="blog_post">
			        <div class="blog_postcontent">
			          	<?php if(has_post_thumbnail()){ ?>
				          <div class="image_frame">
				          	<a href="#">
				          		<?php
				          			global $post;
									$img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
									echo '<img src="'.$img_url[0].'" />';
				          		?>
				          	</a>
				          </div>
				    	<?php } ?>
			          <a href="<?php the_permalink(); ?>" class="date"><strong><?php the_time( 'd' ); ?></strong><i><?php the_time( 'F' ); ?></i></a>
			          <h3><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h3>
			          <?php get_template_part('loop/content', 'metapost'); ?>
			          <div class="post_info_content">
			            <?php the_content( ); ?>
			          </div>
			        </div>
			      </div>
			      <!-- /# end post -->
			      <div class="clearfix divider_line"></div>
			      <?php get_template_part('content-parts/single', 'social' ); ?>
			      <!-- end share post links -->
			      <div class="clearfix"></div>
			      <h4><i><?php echo __('About the Author', 'themestudio'); ?></i></h4>
			      <div class="about_author"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>  <?php the_author_posts_link(); ?><br />
			      	<?php the_author_meta('description'); ?>
			      </div>
			      <!-- end about author -->
			      <div class="clearfix mar_top5"></div>
			      <div class="one_half">
			        <div class="popular-posts-area">
			          <?php get_template_part('loop/content', 'postrecent'); ?>
			        </div>
			      </div>
			      <!-- end recent posts -->
			      <div class="one_half last">
			        <div class="popular-posts-area">
			        	<?php get_template_part('loop/content', 'postpopular'); ?>
			        </div>
			      </div>
			      <!-- end popular posts -->
			      <div class="clearfix divider_line"></div>
			      <?php if(comments_open()) comments_template(); ?>
			      
			      <!-- end comment form -->
			      <div class="clearfix mar_top2"></div>
			    </div>
		    <?php endif; ?>
		<?php else : ?>
			<div class="content_fullwidth">
		      <div class="blog_post">
		        <div class="blog_postcontent">
		          	<?php if(has_post_thumbnail()){ ?>
			          <div class="image_frame">
			          	<a href="#">
							<?php
			          			global $post;
								$img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
								echo '<img src="'.$img_url[0].'" />';
			          		?>
			          	</a>
			          </div>
			    	<?php } ?>
		          <a href="<?php the_permalink(); ?>" class="date"><strong><?php the_time( 'd' ); ?></strong><i><?php the_time( 'F' ); ?></i></a>
		          <h3><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h3>
		          <?php get_template_part('loop/content', 'metapost'); ?>
		          <div class="post_info_content">
		            <?php the_content( ); ?>
		          </div>
		        </div>
		      </div>
		      <!-- /# end post -->
		      <div class="clearfix divider_line"></div>
		      <?php get_template_part('content-parts/single', 'social' ); ?>
		      <!-- end share post links -->
		      <div class="clearfix"></div>
		      <h4><i><?php echo __('About the Author', 'themestudio'); ?></i></h4>
		      <div class="about_author"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>  <?php the_author_posts_link(); ?><br />
		      	<?php the_author_meta('description'); ?>
		      </div>
		      <!-- end about author -->
		      <div class="clearfix mar_top5"></div>
		      <div class="one_half">
		        <div class="popular-posts-area">
		          <?php get_template_part('loop/content', 'postrecent'); ?>
		        </div>
		      </div>
		      <!-- end recent posts -->
		      <div class="one_half last">
		        <div class="popular-posts-area">
		        	<?php get_template_part('loop/content', 'postpopular'); ?>
		        </div>
		      </div>
		      <!-- end popular posts -->
		      <div class="clearfix divider_line"></div>
		      <?php if(comments_open()) comments_template(); ?>
		      
		      <!-- end comment form -->
		      <div class="clearfix mar_top2"></div>
		    </div>
		<?php endif; ?>
	</div>
  
<?php
	
	get_footer(); ?>