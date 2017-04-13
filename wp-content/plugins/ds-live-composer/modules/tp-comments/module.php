<?php

include DS_LIVE_COMPOSER_ABS . '/modules/tp-comments/functions.php';

class DSLC_TP_Comments extends DSLC_Module {

	var $module_id = 'DSLC_TP_Comments';
	var $module_title = 'Comments';
	var $module_icon = 'comments';
	var $module_category = 'single';
	
	function options() {	

		$dslc_options = array(
		
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
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
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_border_radius',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
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
				'affect_on_change_el' => '.dslc-tp-comments',
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
				'affect_on_change_el' => '.dslc-tp-comments',
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
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px'
			),

			/**
			 * Comment
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_c_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'comment'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_c_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'comment'
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_c_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_c_border_trbl',
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
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'comment'
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_c_border_radius',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_c_margin_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_c_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_c_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment'
			),

			/**
			 * Comment Inner
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_ci_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_ci_border_color',
				'std' => '#ddd',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_ci_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_ci_border_trbl',
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
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_ci_border_radius',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_ci_margin_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Padding Top', 'dslc_string' ),
				'id' => 'css_ci_padding_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Padding Bottom', 'dslc_string' ),
				'id' => 'css_ci_padding_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment inner'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_ci_padding_horizontal',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'comment inner'
			),

			/**
			 * Comment Inner
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_m_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'info'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_m_border_color',
				'std' => '#ddd',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'info'
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_m_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'info'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_m_border_trbl',
				'std' => 'bottom',
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
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'info'
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_m_border_radius',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'info'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_m_margin_bottom',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'info'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_m_padding_vertical',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'info'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_m_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'info'
			),

			/**
			 * Info - Author
			 */

			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_ia_border_radius',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-author-avatar img',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'info - author'
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_ia_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-author',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'info - author'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_ia_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-author',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'info - author',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_ia_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-author',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'info - author',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_ia_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-author',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'info - author',
			),

			/**
			 * Info - Date
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_id_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-date',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'info - date'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_id_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-date',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'info - date',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_id_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-date',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'info - date',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_id_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-date',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'info - date',
			),

			/**
			 * Info - Reply
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_ir_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-reply a',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'info - reply'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_ir_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-reply a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'info - reply',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_ir_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-reply a',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'info - reply',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_ir_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-reply a',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'info - reply',
			),

			/**
			 * Main
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_cm_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'main'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_cm_border_color',
				'std' => '#000',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'main'
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_cm_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'main'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_cm_border_trbl',
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
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => 'main'
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_cm_border_radius',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'main'
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_cm_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'main'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_cm_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'main',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_cm_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'main',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_cm_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'main',
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_cm_lineheight',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => 'main',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_cm_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'main'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_cm_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'main'
			),

			/**
			 * responsive tablet
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
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Comment - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_c_margin_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'Comment - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_c_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'Comment - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_c_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'C. Inner - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_ci_margin_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'C. Inner - Padding Top', 'dslc_string' ),
				'id' => 'css_res_t_ci_padding_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'C. Inner - Padding Bottom', 'dslc_string' ),
				'id' => 'css_res_t_ci_padding_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'C. Inner - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_ci_padding_horizontal',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'Info - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_m_margin_bottom',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'Info - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_m_padding_vertical',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'Info - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_m_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'Info Author- Font Size', 'dslc_string' ),
				'id' => 'css_res_t_ia_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-author',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Info Date - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_id_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-date',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Reply - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_ir_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-reply a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Main - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_cm_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Main - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_cm_lineheight',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Main - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_cm_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_cm_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'tablet'
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
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-comments',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Comment - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_c_margin_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'Comment - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_c_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'Comment - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_c_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'C. Inner - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_ci_margin_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'C. Inner - Padding Top', 'dslc_string' ),
				'id' => 'css_res_p_ci_padding_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'C. Inner - Padding Bottom', 'dslc_string' ),
				'id' => 'css_res_p_ci_padding_bottom',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'C. Inner - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_ci_padding_horizontal',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-inner',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'Info - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_m_margin_bottom',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'Info - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_m_padding_vertical',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'Info - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_m_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-info',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'Info Author- Font Size', 'dslc_string' ),
				'id' => 'css_res_p_ia_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-author',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Info Date - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_id_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-meta-date',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Reply - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_ir_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-reply a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Main - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_cm_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Main - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_cm_lineheight',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Main - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_cm_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_cm_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-comment-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => 'phone'
			),


		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {

		global $dslc_active;

		$post_id = $options['post_id'];
		$show_fake = true;

		if ( is_singular() && get_post_type() !== 'dslc_templates' ) {
			$post_id = get_the_ID();
			$show_fake = false;
		}

		$this->module_start( $options );

		/* Module output starts here */
			
			?>

