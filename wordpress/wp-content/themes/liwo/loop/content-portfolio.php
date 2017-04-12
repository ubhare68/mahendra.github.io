<?php $meta = get_post_meta($post->ID); ?>
  <div class="content_fullwidth">
      <div class="portfolio_area">
        
        <?php switch ($meta['liwo_portfolio_type'][0]) {
          case 'image':
            get_template_part( 'portfolio-formats/format', 'image' );
          break;

          case 'slider':
            get_template_part( 'portfolio-formats/format', 'gallery' );
          break;

          case 'video':
            get_template_part( 'portfolio-formats/format', 'video' );
          break;

          case 'soundcloud':
            get_template_part( 'portfolio-formats/format', 'audio' );
          break;
          
          default:
            echo '<div class="portfolio_area_left">&nbsp;</div>';
            the_content( );
          break;
        } ?>

        <div class="portfolio_area_right">
          <h3><i><?php echo __('Project Description', 'themestudio'); ?></i></h3>
          <?php the_excerpt(); ?>
          
	      <?php if( function_exists('themestudio_like') ) : ?>
				  <span class="addto_favorites"><?php themestudio_like(); ?></span> 
			  <?php endif; ?>

			<?php get_template_part('content-parts/portfolio', 'social'); ?>

          <div class="project_details">
            <h4><b>Project Details</b></h4>
            <span><strong><?php echo __('Date', 'themestudio') ?></strong> <em><?php the_time( get_option( 'date_format' ) ); //the_time('d F Y'); ?></em></span> 


            <span>
              <strong>Categories</strong> 
              <em>

                <?php
                  $taxonomy = 'dslc_projects_cats';
                  $post_id  = (int)get_the_id();

                  // get the term IDs assigned to post.
                  $post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
                  // separator between links
                  $separator = ', ';

                  if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {
                    $term_ids = implode( ',' , $post_terms );

                    $args = array(
                      'orderby'                  => 'name',
                      'order'                    => 'ASC',
                      'include'                  => $term_ids,
                      'taxonomy'                 => $taxonomy,

                    );

                    $categories = get_categories( $args );
                    foreach ( $categories as $category ) {
                      echo '<a href="' . get_term_link( (int)$category->term_id, $taxonomy ) . '">' . $category->name . '</a><br/>';
                    }
                  }

                  wp_reset_query();
                  wp_reset_postdata();
                ?>

            	</em>
            </span> 
            <span><strong>Author</strong> <em><?php the_author(); ?></em></span>
            <div class="clearfix mar_top3"></div>
            <?php if (isset($meta['liwo_portfolio_url'][0])) { ?>
              <a href="<?php  echo $meta['liwo_portfolio_url'][0];  ?>" class="but_goback"><i class="fa fa-hand-o-right fa-lg"></i> Visit Site</a>
              <?php } ?>
            </div>
        </div>
      </div>
      <!-- end section -->
    </div>