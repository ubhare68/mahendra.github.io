<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Process_Block" );')
);

class Liwo_Process_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Process_Block';
    var $module_title = 'Circle Image';
    var $module_icon = 'font';
    var $module_category = 'Liwo - Misc';
 
 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
			array(
				'label' => __('Circle Image - Title', 'themestudio'),
				'id' => 'text_title',
				'std' => 'User Research',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Image',
				'id' => 'image',
				'std' => get_template_directory_uri().'/assets/images/liwo-img7.jpg',
				'type' => 'image',
				'section' => 'functionality'
			),
			array(
				'label' => __( 'Enable/Disable Image', 'themestudio' ),
				'id' => 'custom_switch_image',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'themestudio' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'themestudio' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Enable/Disable Text', 'themestudio' ),
				'id' => 'custom_switch_text',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'themestudio' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'themestudio' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Enable/Disable Fancybox', 'themestudio' ),
				'id' => 'custom_switch_fancybox',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'themestudio' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'themestudio' ),
						'value' => 'disabled'
					),
				),
				'section' => 'functionality',
			),

			/*
			 * Block Style
			*/
			array(
				'label' => __( 'Block Margin Left', 'themestudio' ),
				'id' => 'css_block_margin_left',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'styling',
				'min' => 0,
				'max' => 800,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Block Margin Top', 'themestudio' ),
				'id' => 'css_block_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'min' => 0,
				'max' => 800,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Block Text Align', 'themestudio' ),
				'id' => 'css_block_text_align',
				'std' => 'center',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Center', 'themestudio' ),
						'value' => 'center'
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right'
					),
				),
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Block Width', 'themestudio' ),
				'id' => 'css_block_width',
				'std' => '308',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'max-width',
				'section' => 'styling',
				'min' => 100,
				'max' => 500,
				'ext' => 'px',
			),

			array(
				'label' => __( 'Blocl Float', 'themestudio' ),
				'id' => 'css_block_float',
				'std' => 'left',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'None', 'themestudio' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right'
					),
				),
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'float',
				'section' => 'styling',
			),


			/*
			 * Image Style
			*/
			array(
				'label' => __( ' Margin Bottom', 'themestudio' ),
				'id' => 'css_block_image_margin_bottom',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Image',
			),
			array(
				'label' => __( ' Border Radius', 'themestudio' ),
				'id' => 'css_block_image_border-radius',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => '%',
				'tab' => 'Image',
			),
			array(
				'label' => __( ' Float', 'themestudio' ),
				'id' => 'css_block_image_float',
				'std' => 'left',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'None', 'themestudio' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right'
					),
				),
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'float',
				'section' => 'styling',
				'tab' => 'Image',
			),

			/*
			 * Text Style
			*/
			array(
				'label' => __( 'Color', 'themestudio' ),
				'id' => 'css_block_text_color',
				'std' => '#272727',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_text h3',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Text',
			),
			array(
				'label' => __( 'Font Size', 'themestudio' ),
				'id' => 'css_block_text_font_size',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_text h3',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Text',
			),
			array(
				'label' => __( 'Line Height', 'themestudio' ),
				'id' => 'css_block_text_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_text h3',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Text',
			),
			array(
				'label' => __( 'Margin Bottom', 'themestudio' ),
				'id' => 'css_block_text_margin_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_text h3',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Text',
			),

			/*
			 * Fancybox
			*/
			array(
				'label' => __('Fancybox Url(Link website or link video youtube/vimeo)', 'themestudio'),
				'id' => 'fancybox_url',
				'std' => '',
				'type' => 'textarea',
				'tab' => 'Fancybox',
			),

			/*
			 * Tablet
			 * Responsive css_res_t
			*/
			array(
				'label' => __( 'Responsive', 'themestudio' ),
				'id' => 'css_res_t',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'themestudio' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'themestudio' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( ' Margin Left', 'themestudio' ),
				'id' => 'css_res_t_margin_left',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'responsive',
				'tab' => 'tablet',
				'min' => 0,
				'max' => 800,
				'ext' => 'px',
			),
			array(
				'label' => __( ' Margin Top', 'themestudio' ),
				'id' => 'css_res_t_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'tab' => 'tablet',
				'min' => 0,
				'max' => 800,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Width', 'themestudio' ),
				'id' => 'css_res_t_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'max-width',
				'section' => 'responsive',
				'tab' => 'tablet',
				'min' => 0,
				'max' => 300,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Height', 'themestudio' ),
				'id' => 'css_res_t_height',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'max-height',
				'section' => 'responsive',
				'tab' => 'tablet',
				'min' => 0,
				'max' => 300,
				'ext' => 'px',
			),


			/*
			 * Phone
			 * Responsive css_res_p
			*/
			array(
				'label' => __( 'Responsive', 'themestudio' ),
				'id' => 'css_res_p',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'themestudio' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'themestudio' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( ' Margin Left', 'themestudio' ),
				'id' => 'css_res_p_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'responsive',
				'tab' => 'phone',
				'min' => 0,
				'max' => 800,
				'ext' => 'px',
			),
			array(
				'label' => __( ' Margin Top', 'themestudio' ),
				'id' => 'css_res_p_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'tab' => 'phone',
				'min' => 0,
				'max' => 800,
				'ext' => 'px',
			),
			array(
				'label' => __( 'Width', 'themestudio' ),
				'id' => 'css_res_p_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'max-width',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => '%',
			),
			array(
				'label' => __( 'Float', 'themestudio' ),
				'id' => 'css_res_p_float',
				'std' => 'none',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'None', 'themestudio' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block',
				'affect_on_change_rule' => 'float',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( ' Image Width', 'themestudio' ),
				'id' => 'css_res_p_image_width',
				'std' => '200',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'max-width',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
				'min' => 0,
				'max' => 300,
			),
			array(
				'label' => __( ' Image Height', 'themestudio' ),
				'id' => 'css_res_p_image_height',
				'std' => '200',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'max-height',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
				'min' => 0,
				'max' => 300,
			),
			array(
				'label' => __( ' Image Float', 'themestudio' ),
				'id' => 'css_res_p_image_float',
				'std' => 'none',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'None', 'themestudio' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_image img',
				'affect_on_change_rule' => 'float',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( ' Text Clear', 'themestudio' ),
				'id' => 'css_res_p_text_clear',
				'std' => 'both',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'None', 'themestudio' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Both', 'themestudio' ),
						'value' => 'both'
					),
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_process_block_text h3',
				'affect_on_change_rule' => 'clear',
				'section' => 'responsive',
				'tab' => 'phone',
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
	?>
		<?php if ($options['custom_switch_fancybox']=='enabled'): ?>
			<?php ts_fancybox(); ?>
		<?php endif ?>
		<div class="liwo_process_block">
			<?php if ($options['custom_switch_image']=='enabled'): ?>
				<?php if ($options['image']): ?>
					<div class="liwo_process_block_image">
						<?php if ($options['fancybox_url']): ?>
							<a class="fancybox fancybox-media fancybox.iframe" href="<?php echo $options['fancybox_url']; ?>" title="<?php echo $options['text_title']; ?>">
						<?php endif ?>
			    			<img src="<?php echo $options['image']; ?>" />
			    		<?php if ($options['fancybox_url']): ?>
							</a>
						<?php endif ?>
					</div>
				<?php endif ?>
			<?php endif ?>
			
			<?php if ($options['custom_switch_text']=='enabled'): ?>
				<?php if ($options['text_title']): ?>
					<div class="liwo_process_block_text">
						<h3><?php echo $options['text_title']; ?></h3>
					</div>
				<?php endif ?>
			<?php endif ?>
			
		</div>
	
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}