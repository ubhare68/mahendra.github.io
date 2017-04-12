<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Call_To_Action_Block" );')
);


class Liwo_Call_To_Action_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Call_To_Action_Block';
    var $module_title = 'Call To Action';
    var $module_icon = 'hand-right';
    var $module_category = 'Liwo - Block';

 	// Module Options
    function options() { 
    	global $ts_theme_color;
    	global $ts_theme_color_hover;
    	// The options array
    	$dslc_options = array(
    		array(
				'label' => 'Call To Action - Title',
				'id' => 'title',
				'std' => 'We Create Professional and Clean Developed Themes',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Content',
				'id' => 'content',
				'std' => 'We Build Smarter and Highly Usable Stuff! on ThemeForest - Let is Start an Awesome Project',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => 'Button Text',
				'id' => 'button_text',
				'std' => ' get theme now!',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => 'Button Link',
				'id' => 'button_link',
				'std' => 'http://www.google.com',
				'type' => 'text',
				'section' => 'functionality'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.cta_wraper',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Enable/Disable Border Left', 'dslc_string' ),
				'id' => 'css_border_left',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'styling',
			),
			array(
				'label' => __( ' BG Color', 'dslc_string' ),
				'id' => 'css_main_bg_color',
				'std' => $ts_theme_color,
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo.punch_text',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'css_main_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-block',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( ' Border Style', 'dslc_string' ),
				'id' => 'css_main_border_style',
				'std' => 'solid',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-block',
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
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-block',
				'affect_on_change_rule' => 'border-top-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Bottom Width', 'dslc_string' ),
				'id' => 'css_main_border_width_bottom',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-block',
				'affect_on_change_rule' => 'border-bottom-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Right Width', 'dslc_string' ),
				'id' => 'css_main_border_width_right',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-block',
				'affect_on_change_rule' => 'border-right-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Border Left Width', 'dslc_string' ),
				'id' => 'css_main_border_width_left',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-block',
				'affect_on_change_rule' => 'border-left-width',
				'section' => 'styling',
				'ext' => 'px',
			),

			/*
			 * Title Style
			 * css_title_
			*/
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'css_title_title_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text h3',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Title',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_title_font-size',
				'std' => '27',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text h3',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Title',
			),

			/*
			 * Description Style
			 * css_desc_
			*/
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'css_desc_title_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text p',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Content',
			),
			array(
				'label' => __( 'Description Font Size', 'dslc_string' ),
				'id' => 'css_desc_font-size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text p',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Content'
			),

			/*
			 * Icon Style
			*/
			array(
				'label' => __( 'Enable/Disable Icon', 'dslc_string' ),
				'id' => 'icon_custom',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'styling',
				'tab'	=> 'Icon',
			),
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'css_icon_title_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Icon',
			),
			array(
				'label' => __( ' Margin Left', 'dslc_string' ),
				'id' => 'css_icon_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Icon',
			),
			array(
				'label' => __( '  Margin Right', 'dslc_string' ),
				'id' => 'css_icon_margin_right',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Icon',
			),
			array(
				'label' => __( '  Margin Top', 'dslc_string' ),
				'id' => 'css_icon_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Icon',
			),
			array(
				'label' => __( '  Margin Bottom', 'dslc_string' ),
				'id' => 'css_icon_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Icon',
			),
			array(
				'label' => __( 'Icon text align', 'dslc_string' ),
				'id' => 'icon_custom_text_align',
				'std' => 'left',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
				),
				'section' => 'styling',
				'tab'	=> 'Icon',
			),
			array(
				'label' => __( 'Icon', 'dslc_string' ),
				'id' => 'icon_icon_id',
				'std' => 'fa-tag',
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
						'value' => 'fa-tags'
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
						'label' => 'location arrow',
						'value' => 'fa-location-arrow'
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
				'tab' => 'Icon',
			),
			array(
				'label' => __( 'Icon Float', 'dslc_string' ),
				'id' => 'css_icon_float_left',
				'std' => 'left',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon',
				'affect_on_change_rule' => 'float',
				'section' => 'styling',
				'tab' => 'Icon',
			),
			array(
				'label' => __( ' Font Style', 'dslc_string' ),
				'id' => 'css_button_font_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon i',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'italic', 'dslc_string' ),
						'value' => 'italic',
					),
					array(
						'label' => __( 'oblique', 'dslc_string' ),
						'value' => 'oblique',
					),
				),
				'tab' => 'Icon',
			),

			array(
				'label' => __( '  Font Size', 'dslc_string' ),
				'id' => 'css_icon_font_size',
				'std' => '60',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon i',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Icon',
			),

			/*
			 * Button Style
			*/
			array(
				'label' => __( 'Enable/Disable Button', 'dslc_string' ),
				'id' => 'button_custom',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'styling',
				'tab'	=> 'Button',
			),

			
			array(
				'label' => __( ' Background Color', 'dslc_string' ),
				'id' => 'button_custom_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( ' Color', 'dslc_string' ),
				'id' => 'button_custom_color',
				'std' => '#1E1E1E',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( ' Border Color', 'dslc_string' ),
				'id' => 'button_custom_border_color',
				'std' => $ts_theme_color,
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( ' Hover Background Color', 'dslc_string' ),
				'id' => 'button_icon_custom_bg_color',
				'std' => $ts_theme_color_hover,
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( ' Hover Color', 'dslc_string' ),
				'id' => 'button_icon_custom_color',
				'std' => '#FFFFFF',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'button_custom_font-size',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),

			array(
				'label' => __( 'Button text align', 'dslc_string' ),
				'id' => 'button_custom_text_align',
				'std' => 'right',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
				),
				'section' => 'styling',
				'tab'	=> 'Button',
			),

			array(
				'label' => __( 'Button Margin Left', 'dslc_string' ),
				'id' => 'css_button_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Button Margin Right', 'dslc_string' ),
				'id' => 'css_button_margin_right',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Button Margin Top', 'dslc_string' ),
				'id' => 'css_button_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Button Margin Bottom', 'dslc_string' ),
				'id' => 'css_button_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Padding Top/Bottom', 'dslc_string' ),
				'id' => 'css_button_padding_top_bottom',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Padding Right/Left', 'dslc_string' ),
				'id' => 'css_button_padding_right_left',
				'std' => '35',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'padding-right,padding-left',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( ' Line Height', 'dslc_string' ),
				'id' => 'css_button_line-height',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'Button',
			),
			array(
				'label' => __( ' Font Style', 'dslc_string' ),
				'id' => 'css_button_font_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button i',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'italic', 'dslc_string' ),
						'value' => 'italic',
					),
					array(
						'label' => __( 'oblique', 'dslc_string' ),
						'value' => 'oblique',
					),
				),
				'tab' => 'Button',
			),
			array(
				'label' => __( ' Text Transform', 'dslc_string' ),
				'id' => 'css_button_text-transform',
				'std' => 'uppercase',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button a',
				'affect_on_change_rule' => 'text-transform',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'uppercase', 'dslc_string' ),
						'value' => 'uppercase',
					),
					array(
						'label' => __( 'none', 'dslc_string' ),
						'value' => 'none',
					),
					array(
						'label' => __( 'inherit', 'dslc_string' ),
						'value' => 'inherit',
					),
					array(
						'label' => __( 'capitalize', 'dslc_string' ),
						'value' => 'capitalize',
					),
					array(
						'label' => __( 'lowercase', 'dslc_string' ),
						'value' => 'lowercase',
					),
				),
				'tab' => 'Button',
			),

			/*
			 * Button Icon
			*/
			array(
				'label' => __( 'Enable/Disable Icon Button', 'dslc_string' ),
				'id' => 'icon_button_custom',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'styling',
				'tab'	=> 'Button Icon',
			),
			array(
				'label' => __( 'Icon', 'dslc_string' ),
				'id' => 'button_icon_id',
				'std' => 'fa-location-arrow',
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
						'value' => 'fa-tags'
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
						'label' => 'location arrow',
						'value' => 'fa-location-arrow'
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
				'tab' => 'Button Icon',
			),

			array(
				'label' => __( 'Text Float', 'dslc_string' ),
				'id' => 'css_text_float',
				'std' => 'left',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text',
				'affect_on_change_rule' => 'float',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Text Padding Left', 'dslc_string' ),
				'id' => 'css_text_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text',
				'affect_on_change_rule' => 'padding-left',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Text Padding Right', 'dslc_string' ),
				'id' => 'css_text_margin_right',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text',
				'affect_on_change_rule' => 'padding-right',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Text Padding Top', 'dslc_string' ),
				'id' => 'css_text_margin_top',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Text Padding Bottom', 'dslc_string' ),
				'id' => 'css_text_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text',
				'affect_on_change_rule' => 'padding-bottom',
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
				'std' => 'enabled',
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
				'label' => __( 'Float', 'dslc_string' ),
				'id' => 'css_res_t_float',
				'std' => 'left',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-button',
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
			array(
				'label' => __( ' Margin Left', 'dslc_string' ),
				'id' => 'css_res_t_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text,.ctr-button',
				'affect_on_change_rule' => 'margin-left',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'tablet',
			),

			/*
			 * Responsive css_res_p
			*/
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_p',
				'std' => 'enabled',
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
				'label' => __( ' Font Size', 'dslc_string' ),
				'id' => 'css_res_p_font_size',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-text h3',
				'affect_on_change_rule' => 'font-size',
				'ext' => 'px',
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( ' Margin Top', 'dslc_string' ),
				'id' => 'css_res_p_margin_top',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.ctr-icon',
				'affect_on_change_rule' => 'margin-top',
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
				'affect_on_change_el' => '.ctr-text',
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

		global $ts_theme_color;
    	global $ts_theme_color_hover;
	?>
	<div class="bg_callto_action">
		<div class=" <?php echo $options['container_class']; ?>">
			<div class="ctr-block cta_wraper liwo punch_text <?php if($options['css_border_left']=='enabled') { echo 'punchline_text_box'; } ?>">
				<?php if($options['button_custom']=="enabled"): ?>
					<?php if ($options['button_custom_text_align']=='left'): ?>
						<div class="one_third">
							<div class="ctr-button ctr-button-left">
								<a href="<?php echo $options['button_link']; ?>">
									<?php if ($options['icon_button_custom']=="enabled"): ?>
										<i class="fa <?php echo $options['button_icon_id']; ?>"></i> 
									<?php endif ?>
									<?php echo $options['button_text']; ?>
								</a>
							</div>
						</div>
					<?php endif ?>
				<?php endif; ?>

				<div class="two_third <?php if ($options['icon_custom_text_align']=='right'): echo 'last'; endif; ?> ">
					<?php if($options['icon_custom']=="enabled"): ?>
						<span class="ctr-icon ctr-icon-right"><i class="fa <?php echo $options['icon_icon_id']; ?> <?php echo 'fa-'.$options['icon_custom_size']; ?>"></i> </span>
					<?php endif; ?>
					<div class="ctr-text">
						<h3><?php echo $options['title']; ?></h3>
						<p><?php echo $options['content']; ?></p>
					</div>
				</div>

				<?php if($options['button_custom']=="enabled"): ?>
					<?php if ($options['button_custom_text_align']=='right'): ?>
						<div class="one_third last">
							<div class="ctr-button ctr-button-right">
								<?php if ($options['button_custom_bg_color'] != '' ): ?>
									<a href="<?php echo $options['button_link']; ?>">
										<?php if ($options['icon_button_custom']=="enabled"): ?>
											<i class="fa <?php echo $options['button_icon_id']; ?>"></i> 
										<?php endif ?>
										<?php echo $options['button_text']; ?>
									</a>
								<?php else: ?>
									<a href="<?php echo $options['button_link']; ?>" style="background-color:#FFFFFF" onmouseover="this.style.backgroundColor='<?php echo $ts_theme_color_hover; ?>'" onmouseout="this.style.backgroundColor='#FFFFFF'">
										<?php if ($options['icon_button_custom']=="enabled"): ?>
											<i class="fa <?php echo $options['button_icon_id']; ?>"></i> 
										<?php endif ?>
										<?php echo $options['button_text']; ?>
									</a>
								<?php endif ?>
							</div>
						</div>
					<?php endif ?>
				<?php endif; ?>

			</div>
		</div>
	</div>

	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}