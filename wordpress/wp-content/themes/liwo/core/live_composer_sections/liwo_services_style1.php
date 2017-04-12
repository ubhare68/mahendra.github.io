<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Services_Block1" );')
);

class Liwo_Services_Block1 extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Services_Block1';
    var $module_title = 'Services 1';
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
				'label' => 'Services 1 Services Layout',
				'id' => 'services-layout',
				'std' => '6',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '6 columns',
						'value' => '6'
					),
					
					array(
						'label' => '4 columns',
						'value' => '4'
					),
					
					array(
						'label' => '2 columns',
						'value' => '2'
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
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_main_font-weight',
				'std' => 'normal',
				'type' => 'text',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.fusection3 .sec1 h5 b',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
			),
			array(
				'label' => 'Container class',
				'id' => 'container_class',
				'std' => 'container',
				'type' => 'text',
				'section' => 'styling'
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
				'label' => __( '  Margin Bottom', 'dslc_string' ),
				'id' => 'css_icon_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_style1',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
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

		$columns3 = $options['services-layout'];
		// General args
		$args3 = array(
			    'post_type' => 'service',
			    'posts_per_page' => $columns3,
			);

		// Category args
		if ( isset( $options['services-cats'] ) && $options['services-cats'] !== '' ) {
			$terms = explode( ' ', $options['services-cats']);
			$args3['tax_query'] = array(
				array(
					'taxonomy' => 'service-category',
					'field' => 'id',
					'terms' => $terms,
					'operator' => 'IN',
				)
			);
		}
		
		if ($columns3):
			$type3 	  = 1;
			
			$loop3 = new WP_Query( $args3);
		?>
				
			<div class="liwo <?php echo $options['container_class']; ?> fusection3 liwo_style1">
			    <div class="container">
			      	<?php while ( $loop3->have_posts() ) : $loop3->the_post(); ?>
				      	<?php if($type3%2==1): ?>
				      		<div class="sec1 <?php if($type3==($columns3-1)) echo 'last'; ?>"> 
				      			<i class="fa <?php echo get_post_meta( get_the_id(), "liwo_service_select_icon", true ); ?>"></i>
				      			<h5>
				      				<?php if ($options['services_readmore']==1): ?>
				      					<?php if (get_post_meta( get_the_id(), "liwo_services_url", true )): ?>
				      						<a href="<?php echo get_post_meta( get_the_id(), "liwo_services_url", true ); ?>"><?php the_title( ); ?></a>
				      					<?php else: ?>
				      						<a href="<?php echo get_permalink( ); ?>"><?php the_title( ); ?></a>
				      					<?php endif ?>
				      				<?php else: ?>
				      					<?php the_title( ); ?> 
				      				<?php endif ?>
				      				<b><?php echo get_post_meta( get_the_id(), "liwo_sub_title", true ); ?></b>
				      			</h5>
				      			<?php the_excerpt(); ?>
				      	<?php endif; ?>
				      	<?php if($type3%2==0 || $type3==$columns3): ?>
				      			<br />
					        	<br />
					        	<i class="fa <?php echo get_post_meta( get_the_id(), "liwo_service_select_icon", true ); ?>"></i>
					        	<h5>
					        		<?php if ($options['services_readmore']==1): ?>
				      					<?php if ($options['services_link_custom']): ?>
				      						<a href="<?php echo get_post_meta( get_the_id(), "liwo_services_url", true ); ?>"><?php the_title( ); ?></a>
				      					<?php else: ?>
				      						<a href="<?php echo get_permalink( ); ?>"><?php the_title( ); ?></a>
				      					<?php endif ?>
				      				<?php else: ?>
				      					<?php the_title( ); ?> 
				      				<?php endif ?>
					        		<b><?php echo get_post_meta( get_the_id(), "liwo_sub_title", true ); ?></b>
					        	</h5>
					        	<?php the_excerpt(); ?>
					        </div>
				      	<?php endif; ?>
				      	<?php $type3++; ?>
			    	<?php endwhile; wp_reset_query(); wp_reset_postdata(); ?>
			    	<?php if($type3%2==0) echo '</div>'; ?>
			    </div>
			</div>
		<?php else : ?>
			<div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
		<?php endif; ?>

	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}