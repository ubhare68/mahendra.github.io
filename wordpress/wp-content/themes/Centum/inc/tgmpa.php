<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.0
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'centum_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function centum_register_required_plugins() {

/**
 * Array of plugin arrays. Required keys are name and slug.
 * If the source is NOT from the .org repo, then source is also required.
 */
$plugins = array(

     array(
        'name'                  => 'Revolution Slider',
        'slug'                  => 'revslider',
        'source'                => get_template_directory_uri() . '/plugins/revslider.zip',
        'version'               => '5.0.9',
        'required'              => true,
    ),
    array(
        'name'                  => 'WPBakery Visual Composer', // The plugin name
        'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
        'source'                => get_stylesheet_directory() . '/plugins/js_composer.zip', // The plugin source
        'required'              => false, // If false, the plugin is only 'recommended' instead of required
        'version'               => '4.7.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
    ),
    array(
        'name'                  => 'Purethemes.net Shortcodes',
        'slug'                  => 'purethemes-shortcodes',
        'version'               => '1.5',
        'source'                => get_template_directory_uri() . '/plugins/purethemes-shortcodes.zip',
        'required'              => true,
    ),
    array(
        'name'                  => 'Web Fonts Social Icons WP',
        'slug'                  => 'web-font-social-icons',
        'version'               => '1.3',
        'source'                => get_template_directory_uri() . '/plugins/web-font-social-icons.zip',
        'required'              => false,
    ),
    array(
        'name'                  => 'Contact Form 7', // The plugin name
        'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
        'required'              => false, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'WP-PageNavi', // The plugin name
        'slug'                  => 'wp-pagenavi', // The plugin slug (typically the folder name)
        'required'              => false, // If false, the plugin is only 'recommended' instead of required
    ),



);
/*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}
