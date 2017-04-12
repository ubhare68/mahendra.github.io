<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Team_Section" );')
);

class Liwo_Team_Section extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Team_Section';
    var $module_title = 'Team';
    var $module_icon  = 'user';
    var $module_category = 'Liwo - Section';
 
 	// Module Options
    function options() { 
		// Get categories
		$cats = get_categories('taxonomy=dslc_staff_cats');
		$cats_choices = array();

		// Generate usable array of categories
		foreach ( $cats as $cat ) {
			$cats_choices[] = array(
				'label' => $cat->name,
				'value' => $cat->term_id
			);
		}
		
		
    	// The options array
    	$dslc_options = array(
    		array(
    			'label' => 'Team - Columns',
    			'id' => 'amount',
    			'std' => '4',
    			'type' => 'select',
                'choices' => array(
                    array(
                        'label' => __( '1 Column', 'dslc_string' ),
                        'value' => '1',
                    ),
                    array(
                        'label' => __( '2 Columns', 'dslc_string' ),
                        'value' => '2',
                    ),
                    array(
                        'label' => __( '3 Columns', 'dslc_string' ),
                        'value' => '3',
                    ),
                    array(
                        'label' => __( '4 Columns', 'dslc_string' ),
                        'value' => '4',
                    ),
                ),
    		),
            array(
                'label' => 'Post Per Page',
                'id' => 'posts_per_page',
                'std' => '4',
                'type' => 'text',
            ),
    		array(
    			'label' => 'Categories',
    			'id' => 'categories',
    			'std' => '',
    			'type' => 'checkbox',
    			'choices' => $cats_choices
    		),
            array(
                'label' => __( 'Pagination', 'dslc_string' ),
                'id' => 'pagination_type',
                'std' => 'disabled',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Disabled', 'dslc_string' ),
                        'value' => 'disabled',
                    ),
                    array(
                        'label' => __( 'Numbered', 'dslc_string' ),
                        'value' => 'numbered',
                    )
                ),
            ),
    		array(
    			'label' => 'Order By',
    			'id' => 'orderby',
    			'std' => 'date',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'Publish Date',
    					'value' => 'date'
    				),
    				array(
    					'label' => 'Modified Date',
    					'value' => 'modified'
    				),
    				array(
    					'label' => 'Random',
    					'value' => 'rand'
    				),
    				array(
    					'label' => 'Alphabetic',
    					'value' => 'title'
    				),
    				array(
    					'label' => 'Comment Count',
    					'value' => 'comment_count'
    				),
    			)
    		),
    		array(
    			'label' => 'Order',
    			'id' => 'order',
    			'std' => 'DESC',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'Ascending',
    					'value' => 'ASC'
    				),
    				array(
    					'label' => 'Descending',
    					'value' => 'DESC'
    				)
    			)
    		),
    		array(
    			'label' => 'Offset',
    			'id' => 'offset',
    			'std' => '0',
    			'type' => 'text',
    		),
    	);

        $dslc_options = array_merge( $dslc_options, $this->animation_options );

    	// Return the array
    	return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

    }
 
 	// Module Output
    function output( $options ) {

    	global $dslc_active;
    	
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;

		$this->module_start( $options );
		
		// Fix for pagination
		if( is_front_page() ) { $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; } else { $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; }
		
		// General args
		$args = array(
			'paged' => $paged, 
			'post_type' => 'dslc_staff',
			'posts_per_page' => $options['posts_per_page'],
			'order' => $options['order'],
			'orderby' => $options['orderby'],
			'offset' => $options['offset']
		);

		// Category args
		if ( isset( $options['categories'] ) && $options['categories'] !== '' ) {
			$terms = explode( ' ', $options['categories']);
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'dslc_staff_cats',
					'field' => 'id',
					'terms' => $terms,
					'operator' => 'IN',
				)
			);
		}

		// Do the query
		$block_query = new WP_Query( $args );
        $dem         = 1;

        switch ($options['amount']) {
            case '1':
                $class_colums = 'one_full';
            break;
            case '2':
                $class_colums = 'one_half';
            break;
            case '3':
                $class_colums = 'one_third';
            break;
            case '5':
                $class_colums = 'one_fifth';
            break;
            default:
                $class_colums = 'one_fourth';
            break;
        }
        
        ?>
        	<div class="our_team_box_big">
    	<?php
        	if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
    			
    			/**
    			 * Get blog posts by blog layout.
    			 */
    			// get_template_part('loop/content', 'team_section');
                $large_image_url    = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $position           = get_post_meta( get_the_ID(), 'dslc_staff_position', true );
                $social_twitter     = get_post_meta( get_the_ID(), 'dslc_staff_social_twitter', true );
                $social_facebook    = get_post_meta( get_the_ID(), 'dslc_staff_social_facebook', true );
                $social_googleplus  = get_post_meta( get_the_ID(), 'dslc_staff_social_googleplus', true );
                $social_linkedin    = get_post_meta( get_the_ID(), 'dslc_staff_social_linkedin', true );
                $social_pinterest   = get_post_meta( get_the_ID(), 'dslc_staff_social_pinterest', true );
            ?>
                <div class="<?php echo $class_colums; ?> <?php if($dem%$options['amount']==0){ echo 'last'; } ?>">
                    <div class="cont-area">
                        <img src="<?php echo $large_image_url[0]; ?>" alt="" class="teammempic" />
                        <ul>
                            <li><strong><?php the_title( ); ?><i> - <?php echo $position; ?></i></strong></li>
                            <li><a href="<?php echo $social_facebook; ?>"><i class="fa fa-facebook fa-lg"></i></a></li>
                            <li><a href="<?php echo $social_twitter; ?>"><i class="fa fa-twitter fa-lg"></i></a></li>
                            <li><a href="<?php echo $social_googleplus; ?>"><i class="fa fa-google-plus fa-lg"></i></a></li>
                            <li><a href="<?php echo $social_linkedin; ?>"><i class="fa fa-linkedin fa-lg"></i></a></li>
                            <li><a href="<?php echo $social_pinterest ?>"><i class="fa fa-pinterest fa-lg"></i></a></li>
                        </ul>
                    </div>
                    <?php the_excerpt(); ?>
                </div>
            <?php
    		    $dem++;
    		endwhile;	
    		else : 
    			
    			/**
    			 * Display no posts message if none are found.
    			 */
    			get_template_part('loop/content','none');
    			
    		endif;
    	    echo '</div>';
        ?>
        
        <?php
	  	/**
	  	 * Post pagination, use ts_pagination() first and fall back to default
	  	 */
        if($options['pagination_type']=='numbered'){
            echo function_exists('ts_pagination') ? ts_pagination($block_query->max_num_pages) : posts_nav_link();
        }
	  	
	  	wp_reset_query();
        ?>
        <div class="clearfix"></div>
    
    <?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}