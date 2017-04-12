<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Services_Block2" );')
);

class Liwo_Services_Block2 extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Services_Block2';
    var $module_title = 'Services 2';
    var $module_icon = 'cogs';
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
				'label' => 'Services 2 - Number Services',
				'id' => 'services-layout',
				'std' => '4',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '2',
						'value' => '2'
					),
					array(
						'label' => '3',
						'value' => '3'
					),
					array(
						'label' => '4',
						'value' => '4'
					),
					array(
						'label' => '5',
						'value' => '5'
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
			    'std'  		=> '1',
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
				'affect_on_change_el' => '.liwo_style2',
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
		
			$columns = $options['services-layout'];
			switch ($columns) {
				case '2':
					$class_column = 'one_half';
					$class_center = '';
				break;
				case '3':
					$class_column = 'one_third';
					$class_center = '';
				break;
				case '4':
					$class_column = 'one_fourth';
					$class_center = ' two';
				break;
				default:
					$class_column = 'one_fifth';
					$class_center = '';
				break;
			}

		// General args
		$args = array(
			    'post_type' => 'service',
			    'posts_per_page' => $columns,
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

		if ($columns) {
			$dem 	 = 1;
		
			$loop = new WP_Query( $args); 
		?>
		<div class="service-container <?php echo $options['container_class']; ?>">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			    <div class="liwo_style2 <?php echo $class_column; ?> <?php if($dem==$columns){ echo 'last'; } ?>">
		          	<ul class="lirc_section">
		            	<li class="left<?php echo $class_center; ?>"><i class="fa <?php echo get_post_meta( get_the_id(), "liwo_service_select_icon", true ); ?> <?php if($options['services-layout'] == '4'): echo 'fa-2x'; else: echo 'fa-3x'; endif; ?>"></i></li>
		            	<li class="right<?php echo $class_center; ?>">
		              		<?php if ($options['services_readmore']==1): ?>
		              			<?php if ($options['services_link_custom']): ?>
		              				<h3><i><a href="<?php echo get_post_meta( get_the_id(), "liwo_services_url", true ); ?>"><?php the_title( ); ?></a></i></h3>
		              			<?php else: ?>
		              				<h3><i><a href="<?php echo get_permalink( ); ?>"><?php the_title( ); ?></a></i></h3>
		              			<?php endif ?>
		              		<?php else: ?>
		              			<h3><i><?php the_title( ); ?></i></h3>
		              		<?php endif ?>
		            	</li>
		            	<li class="right<?php echo $class_center; ?>"><?php the_excerpt(); ?></li>
		          </ul>
		        </div>
		        <!-- end section -->
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