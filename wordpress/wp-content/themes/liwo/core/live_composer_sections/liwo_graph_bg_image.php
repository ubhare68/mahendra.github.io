<?php

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Graph_Background_Image" );')
);

class Liwo_Graph_Background_Image extends DSLC_Module {

	var $module_id = 'Liwo_Graph_Background_Image';
	var $module_title = 'Graph Background Image';
	var $module_icon = 'picture';
	var $module_category = 'Liwo - Misc';

	function options() {	

		$dslc_options = array(

			array(
				'label' => __( 'Graph Back ground Image', 'dslc_string' ),
				'id' => 'image',
				'std' => '',
				'type' => 'image',
				'refresh_on_change' => true,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'background-image',
				'section' => 'styling',
			),

			/**
			 * Styling
			 */

			array(
				'label' => __( 'Background position', 'dslc_string' ),
				'id' => 'css_background_position',
				'std' => 'center center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'background-position',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __('Top Left', 'dslc_string'),
						'value' => 'left top'
						),
					array(
						'label' => __('Top Right', 'dslc_string'),
						'value' => 'right top'
						),
					array(
						'label' => __('Top Center', 'dslc_string'),
						'value' => 'center top'
						),
					array(
						'label' => __('Center Left', 'dslc_string'),
						'value' => 'left center'
						),
					array(
						'label' => __('Center Right', 'dslc_string'),
						'value' => 'right center'
						),
					array(
						'label' => __('Center', 'dslc_string'),
						'value' => 'center center'
						),
					array(
						'label' => __('Bottom Left', 'dslc_string'),
						'value' => 'left bottom'
						),
					array(
						'label' => __('Bottom Right', 'dslc_string'),
						'value' => 'right bottom'
						),
					array(
						'label' => __('Bottom Center', 'dslc_string'),
						'value' => 'center bottom'
						),
				)
			),
			array(
				'label' => __( 'Background repeat', 'dslc_string' ),
				'id' => 'css_background_repeat',
				'std' => 'no-repeat',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'background-repeat',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __('Repeat','dslc_string'),
						'value' => 'repeat'
					),
					array(
						'label' => __('Repeat Horizontal','dslc_string'),
						'value' => 'repeat-x'
					),
					array(
						'label' => __('Repeat Vertical','dslc_string'),
						'value' => 'repeat-y'
					),
					array(
						'label' => __('Do NOT Repeat','dslc_string'),
						'value' => 'no-repeat'
					),
				)
			),
			array(
				'label' => __( 'Background Color', 'dslc_string' ),
				'id' => 'css_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Graph height', 'dslc_string' ),
				'id' => 'css_height',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'height',
				'section' => 'styling',
				'ext' => 'px',
				'max' => '100',
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'min' => '-200',
				'max' => '200',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'min' => '-200',
				'max' => '200',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
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
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px'
			),

			/**
			 * Responsive Tablet
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
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
				'min' => -200,
				'max' => 200,
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
				'min' => -100,
				'max' => 200,
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
	
			/**
			 * Responsive Phone
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
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
				'min' => -200,
				'max' => 200,
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
				'min' => -100,
				'max' => 200,
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.curve_graph2',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),

		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {		

		$this->module_start( $options );

		/* Module output starts here */

			global $dslc_active;

			if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
				$dslc_is_admin = true;
			else
				$dslc_is_admin = false;

			?>

				<?php if ( empty( $options['image'] ) ) : ?>

					<div class="dslc-notification dslc-red"><?php _e( 'No image has been set yet, edit the module to set one.', 'dslc_string' ); ?></div>

				<?php else : ?>

					<div class="curve_graph2">&nbsp;</div>

				<?php endif; ?>

	<?php

		/* Module output ends here */

		$this->module_end( $options );

	}

}