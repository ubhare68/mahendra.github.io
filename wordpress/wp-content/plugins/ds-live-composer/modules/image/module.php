<?php

class DSLC_Image extends DSLC_Module {

	var $module_id = 'DSLC_Image';
	var $module_title = 'Image';
	var $module_icon = 'picture';
	var $module_category = 'elements';

	function options() {	

		$dslc_options = array(
				
			array(
				'label' => __( 'CT', 'dslc_string' ),
				'id' => 'custom_text',
				'std' => 'This is just some placeholder text. Click to edit it.',
				'type' => 'textarea',
				'visibility' => 'hidden'
			),

			array(
				'label' => __( 'Image', 'dslc_string' ),
				'id' => 'image',
				'std' => '',
				'type' => 'image',
			),
			array(
				'label' => __( 'Link Type', 'dslc_string' ),
				'id' => 'link_type',
				'std' => 'none',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none',
					),
					array(
						'label' => __( 'URL - Same Tab', 'dslc_string' ),
						'value' => 'url_same',
					),
					array(
						'label' => __( 'URL - New Tab', 'dslc_string' ),
						'value' => 'url_new',
					),
					array(
						'label' => __( 'Lightbox', 'dslc_string' ),
						'value' => 'lightbox',
					),
				)
			),
			array(
				'label' => __( 'Link - URL', 'dslc_string' ),
				'id' => 'link_url',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Link - Lightbox Image', 'dslc_string' ),
				'id' => 'link_lb_image',
				'std' => '',
				'type' => 'image',
			),
			array(
				'label' => __( 'Custom Text', 'dslc_string' ),
				'id' => 'custom_text_state',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled',
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled',
					),
				)
			),

			/**
			 * Styling
			 */

			array(
				'label' => __( 'Align', 'dslc_string' ),
				'id' => 'css_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'dslc_string' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right',
					),
				)
			),
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_border_radius',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image, .dslc-image img',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
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
				'affect_on_change_el' => '.dslc-image',
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
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px'
			),

			/**
			 * Custom Text
			 */

			array(
				'label' => __( 'Align', 'dslc_string' ),
				'id' => 'css_ct_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'tab' => 'custom text',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'dslc_string' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right',
					),
				)
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_ct_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'custom text'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_ct_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'custom text',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_ct_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'custom text',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_ct_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'custom text'
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_ct_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => 'custom text',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_ct_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'custom text'
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
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
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
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_ct_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_ct_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text - Margin Top', 'dslc_string' ),
				'id' => 'css_res_t_ct_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
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
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image',
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
				'affect_on_change_el' => '.dslc-image',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_ct_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_ct_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text - Margin Top', 'dslc_string' ),
				'id' => 'css_res_p_ct_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-image-caption',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
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

			$anchor_class = '';
			$anchor_target = '_self';
			$anchor_href = '#';

			if ( $options['link_type'] == 'url_new' )
				$anchor_target = '_blank';

			if ( $options['link_url'] !== '' )
				$anchor_href = $options['link_url'];

			if ( $options['link_type'] == 'lightbox' && $options['link_lb_image'] !== '' ) {
				$anchor_class .= 'dslc-lightbox-image ';
				$anchor_href = $options['link_lb_image'];
			}
		

			?>

			<div class="dslc-image">

				<?php if ( empty( $options['image'] ) ) : ?>

					<div class="dslc-notification dslc-red"><?php _e( 'No image has been set yet, edit the module to set one.', 'dslc_string' ); ?></div>

				<?php else : ?>

					<?php if ( $options['link_type'] !== 'none' ) : ?>
						<a class="<?php echo $anchor_class; ?>" href="<?php echo $anchor_href; ?>" target="<?php echo $anchor_target; ?>">
					<?php endif; ?>
						<img src="<?php echo $options['image']; ?>" />
					<?php if ( $options['link_type'] !== 'none' ) : ?>
						</a>
					<?php endif; ?>

					<?php if ( $options['custom_text_state'] == 'enabled' ) : ?>

						<div class="dslc-image-caption">

							<?php if ( $dslc_is_admin ) : ?>
								<div class="dslca-editable-content" data-id="custom_text" data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo $options['custom_text']; ?></div>
							<?php else : ?>
								<?php echo $options['custom_text']; ?>
							<?php endif; ?>

						</div>

					<?php endif; ?>

				<?php endif; ?>

			</div><!-- .dslc-image -->

			<?php

		/* Module output ends here */

		$this->module_end( $options );

	}

}