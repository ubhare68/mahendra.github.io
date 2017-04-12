<?php
add_action( 'tgmpa_register', 'wdjewelry_register_required_plugins' );
function wdjewelry_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme			
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead 
		),
			array(
			'name'     				=> 'WPBakery Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/js_composer.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.8.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
				array(
			'name'     				=> 'Regenerate Thumbnails', // The plugin name
			'slug'     				=> 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead 
		),
			array(
			'name'     				=> 'Revolution Slider', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'WooCommerce Currency Switcher', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/woocommerce-currency-switcher.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
								
		array(
			'name'     				=> 'Seach And Replace', // The plugin name
			'slug'     				=> 'search-and-replace', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
		
		array(
			'name'     				=> 'Visual Composer Extensions', // The plugin name
			'slug'     				=> 'ts-visual-composer-extend', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/ts-visual-composer-extend.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.2.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
				
/*	array(
			'name'     				=> 'UberMenu', // The plugin name
			'slug'     				=> 'ubermenu', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/ubermenu.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '3.2.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		*/
		array(
			'name'     				=> 'WD  Grid List Toggle', // The plugin name
			'slug'     				=> 'wd-grid-list-toggle', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/wd-grid-list-toggle.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'WD Product Color', // The plugin name
			'slug'     				=> 'wd_product-color', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/wd_product-color.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
	
		array(
			'name'     				=> 'WD Quickshop', // The plugin name
			'slug'     				=> 'wd_quickshop', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/wd_quickshop.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'WD  Shortcode', // The plugin name
			'slug'     				=> 'wd_shortcode', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/includes/plugins/wd_shortcode.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'WooCommerce', // The plugin name
			'slug'     				=> 'woocommerce', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
			
		array(
			'name'     				=> 'YITH Woocommerce Compare', // The plugin name
			'slug'     				=> 'yith-woocommerce-compare', // The plugin slug (typically the folder name)
			
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     				=> 'YITH Woocommerce Wishlisst', // The plugin name
			'slug'     				=> 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
			
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			
		),
			array(
			'name'     				=> 'One Click Demo Import', // The plugin name
			'slug'     				=> 'one-click-demo-import', // The plugin slug (typically the folder name)
			
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'wdjewelry',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> esc_html__( 'Install Required Plugins', 'wdjewelry' ),
			'menu_title'                       			=> esc_html__( 'Install Plugins', 'wdjewelry' ),
			'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'wdjewelry' ), // %1$s = plugin name
			'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'wdjewelry' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ,'wdjewelry'), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ,'wdjewelry'), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','wdjewelry' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ,'wdjewelry'), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','wdjewelry' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ,'wdjewelry'), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ,'wdjewelry'), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','wdjewelry' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins','wdjewelry' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins','wdjewelry' ),
			'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'wdjewelry' ),
			'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'wdjewelry' ),
			'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'wdjewelry' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}