				<div class="dslc-tp-comments">

					<?php if ( $show_fake ) : ?>

						<?php if ( defined( 'DISQUS_VERSION' ) ) : ?> 

							<p><strong>DISQUS</strong> is active and will be shown in this position.</strong></p>

						<?php else : ?>

							<ol class="comments clean-list">
									
								<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 dslc-comment">

									<div class="dslc-comment-inner">

										<div class="dslc-comment-info dslc-clearfix">

											<ul class="dslc-comment-meta dslc-clearfix">
												<li class="dslc-comment-meta-author"><span class="dslc-comment-author-avatar"><img height="33" width="33" class="avatar avatar-33 photo" src="http://0.gravatar.com/avatar/8fa8ea3566dc0b5bcff5d6d8e93f0c9e?s=33&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D33&amp;r=G" alt=""></span>admin</li>
												<li class="dslc-comment-meta-date">January 1, 2014</li>
											</ul>

											<span class="dslc-comment-reply">
												<a href="#" class="comment-reply-link">Reply</a>
											</span>

										</div><!-- .comment-info -->

										<div class="dslc-comment-main">
											
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>

										</div><!-- .comment-main -->

									</div><!-- .comment-inner -->

								</li><!-- #comment-## -->

								<li id="dslc-comment-42" class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 dslc-comment">

									<div class="dslc-comment-inner">

										<div class="dslc-comment-info dslc-clearfix">

											<ul class="dslc-comment-meta dslc-clearfix">
												<li class="dslc-comment-meta-author"><span class="dslc-comment-author-avatar"><img height="33" width="33" class="avatar avatar-33 photo" src="http://0.gravatar.com/avatar/8fa8ea3566dc0b5bcff5d6d8e93f0c9e?s=33&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D33&amp;r=G" alt=""></span>admin</li>
												<li class="dslc-comment-meta-date">January 1, 2014</li>
											</ul>

											<span class="dslc-comment-reply">
												<a onclick="return addComment.moveForm(&quot;comment-42&quot;, &quot;42&quot;, &quot;respond&quot;, &quot;14&quot;)" href="/livecomposer/?p=14&amp;replytocom=42#respond" class="comment-reply-link">Reply</a>						</span>

										</div><!-- .comment-info -->

										<div class="dslc-comment-main">
											
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>

										</div><!-- .comment-main -->

									</div><!-- .comment-inner -->

									<ul class="children">

										<li id="dslc-comment-43" class="comment byuser comment-author-admin bypostauthor odd alt depth-2 dslc-comment">

											<div class="dslc-comment-inner">

												<div class="dslc-comment-info dslc-clearfix">

													<ul class="dslc-comment-meta dslc-clearfix">
														<li class="dslc-comment-meta-author"><span class="dslc-comment-author-avatar"><img height="33" width="33" class="avatar avatar-33 photo" src="http://0.gravatar.com/avatar/8fa8ea3566dc0b5bcff5d6d8e93f0c9e?s=33&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D33&amp;r=G" alt=""></span>admin</li>
														<li class="dslc-comment-meta-date">January 1, 2014</li>
													</ul>

													<span class="dslc-comment-reply">
														<a onclick="return addComment.moveForm(&quot;comment-43&quot;, &quot;43&quot;, &quot;respond&quot;, &quot;14&quot;)" href="/livecomposer/?p=14&amp;replytocom=43#respond" class="comment-reply-link">Reply</a>						</span>

												</div><!-- .comment-info -->

												<div class="dslc-comment-main">
													
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

												</div><!-- .comment-main -->

											</div><!-- .comment-inner -->

										</li><!-- #comment-## -->
									</ul><!-- .children -->
								</li><!-- #comment-## -->
							</ol><!-- .commentlist -->

						<?php endif; ?>

					<?php else : ?>

						<?php if ( defined( 'DISQUS_VERSION' ) ) : comments_template(); else : ?>

							<?php $comments = get_comments( array( 'post_id' => $post_id ) ); ?>

							<?php if ( get_comment_pages_count( $comments ) > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
								
								<!-- Comments Navigation -->

							<?php endif; ?>

							<ol class="comments clean-list">
								<?php wp_list_comments( array( 'callback' => 'dslc_display_comments' ), $comments ); ?>
							</ol><!-- .commentlist -->

							<?php if ( get_comment_pages_count( $comments ) > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
								
								<!-- Comments Navigation -->

							<?php endif; ?>

						<?php endif; ?>

						<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) && ! defined( 'DISQUS_VERSION' ) ) : ?>
								<p class="nocomments"><?php _e( 'Comments are closed.', 'dslc_string' ); ?></p>
						<?php endif; ?>
							
					<?php endif; ?>

				</div><!-- dslc-tp-comments -->

			<?php

		/* Module output ends here */

		$this->module_end( $options );

	}

}