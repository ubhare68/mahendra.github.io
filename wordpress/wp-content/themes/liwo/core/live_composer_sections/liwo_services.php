<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Services_Block" );')
);

class Liwo_Services_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Services_Block';
    var $module_title = 'Services 0';
    var $module_icon = 'cogs';
    var $module_category = 'Liwo - Section';


 	// Module Options
    function options() { 
    	global $ts_icon_hover;
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
				'label' => 'Services 0 - Services Layout',
				'id' => 'services-layout',
				'std' => '4',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '2 columns',
						'value' => '2'
					),
					array(
						'label' => '3 columns',
						'value' => '3'
					),
					
					array(
						'label' => '4 columns',
						'value' => '4'
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
					),
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
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'button_css_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-services',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'button_css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-services',
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

			/*
			 * Responsive css_res_t
			*/
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_t',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_res_t_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-services',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-services',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( ' Icon Margin Left', 'dslc_string' ),
				'id' => 'css_res_t_icon_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection1 .one_fourth i',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Icon Margin Right', 'dslc_string' ),
				'id' => 'css_res_t_icon_margin_right',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection1 .one_fourth i',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Float', 'dslc_string' ),
				'id' => 'css_res_t_float',
				'std' => 'none',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection1 .one_fourth i',
				'affect_on_change_rule' => 'float',
				'choices' => array(
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
				),
				'section' => 'responsive',
				'tab' => 'tablet',
			),

			/*
			 * Responsive css_res_p
			*/
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_p',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_res_p_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-services',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-services',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'phone',
			),

			array(
				'label' => __( 'Width', 'dslc_string' ),
				'id' => 'css_res_p_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.one_fourth',
				'affect_on_change_rule' => 'width',
				'section' => 'styling',
				'ext' => '%',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( ' Icon Margin Left', 'dslc_string' ),
				'id' => 'css_res_p_icon_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection1 .one_fourth i',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Icon Margin Right', 'dslc_string' ),
				'id' => 'css_res_p_icon_margin_right',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection1 .one_fourth i',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Float', 'dslc_string' ),
				'id' => 'css_res_p_float',
				'std' => 'none',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection1 .one_fourth i',
				'affect_on_change_rule' => 'float',
				'choices' => array(
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
				),
				'section' => 'responsive',
				'tab' => 'phone',
			),

			/*
			 * Icon hover effects
			*/
			array(
				'label' => __( 'Icon Hover Style', 'dslc_string' ),
				'id' => 'css_icon_hover_class',
				'std' => '',
				'type' => 'select',
				'choices' => $ts_icon_hover,
				'section' => 'styling',
				'tab' => 'Icon Hover',
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

		// General args
		$args = array(
		    'post_type' => 'service',
		    'posts_per_page' => $columns
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
		
		$column_class = 'one_fourth';
		switch ($columns) {
			case '2':
				$column_class = 'one_half';
				break;
			
			case '3':
				$column_class = 'one_third';
				break;

			default:
				# code...
				break;
		}

		if ($columns) {
			$dem 	 = 1;

			$loop = new WP_Query( $args);
		?>
				<div class="liwo <?php echo $options['container_class']; ?> liwo-services fusection1">
					<?php

					?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					    <div class="<?php echo $column_class.' '; if($dem==$columns){ echo 'last'; } if(get_post_meta( get_the_id(), "liwo_service_helight_switch", true )=='1'){ echo ' helight'; } ?>"> 
					    	<div class="hi-icon-wrap hi-icon-effect-<?php echo $options['css_icon_hover_class']; ?> hi-icon-effect-<?php echo $options['css_icon_hover_class']; ?>a">
					    		<i class="fa <?php echo get_post_meta( get_the_id(), "liwo_service_select_icon", true ); ?> fa-4x"></i>
					    	</div>
					      	<div class="clearfix"></div>
					      	<h2><?php the_title( ); ?></h2>
					      	<?php the_excerpt(); ?>
					      	<?php if($options['services_readmore']==1): ?>
								<?php if ($options['services_link_custom']): ?>

									<a href="<?php echo get_post_meta( get_the_id(), "liwo_services_url", true ); ?>" class="more1">View Details</a>

								<?php else: ?>

									<a href="<?php echo get_permalink( ); ?>" class="more1">View Details</a>
								<?php endif ?>
					  		<?php endif; ?>
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