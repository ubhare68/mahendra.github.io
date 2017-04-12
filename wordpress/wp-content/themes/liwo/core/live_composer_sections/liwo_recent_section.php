<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Recent_Posts" );')
);

class Liwo_Recent_Posts extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Recent_Posts';
    var $module_title = 'Recent Posts';
    var $module_icon = 'list';
    var $module_category = 'Liwo - Section';


 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
   			array(
				'label' => 'Recent Posts - Number Post',
				'id' => 'number_post',
				'std' => '4',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '6 Posts',
						'value' => '6'
					),
					
					array(
						'label' => '4 Posts',
						'value' => '4'
					),
					
					array(
						'label' => '2 Posts',
						'value' => '2'
					),
				)
			),
			
    		array(
			    'id'       	=> 'post_title',
			    'type'     	=> 'text',
			    'label'    	=> 'Block Title',
			    'std'  		=> 'Recent posts',
			),

			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'css_main_border_color',
				'std' => '#E3E3E3',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.people_says',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_main_border_style',
				'std' => 'dashed',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.people_says',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'none', 'dslc_string' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'solid', 'dslc_string' ),
						'value' => 'solid'
					),
					array(
						'label' => __( 'dotted', 'dslc_string' ),
						'value' => 'dotted'
					),
					array(
						'label' => __( 'dashed', 'dslc_string' ),
						'value' => 'dashed'
					),
					array(
						'label' => __( 'double', 'dslc_string' ),
						'value' => 'double'
					),
				),
			),
			array(
				'label' => __( 'Border Top Width', 'dslc_string' ),
				'id' => 'css_main_border_width_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.people_says',
				'affect_on_change_rule' => 'border-top-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border right Width', 'dslc_string' ),
				'id' => 'css_main_border_width_right',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.people_says',
				'affect_on_change_rule' => 'border-right-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Bottom Width', 'dslc_string' ),
				'id' => 'css_main_border_width_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.people_says',
				'affect_on_change_rule' => 'border-bottom-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Left Width', 'dslc_string' ),
				'id' => 'css_main_border_width_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.people_says',
				'affect_on_change_rule' => 'border-left-width',
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
		 * Create column class
		*/
		$slider_id = rand(1,1000);
		
		$number_post  = $options['number_post'];
		
		?>
		<div class="liwo bottom_section">
			<div class="one_half">
		        <div class="testimonials">
		          	<div class="people_says_main">
			            <h2><?php echo $options['post_title']; ?></h2>
			            <div class="people_says blogposts">
			              	<ul id="mycarousel<?php echo $slider_id; ?>" class="jcarousel-skin-tango">
				                <?php
									$recent_posts = wp_get_recent_posts( 'numberposts='.$number_post );
									foreach( $recent_posts as $recent ){
								?>
								    <li>
					                  	<div class="picture">
					                  		<?php //if(has_post_thumbnail($recent['ID'])){ ?>
							                    <?php //the_post_thumbnail( $recent['ID'],array(50,50) ); ?>
							                    <?php echo get_the_post_thumbnail( $recent["ID"], array('140','140') ); ?>
							                <?php //} ?>
					                  	</div>
					                  	<h4><a href="<?php echo get_permalink($recent["ID"]); ?>"><?php echo $recent["post_title"]; ?></a> <i><?php echo get_the_time( 'F d, Y', $recent['ID'] ); ?> - <a href="<?php echo get_the_author_link(); ?>"><?php the_author( ); ?></a></i></h4>
					                  	<?php 
					                  		if($recent['post_excerpt']){
					                  			echo wpautop(wp_trim_words($recent['post_excerpt'], 15, ''));
					                  		} else {
					                  			echo wpautop(wp_trim_words($recent['post_content'], 15, ''));
					                  		}
					                  	?>
					                  	<a href="<?php echo get_permalink($recent["ID"]); ?>" class="more3">Read More</a>
									</li>
								<?php }	?>
			             	</ul>
			            </div>
		          	</div>
		        </div>
		    </div>
		</div>
		
		<script type="text/javascript">

			jQuery(document).ready(function() {
				jQuery('#mycarousel<?php echo $slider_id; ?>').jcarousel();
			});
			
		</script>
		
		<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}