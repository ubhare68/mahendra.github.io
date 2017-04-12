<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Title_Block" );')
);

class Liwo_Title_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Title_Block';
    var $module_title = 'Title';
    var $module_icon = 'font';
    var $module_category = 'Liwo - Block';
 
 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'Title',
				'id' => 'title',
				'std' => 'Section <strong>title</strong>',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => 'Sub Title',
				'id' => 'sub_title',
				'std' => 'Lorem ipsum dolor sit amet',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => __( 'Image Backgournd', 'themestudio' ),
				'id' => 'image_bg',
				'std' => get_template_directory_uri().'/assets/images/liwo-img3.png',
				'type' => 'image',
			),
			array(
				'label' => __( 'Status', 'themestudio' ),
				'id' => 'status_switch',
				'std' => 'sub_title',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Sub Title', 'themestudio' ),
						'value' => 'sub_title'
					)
					,array(
						'label' => __( 'Image Background', 'themestudio' ),
						'value' => 'image_bg'
					),
				),
				'section' => 'functionality',
			),

			/**
			 * Heading 3
			 */

			array(
				'label' => __( ' BG Color', 'themestudio' ),
				'id' => 'css_h3_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Border Color', 'themestudio' ),
				'id' => 'css_h3_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Border Width', 'themestudio' ),
				'id' => 'css_h3_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Borders', 'themestudio' ),
				'id' => 'css_h3_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'themestudio' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'themestudio' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Border Radius - Top', 'themestudio' ),
				'id' => 'css_h3_border_radius_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'themestudio' ),
				'id' => 'css_h3_border_radius_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Color', 'themestudio' ),
				'id' => 'css_h3_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Font Size', 'themestudio' ),
				'id' => 'css_h3_font_size',
				'std' => '35',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'h3',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'themestudio' ),
				'id' => 'css_h3_font_weight',
				'std' => '300',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'h3',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'themestudio' ),
				'id' => 'css_h3_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'h3',
			),
			array(
				'label' => __( 'Line Height', 'themestudio' ),
				'id' => 'css_h3_line_height',
				'std' => '27',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => 'h3',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'themestudio' ),
				'id' => 'css_h3_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => 'h3',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Vertical', 'themestudio' ),
				'id' => 'css_h3_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Padding Horizontal', 'themestudio' ),
				'id' => 'css_h3_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'h3'
			),
			array(
				'label' => __( 'Text Align', 'themestudio' ),
				'id' => 'css_h3_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title h3',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'tab' => 'h3',
				'choices' => array(
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'themestudio' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right',
					),
				)
			),

			/*
			 * Sub title
			*/
			array(
				'label' => __( 'Text Align', 'themestudio' ),
				'id' => 'css_h6_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title p',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'tab' => 'Sub Title',
				'choices' => array(
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'themestudio' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right',
					),
				)
			),
			array(
				'label' => __( 'Margin Bottom', 'themestudio' ),
				'id' => 'css_h6_margin_bottom',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title p',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => 'Sub Title',
				'ext' => 'px'
			),

			/*
			 * Image Background
			*/
			array(
				'label' => __( 'Text Align', 'themestudio' ),
				'id' => 'css_img_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title .liwo-title-block-image',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'tab' => 'Image',
				'choices' => array(
					array(
						'label' => __( 'Left', 'themestudio' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'themestudio' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'themestudio' ),
						'value' => 'right',
					),
				)
			),
			array(
				'label' => __( 'Margin Bottom', 'themestudio' ),
				'id' => 'css_img_margin_bottom',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title .liwo-title-block-image',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => 'Image',
				'ext' => 'px'
			),
			array(
				'label' => __( ' Margin Left', 'dslc_string' ),
				'id' => 'css_icon_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( '  Margin Right', 'dslc_string' ),
				'id' => 'css_icon_margin_right',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( '  Margin Top', 'dslc_string' ),
				'id' => 'css_icon_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( '  Margin Bottom', 'dslc_string' ),
				'id' => 'css_icon_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo-title',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px'
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
		
		<div class="liwo-title">
			<?php if($options['title']): ?>
				<h3><?php echo $options['title']; ?></h3>
			<?php endif; ?>
			<?php if ($options['status_switch']): ?>
				<?php if ($options['sub_title']): ?>
					<?php $kt2 = strpos($options['status_switch'],'sub_title'); ?>
					<?php if ($kt2 !== false): ?>
						<p><?php echo $options['sub_title']; ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($options['image_bg']): ?>
					<?php $kt3 = strpos($options['status_switch'],'image_bg'); ?>
					<?php if ($kt3 !== false): ?>
						<div class="liwo-title-block-image">
							<img src="<?php echo $options['image_bg']; ?>" alt="">
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php else : ?>
				<div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
			<?php endif; ?>
		</div>
	
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}