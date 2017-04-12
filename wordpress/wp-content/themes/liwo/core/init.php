<?php
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/admin/reduxframework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/admin/reduxframework/ReduxCore/framework.php' );
}
if ( file_exists( dirname( __FILE__ ) . '/admin/reduxframework/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/admin/reduxframework/config.php' );
}
// Load Required/Recommended Plugins
require_once get_template_directory() . '/core/apis/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/core/plugins_load.php';

// Load plugin like
require_once get_template_directory() . '/core/apis/like/themestudio-like.php';

// Load theme support
require_once get_template_directory() . '/core/theme_support.php';

// Load ebor_menu
require_once get_template_directory() . '/core/apis/ts_mega_menu.php';

// Load post type galleries
require_once get_template_directory() . '/core/apis/galleries.php';

// Load theme register
require_once get_template_directory() . '/core/theme_register.php';

// Load live composer
require_once get_template_directory() . '/core/live_composer.php';

// Meta boxes
require_once get_template_directory() . '/core/admin/metaboxes/example-functions.php';


// Load Bootstrap Menu Walker
require_once get_template_directory() . '/core/apis/bootstrap_menu_walker.php';

// Load custom css and js
require_once get_template_directory() . '/core/theme_styles_scripts.php';

// Load theme functions
require_once get_template_directory() . '/core/theme_functions.php';

// Load custom widgets categories
require_once get_template_directory() . '/core/widgets/widgets-custom_categories.php';

// Load custom widgets form search
require_once get_template_directory() . '/core/widgets/widgets-custom_form_search.php';

// Load custom widgets tabs
require_once get_template_directory() . '/core/widgets/widgets-custom-tabs.php';

// Load custom widget Twitter Feed
require_once get_template_directory() . '/core/widgets/widgets-custom-twitter_feed.php';

// Load custom widget Recent Post
require_once get_template_directory() . '/core/widgets/widgets-custom_recent_posts.php';

// Load custom widget Flick Photo
require_once get_template_directory() . '/core/widgets/widgets-custom-flickr.php';

// Load custom widget Popular Post
require_once get_template_directory() . '/core/widgets/widgets-custom_popular_posts.php';

// Load custom widget Testilonials Post
require_once get_template_directory() . '/core/widgets/widgets-custom-testimonials.php';

// Load custom widget Portfolio Post
require_once get_template_directory() . '/core/widgets/widgets-custom-portfolio.php';

// Load custom widget Address Info
require_once get_template_directory() . '/core/widgets/widgets-custom-address-info.php';