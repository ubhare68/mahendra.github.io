<?php

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Button" );')
);

class Liwo_Button extends DSLC_Module {

	var $module_id = 'Liwo_Button';
	var $module_title = 'Button';
	var $module_icon = 'link';
	var $module_category = 'Liwo - Elements';

	function options() {	

		$dslc_options = array(
			
			/**
			 * Styling
			 */

			array(
				'label' => __( 'Liwo Button - Button Text', 'dslc_string' ),
				'id' => 'button_text',
				'std' => 'CLICK TO EDIT',
				'type' => 'text',
				'visibility' => 'hidden',
			),
			array(
				'label' => __( 'URL', 'dslc_string' ),
				'id' => 'button_url',
				'std' => '#',
				'type' => 'text'				
			),
			array(
				'label' => __( 'Open in', 'dslc_string' ),
				'id' => 'button_target',
				'std' => '_self',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Same Tab', 'dslc_string' ),
						'value' => '_self',
					),
					array(
						'label' => __( 'New Tab', 'dslc_string' ),
						'value' => '_blank',
					),
				)
			),
		array(
				'label' => __( 'Button Style Preset', 'dslc_string' ),
				'id' => 'button_style',
				'std' => 'but_download',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __('Style 1', 'dslc_string'),
						'value' => 'but_goback'
						),
					array(
						'label' => __('Style 2', 'dslc_string'),
						'value' => 'but_ok_2'
						),
					array(
						'label' => __('Style 3', 'dslc_string'),
						'value' => 'but_wifi'
						),
					array(
						'label' => __('Style 4', 'dslc_string'),
						'value' => 'but_warning_sign'
						),
					array(
						'label' => __('Style 5', 'dslc_string'),
						'value' => 'but_user'
						),
					array(
						'label' => __('Style 6', 'dslc_string'),
						'value' => 'but_tag'
						),
					array(
						'label' => __('Style 7', 'dslc_string'),
						'value' => 'but_table'
						),
					array(
						'label' => __('Style 8', 'dslc_string'),
						'value' => 'but_star'
						),
					array(
						'label' => __('Style 9', 'dslc_string'),
						'value' => 'but_search'
						),
					array(
						'label' => __('Style 10', 'dslc_string'),
						'value' => 'but_phone'
						),
					array(
						'label' => __('Style 11', 'dslc_string'),
						'value' => 'but_pencil'
						),
					array(
						'label' => __('Style 12', 'dslc_string'),
						'value' => 'but_new_window'
						),
					array(
						'label' => __('Style 13', 'dslc_string'),
						'value' => 'but_music'
						),
					array(
						'label' => __('Style 14', 'dslc_string'),
						'value' => 'but_hand_right'
						),
					array(
						'label' => __('Style 15', 'dslc_string'),
						'value' => 'but_thumbs_down'
						),
					array(
						'label' => __('Style 16', 'dslc_string'),
						'value' => 'but_thumbs_up'
						),
					array(
						'label' => __('Style 17', 'dslc_string'),
						'value' => 'but_globe'
						),
					array(
						'label' => __('Style 18', 'dslc_string'),
						'value' => 'but_hospital'
						),
					array(
						'label' => __('Style 19', 'dslc_string'),
						'value' => 'but_coffe_cup'
						),
					array(
						'label' => __('Style 20', 'dslc_string'),
						'value' => 'but_settings'
						),
					array(
						'label' => __('Style 21', 'dslc_string'),
						'value' => 'but_chat'
						),
					array(
						'label' => __('Style 22', 'dslc_string'),
						'value' => 'but_play_array'
						),
					array(
						'label' => __('Style 23', 'dslc_string'),
						'value' => 'but_remove_2'
						),
					array(
						'label' => __('Style 24', 'dslc_string'),
						'value' => 'but_lock'
						),
					array(
						'label' => __('Style 25', 'dslc_string'),
						'value' => 'but_shopping_cart'
						),
					array(
						'label' => __('Style 26', 'dslc_string'),
						'value' => 'but_exclamation_mark'
						),
					array(
						'label' => __('Style 27', 'dslc_string'),
						'value' => 'but_info'
						),
					array(
						'label' => __('Style 28', 'dslc_string'),
						'value' => 'but_question_mark'
						),
					array(
						'label' => __('Style 29', 'dslc_string'),
						'value' => 'but_minus'
						),
					array(
						'label' => __('Style 30', 'dslc_string'),
						'value' => 'but_plus'
						),
					array(
						'label' => __('Style 31', 'dslc_string'),
						'value' => 'but_folder_open'
						),
					array(
						'label' => __('Style 32', 'dslc_string'),
						'value' => 'but_file'
						),
					array(
						'label' => __('Style 33', 'dslc_string'),
						'value' => 'but_envelope'
						),
					array(
						'label' => __('Style 34', 'dslc_string'),
						'value' => 'but_edit'
						),
					array(
						'label' => __('Style 35', 'dslc_string'),
						'value' => 'but_cogwheel'
						),
					array(
						'label' => __('Style 36', 'dslc_string'),
						'value' => 'but_check'
						),
					array(
						'label' => __('Style 37', 'dslc_string'),
						'value' => 'but_camera'
						),
					array(
						'label' => __('Style 38', 'dslc_string'),
						'value' => 'but_calendar'
						),
					array(
						'label' => __('Style 39', 'dslc_string'),
						'value' => 'but_bookmark'
						),
					array(
						'label' => __('Style 40', 'dslc_string'),
						'value' => 'but_book'
						),
					array(
						'label' => __('Style 41', 'dslc_string'),
						'value' => 'but_download'
						),
					array(
						'label' => __('Style 42', 'dslc_string'),
						'value' => 'but_pdf'
						),
					array(
						'label' => __('Style 43', 'dslc_string'),
						'value' => 'but_word_doc'
						),
					array(
						'label' => __('Style 44', 'dslc_string'),
						'value' => 'but_woman'
						),
					),
				'section' => 'styling',
			),
			array(
				'label' => __( 'Enable Custom Style', 'dslc_string' ),
				'id' => 'css_enable_custom_style',
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
				'section' => 'styling',
			),
			array(
				'label' => __( 'Align', 'dslc_string' ),
				'id' => 'css_align',
				'std' => 'left',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button',
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
				'std' => '#5890e5',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Color - Hover', 'dslc_string' ),
				'id' => 'css_bg_color_hover',
				'std' => '#4b7bc2',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_border_color',
				'std' => '#000',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color - Hover', 'dslc_string' ),
				'id' => 'css_border_color_hover',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a:hover',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
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
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_border_radius',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
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
				'affect_on_change_el' => '.dslc-button',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_padding_vertical',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px'
			),

			/**
			 * Typography
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_button_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'typography'
			),
			array(
				'label' => __( 'Color - Hover', 'dslc_string' ),
				'id' => 'css_button_color_hover',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'typography'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_button_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'typography',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_button_font_weight',
				'std' => '800',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'typography',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_button_font_family',
				'std' => 'Lato',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'typography',
			),

			/**
			 * Icon
			 */

			array(
				'label' => __( 'Icon', 'dslc_string' ),
				'id' => 'button_icon_id',
				'std' => 'fa-check',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => 'check',
						'value' => 'fa-check'
					),
					array(
						'label' => 'cloud upload',
						'value' => 'fa-cloud-upload'
					),
					array(
						'label' => 'warning',
						'value' => 'fa-warning'
					),
					array(
						'label' => 'user',
						'value' => 'fa-user'
					),
					array(
						'label' => 'tag',
						'value' => 'fa-tag'
					),
					array(
						'label' => 'table',
						'value' => 'fa-table'
					),
					array(
						'label' => 'star',
						'value' => 'fa-star'
					),
					array(
						'label' => 'search',
						'value' => 'fa-search'
					),
					array(
						'label' => 'phone',
						'value' => 'fa-phone'
					),
					array(
						'label' => 'pencil',
						'value' => 'fa-pencil'
					),
					array(
						'label' => 'share',
						'value' => 'fa-share'
					),
					array(
						'label' => 'music',
						'value' => 'fa-music'
					),
					array(
						'label' => 'hand right',
						'value' => 'fa-hand-o-right'
					),
					array(
						'label' => 'thumbs down',
						'value' => 'fa-thumbs-down'
					),
					array(
						'label' => 'thumbs-up',
						'value' => 'fa-thumbs-up'
					),
					array(
						'label' => 'globe',
						'value' => 'fa-globe'
					),
					array(
						'label' => 'hospital',
						'value' => 'fa-hospital'
					),
					array(
						'label' => 'coffee',
						'value' => 'fa-coffee'
					),
					array(
						'label' => 'list',
						'value' => 'fa-th-list'
					),
					array(
						'label' => 'comment',
						'value' => 'fa-comment'
					),
					array(
						'label' => 'play circle',
						'value' => 'fa-play-circle'
					),
					array(
						'label' => 'times',
						'value' => 'fa-times'
					),
					array(
						'label' => 'lock',
						'value' => 'fa-lock'
					),
					array(
						'label' => 'shopping-cart',
						'value' => 'fa-shopping-cart'
					),
					array(
						'label' => 'dollar',
						'value' => 'fa-dollar'
					),
					array(
						'label' => 'info',
						'value' => 'fa-info'
					),
					array(
						'label' => 'question',
						'value' => 'fa-question'
					),
					array(
						'label' => 'minus',
						'value' => 'fa-minus'
					),
					array(
						'label' => 'plus',
						'value' => 'fa-plus'
					),
					array(
						'label' => 'folder open',
						'value' => 'fa-folder-open'
					),
					array(
						'label' => 'file',
						'value' => 'fa-file'
					),
					array(
						'label' => 'envelope',
						'value' => 'fa-envelope'
					),
					array(
						'label' => 'edit',
						'value' => 'fa-edit'
					),
					array(
						'label' => 'cog',
						'value' => 'fa-cog'
					),
					array(
						'label' => 'camera',
						'value' => 'fa-camera'
					),
					array(
						'label' => 'calendar',
						'value' => 'fa-calendar'
					),
					array(
						'label' => 'bookmark',
						'value' => 'fa-bookmark'
					),
					array(
						'label' => 'book',
						'value' => 'fa-book'
					),
					array(
						'label' => 'quote left',
						'value' => 'fa-quote-left'
					),
					array(
						'label' => 'download',
						'value' => 'fa-download'
					),
					array(
						'label' => 'html5',
						'value' => 'fa-html5'
					),
					array(
						'label' => 'home',
						'value' => 'fa-home'
					),
					array(
						'label' => 'laptop',
						'value' => 'fa-laptop'
					),
					array(
						'label' => 'key',
						'value' => 'fa-key'
					),
					
				),
				'section' => 'styling',
				'tab' => 'icon',
			),

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_icon_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'icon'
			),
			array(
				'label' => __( 'Color - Hover', 'dslc_string' ),
				'id' => 'css_icon_color_hover',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a:hover .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'icon'
			),
			array(
				'label' => __( 'Margin Right', 'dslc_string' ),
				'id' => 'css_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a .dslc-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'icon'
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
				'affect_on_change_el' => '.dslc-button',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_padding_vertical',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_res_t_button_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_res_t_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a .dslc-icon',
				'affect_on_change_rule' => 'margin-right',
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
				'affect_on_change_el' => '.dslc-button',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_padding_vertical',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_res_p_button_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_res_p_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-button a .dslc-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),


		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {		

		global $dslc_active;

		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;

		$this->module_start( $options );

		/* Module output starts here */
		if ($options['css_enable_custom_style'] == 'disabled') {
			echo '<a class="'.$options['button_style'] .'"  href="'.do_shortcode( $options['button_url'] ).'"><i class="fa '.$options['button_icon_id'].' fa-lg"></i> ';
				?>
				<span class="dslca-editable-content" data-id="button_text"  data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo $options['button_text']; ?></span></a>
				<?php
		}else{

			
			?>

			<div class="dslc-button">
				<a  href="<?php echo do_shortcode( $options['button_url'] ); ?>" target="<?php echo $options['button_target']; ?>">
					<!-- <span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span> -->
					<span class="dslc-icon"><i class="fa <?php echo $options['button_icon_id']; ?> fa-lg"></i></span>
					<span class="dslca-editable-content" data-id="button_text"  data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo $options['button_text']; ?></span>
				</a>
			</div><!-- .dslc-notification-box -->

			<?php
		}

		/* Module output ends here */

		$this->module_end( $options );

	}

}