<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Services_Block4" );')
);

class Liwo_Services_Block4 extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Services_Block4';
    var $module_title = 'Services 4';
    var $module_icon  = 'cogs';
    var $module_category = 'Liwo - Section';


 	// Module Options
    function options() { 
		// Get categories
		$cats = get_categories('taxonomy=service-category');
		$cats_choices = array();

		// Generate usable array of categories
		foreach ( $cats as $cat ) {
			$cats_choices[] = array(
				'label' => $cat->name,
				'value' => $cat->cat_ID
			);
		}
		wp_reset_postdata();
		wp_reset_query();


    	// The options array
    	$dslc_options = array(
   			array(
				'label' => 'Services 4 - Services Per Rown',
				'id' => 'services-rown',
				'std' => '3',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '4',
						'value' => '4'
					),
					array(
						'label' => '3',
						'value' => '3'
					),
					array(
						'label' => '2',
						'value' => '2'
					),
				)
			),
			array(
				'label' => 'Services Per Column',
				'id' => 'services-column',
				'std' => '3',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '4',
						'value' => '4'
					),
					array(
						'label' => '3',
						'value' => '3'
					),
				)
			),
			array(
				'label' => 'Services Categories',
				'id' => 'services-cats',
				'std' => '',
				'type' => 'checkbox',
				'choices' => $cats_choices,
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
			    'id'       	=> 'services_readmore',
			    'type'     	=> 'select',
			    'label'    	=> 'Show/Hidden Read More',
			    'std'  		=> '0',
			    'choices'  	=>  array(
    				array(
    					'label' => 'Show',
    					'value' => '1'
    				),
    				array(
    					'label' => 'Hidden',
    					'value' => '0'
    				)
    			),
			),
			array(
			    'id'       	=> 'services_link_custom',
			    'type'     	=> 'select',
			    'label'    	=> 'Link Services',
			    'std'  		=> '1',
			    'choices'  	=>  array(
					array(
						'label' => 'Link Services',
						'value' => '0'
					),
					array(
						'label' => 'Link Custom',
						'value' => '1'
					),
				),
			),
			array(
				'label' => __( '  Margin Bottom', 'dslc_string' ),
				'id' => 'css_icon_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_style4',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => 'Container class',
				'id' => 'container_class',
				'std' => 'container',
				'type' => 'text',
				'section' => 'styling'
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
		
		//REQUIRED
		$this->module_start( $options );
		
		$services_active = '';
		if ( $dslc_active )
			$services_active .= 'helight';
		
		
		/**
		 * Create column class for services
		*/
		
			$columns 	= (int)$options['services-column'];
			$rowns		= (int)$options['services-rown'];
			switch ($columns) {
				case '3':
					$class_column = 'one_third';
					$class_main   = 'get_features';
				break;
				default:
					$class_column = 'one_fourth';
					$class_main   = 'get_features';
				break;
			}

		// General args
		$posts_per_page = $columns*$rowns;
		$args = array(
		    'post_type' => 'service',
		    'posts_per_page' => $posts_per_page,
		    'order' => $options['order'],
			'orderby' => $options['orderby'],
		);

		// Category args
		if ( isset( $options['services-cats'] ) && $options['services-cats'] !== '' ) {
			$terms = explode( ' ', $options['services-cats']);
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'service-category',
					'field' => 'id',
					'terms' => $terms,
					'operator' => 'IN',
				)
			);
		}

		$last = '';

		if ($posts_per_page) {
			$dem 	 = 1;
			
			$loop = new WP_Query( $args); 
		?>
			<div class="liwo_style4 <?php echo $options['container_class']; ?> <?php echo $class_main; ?>">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php if($dem==($posts_per_page - $rowns)){ $last = 'last'; } ?>
			        <?php if($dem%$rowns==1): ?>
			        	<div class="<?php echo $class_column; ?> <?php echo $last; ?>">
			        <?php endif; ?>
			        		<ul class="get_features_list">
					            <li class="left"><i class="fa <?php echo get_post_meta( get_the_id(), "liwo_service_select_icon", true ); ?> fa-2x"></i></li>
					            <li class="right">
					              <h5><?php the_title( ); ?></h5>
					              <?php the_excerpt(); ?>
					            </li>
					            <?php if($options['services_readmore']==1): ?>
					          		<?php if ($options['services_link_custom']): ?>
					          			<li><a href="<?php echo get_post_meta( get_the_id(), "liwo_services_url", true ); ?>">Read More <i class="fa fa-angle-right"></i></a></li>
					          		<?php else: ?>
					          			<li><a href="<?php echo get_permalink( ); ?>">Read More <i class="fa fa-angle-right"></i></a></li>
					          		<?php endif; ?>
					          	<?php endif; ?>
				          	</ul>
			        <?php if($dem==$posts_per_page || $dem%$rowns==0): ?>
			        	</div>
			        <?php endif; ?>
				    <?php $dem++; ?>
			  	<?php endwhile; wp_reset_query(); wp_reset_postdata(); ?>
		    </div>
		<?php } else { ?>
			<div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
		<?php } ?>

	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}