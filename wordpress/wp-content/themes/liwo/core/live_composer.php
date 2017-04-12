<?php 
	/**
	 * Load all custom blocks
	 */

	global $ts_icon_hover;
	$ts_icon_hover = array(
		array(
			'label' => __('None','dslc_string'),
			'value' => __('','dslc_string')
		),
		array(
			'label' => __('Style 1','dslc_string'),
			'value' => __('1','dslc_string')
		),
		array(
			'label' => __('Style 2','dslc_string'),
			'value' => __('2','dslc_string')
		),
		array(
			'label' => __('Style 3','dslc_string'),
			'value' => __('3','dslc_string')
		),
		array(
			'label' => __('Style 4','dslc_string'),
			'value' => __('5','dslc_string')
		),
		array(
			'label' => __('Style 5','dslc_string'),
			'value' => __('6','dslc_string')
		),
		array(
			'label' => __('Style 6','dslc_string'),
			'value' => __('7','dslc_string')
		),
		array(
			'label' => __('Style 7','dslc_string'),
			'value' => __('8','dslc_string')
		),
		array(
			'label' => __('Style 8','dslc_string'),
			'value' => __('9','dslc_string')
		),
	);

	global $ts_theme_color;
	global $ts_theme_color_hover;
	global $liwo;
	if (!isset($liwo['theme_color'])) {
		$liwo['theme_color'] = 'violet.css';
	}
	switch ($liwo['theme_color']) {
		case 'brown.css':
			$ts_theme_color = '#b4702d';
			$ts_theme_color_hover = '#703e0c';
		break;
		
		case 'cyan.css':
			$ts_theme_color = '#00bdbd';
			$ts_theme_color_hover = '#007070';
		break;

		case 'green.css':
			$ts_theme_color = '#09a609';
			$ts_theme_color_hover = '#057105';
		break;
		
		case 'lightblue.css':
			$ts_theme_color = '#1889c1';
			$ts_theme_color_hover = '#1889c1';
		break;
		
		case 'lightgreen.css':
			$ts_theme_color = '#b3d222';
			$ts_theme_color_hover = '#728711';
		break;
		
		case 'orange.css':
			$ts_theme_color = '#ff6407';
			$ts_theme_color_hover = '#bb4701';
		break;
		
		case 'pink.css':
			$ts_theme_color = '#ea009b';
			$ts_theme_color_hover = '#8d005d';
		break;
		
		case 'purple.css':
			$ts_theme_color = '#db5edb';
			$ts_theme_color_hover = '#9a359a';
		break;
		
		case 'red.css':
			$ts_theme_color = '#fc4a4a';
			$ts_theme_color_hover = '#b32c2c';
		break;
		
		default:
			$ts_theme_color = '#7952aa';
			$ts_theme_color_hover = '#4a2d6d';
		break;
	}


	if(class_exists('DSLC_Module')){
		require_once get_template_directory() . '/core/live_composer_sections/liwo_alert.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_button.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_call_to_action.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_call_to_action2.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_list_number.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_dropcaps.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_gallery.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_client_list.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_history.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_list_style.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_graph_bg_image.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_parallax.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_parallax1.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_portfolio.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_pricing_table.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_table.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_process_block.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_recent_section.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_skill_bar.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_spacer.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_tabs.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_team.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_team1.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_team_block.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_testimonials.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_testimonials_single.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_title_block.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_infobox.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_toggle.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_section.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block1.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block2.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block3.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block4.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block5.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block6.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block7.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_block8.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_style1.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_style2.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_style3.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_style4.php';
		require_once get_template_directory() . '/core/live_composer_sections/liwo_services_style5.php';

	}

?>