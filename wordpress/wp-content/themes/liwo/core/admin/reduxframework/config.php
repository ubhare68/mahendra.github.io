<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            $this->initSettings();

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**
         *
         * This is a test function that will let you see when the compiler hook occurs.
         * It only runs if a field   set with compiler=>true is changed.
         *
         * */
        function compiler_action($options, $css) {
            //echo '<h1>The compiler hook has run!';
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once ABSPATH .'/wp-admin/includes/file.php';
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }

        /*
         * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
         * Simply include this function in the child themes functions.php file.
         * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
         * so you must use get_template_directory_uri() if you want to use any of the built in icons
        */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'themestudio'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'themestudio'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /*
         * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
        */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /*
         * Filter hook for filtering the default value of any given field. Very useful in development mode.
        */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
             * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
            **/
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'themestudio'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'themestudio'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'themestudio'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'themestudio') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'themestudio'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once ABSPATH . '/wp-admin/includes/file.php';
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            // ACTUAL DECLARATION OF SECTIONS

                  $this->sections[] = array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Settings', 'themestudio'),
                'fields' => array(
                    array(
                        'id'    => 'info_success',
                        'type'  => 'info',
                        'style' => 'success',
                        'title' => __('Welcome to Liwo Theme Option Panel', 'themestudio'),
                        'icon'  => 'el-icon-info-sign',
                        'desc'  => __( 'From here you can config Liwo theme in the way you need.', 'themestudio')
                    ),
                    array(
                        'id' => 'custom_logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Upload your custom logo', 'themestudio'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your logo image', 'themestudio'),
                        'subtitle' => __('Upload your custom logo image', 'themestudio'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/logo.png'),
                        'hint' => array(
                            'title'     => 'Hint Title',
                            'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                        )
                    ),
                    array(
                        'id' => 'custom_favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Custom favicon', 'themestudio'),
                        'desc' => __('Upload your custom favicon image. ', 'themestudio'),
                        'subtitle' => __('Upload your custom favicon image', 'themestudio'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/favicon.ico'),
                    ),
                    array(
                        'id' => 'custom_css_code',
                        'type' => 'ace_editor',
                        'title' => __('CSS Code', 'themestudio'),
                        'subtitle' => __('Paste your custom CSS code here.', 'themestudio'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => 'Custom css code.',
                        'default' => "#header{\nmargin: 0 auto;\n}"
                    ),
                    array(
                        'id' => 'tracking_code',
                        'type' => 'ace_editor',
                        'title' => __('Tracking Code(Google Analytics)', 'themestudio'),
                        'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'themestudio'),
                        'theme' => 'chrome',
                        'default' =>''
                    ),
                    array(
                        'id' => 'custom_js_code',
                        'type' => 'ace_editor',
                        'title' => __('Custom JS Code', 'themestudio'),
                        'subtitle' => __('Paste your custom JS code here.', 'themestudio'),
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'desc' => 'Custom javascript code',
                        'default' => "jQuery(document).ready(function(){\n\n});"
                    ),
                )
            );
             $this->sections[] = array(
                            'title' => __('Header Settings', 'themestudio'),
                            'desc' => __('Header Settings', 'themestudio'),
                            'icon' => 'el-icon-flag',
                            // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                            'fields' => array(
                                array(
                                    'id'        => 'switch_header_top',
                                    'type'      => 'switch',
                                    'title'     => __('Enable Header top', 'themestudio'),
                                    'subtitle'  => __('Show Top Header', 'themestudio'),
                                    'default'   => true,
                                ),
                                array(
                                    'id'        => 'switch_header_email',
                                    'type'      => 'switch',
                                    'title'     => __('Enable Header Email', 'themestudio'),
                                    'subtitle'  => __('Show Email Header', 'themestudio'),
                                    'required' => array('switch_header_top', 'equals', array('1')),
                                    'default'   => true,
                                ),
                                array(
                                    'id' => 'header_email',
                                    'type' => 'text',
                                    'title' => __('Header email', 'themestudio'),
                                    'subtitle' => __('Header email', 'themestudio'),
                                    'desc' => __('Header email', 'themestudio'),
                                    'required' => array('switch_header_email', 'equals', array('1')),
                                    'default' => 'info@yourdomain.com',
                                ),
                                array(
                                    'id'        => 'switch_header_phone',
                                    'type'      => 'switch',
                                    'title'     => __('Enable Header Phone', 'themestudio'),
                                    'subtitle'  => __('Show Header Phone', 'themestudio'),
                                    'required' => array('switch_header_top', 'equals', array('1')),
                                    'default'   => true,
                                ),
                                array(
                                    'id' => 'header_phone',
                                    'type' => 'text',
                                    'title' => __('Header phone', 'themestudio'),
                                    'subtitle' => __('Header phone', 'themestudio'),
                                    'desc' => __('Header phone', 'themestudio'),
                                    'required' => array('switch_header_phone', 'equals', array('1')),
                                    'default' => '+88 123 456 7890',
                                ),
                                array(
                                    'id'        => 'switch_header_social',
                                    'type'      => 'switch',
                                    'title'     => __('Enable Header Social', 'themestudio'),
                                    'subtitle'  => __('Show Header Social', 'themestudio'),
                                    'required' => array('switch_header_top', 'equals', array('1')),
                                    'default'   => true,
                                ),
                            )
                        );
            
            // Typograply 
            $this->sections[] = array(
                'icon' => 'el-icon-font',
                'title' => __('Typography Settings', 'themestudio'),
                'fields' => array(
                    array(
                        'id' => 'body_font',
                        'type' => 'typography',
                        'title' => __('Body Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the body font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'PT Sans Caption',
                        ),
                        'output' => 'body'
                    ),
                    array(
                        'id' => 'menu_font',
                        'type' => 'typography',
                        'title' => __('Menu Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the menu font properties.', 'themestudio'),
                        'output' => array('.nav'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Raleway',
                        ),
                    ),
                    array(
                        'id' => 'welcome_text_font',
                        'type' => 'typography',
                        'title' => __('Welcome text Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the welcome text font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Raleway',
                        ),
                    ),
                    array(
                        'id' => 'h1_font',
                        'type' => 'typography',
                        'title' => __('Heading 1(H1) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H1 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Open Sans',
                        ),
                        'output' => 'h1'
                    ),
      
                    array(
                        'id' => 'h2_font',
                        'type' => 'typography',
                        'title' => __('Heading 2(H2) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H2 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Open Sans',
                        ),
                        'output' => 'h2'
                    ),
      
                    array(
                        'id' => 'h3_font',
                        'type' => 'typography',
                        'title' => __('Heading 3(H3) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H3 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Open Sans',
                        ),
                        'output' => 'h3'
                    ),
      
                    array(
                        'id' => 'h4_font',
                        'type' => 'typography',
                        'title' => __('Heading 4(H4) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H4 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Open Sans',
                        ),
                        'output' => 'h4'
                    ),
      
                    array(
                        'id' => 'h5_font',
                        'type' => 'typography',
                        'title' => __('Heading 5(H5) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H5 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Open Sans',
                        ),
                        'output' => 'h5'
                    ),
      
                    array(
                        'id' => 'h6_font',
                        'type' => 'typography',
                        'title' => __('Heading 6(H6) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H6 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Open Sans',
                        ),
                        'output' => 'h6'
                    ),
      

                )
            );

            $this->sections[] = array(
                'title' => __('Style Settings', 'themestudio'),
                'desc' => __('Style Settings', 'themestudio'),
                'icon' => 'el-icon-magic',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                    array(
                        'id'       => 'theme_view_layout',
                        'type'     => 'select',
                        'title'    => __('Select Theme View Layout', 'themestudio'),
                        'subtitle' => __('No validation can be done on this field type', 'themestudio'),
                        'desc'     => __('This is the description field, again good for additional info.', 'themestudio'),
                        'options'  => array(
                            'fullwidth' => 'Fullwidth',
                            'boxed' => 'Boxed',
                        ),
                        'default'  => 'fullwidth',
                    ),
                    array(
                        'id'       => 'theme_color',
                        'type'     => 'select',
                        'title'    => __('Select Theme Color', 'themestudio'),
                        'subtitle' => __('No validation can be done on this field type', 'themestudio'),
                        'desc'     => __('This is the description field, again good for additional info.', 'themestudio'),
                        'options'  => array(
                            'brown.css' => 'Brown',
                            'cyan.css' => 'Cyan',
                            'green.css' => 'Green',
                            'lightblue.css' => 'Lightblue',
                            'lightgreen.css' => 'Lightgreen',
                            'orange.css' => 'Orange',
                            'pink.css' => 'Pink',
                            'purple.css' => 'Purple',
                            'red.css' => 'Red',
                            'violet.css' => 'Violet',
                        ),
                        'default'  => 'lightblue.css',
                    ),
                    array(
                        'id'        => 'opt-background-pattern',
                        'type'      => 'button_set',
                        'title'     => __('Pattern Overlay', 'precise_plugin'),
                        'subtitle'  => __('You can use a pattern image as overlay over the background slideshow/video. Choose a preset or select Custom to upload your own.', 'precise_plugin'),
                        'desc'      => __('', 'precise_plugin'),
                        'options'   => array(
                            'off'       => 'Off',
                            'preset'    => 'Preset',
                            'custom'    => 'Custom'
                        ),
                        'default'   => 'off'
                    ),
                    array(
                        'id' => 'accent_color',
                        'type' => 'color',
                        'title' => __('Accent Color', 'themestudio'),
                        'desc' => __('Change this color to alter the accent color globally for your website. ', 'themestudio'),
                        'subtitle' => __('Accent color (default: #).', 'themestudio'),
                        'default' => '',
                        'validate' => 'color',
                    ),
                    array(
                        'id'        => 'opt-background-patternPreset',
                        'type'      => 'image_select',
                        'tiles'     => true,
                        'required'  => array('opt-background-pattern', 'equals', 'preset'),
                        'title'     => __('Pattern Preset', 'precise_plugin'),
                        'subtitle'  => __('Select a background pattern.', 'precise_plugin'),
                        'default'   => 'dotted-1',
                        'options'   => array(
                            'default' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/bg.png',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'one' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-one.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'two' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-two.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'three' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-three.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'four' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-four.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'five' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-five.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'six' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-six.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'seven' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-seven.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'eight' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-eight.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'nine' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-nine.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'ten' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-img1.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'eleven' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-img2.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'twelve' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-img3.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),
                            'thirteen' => array(
                                'alt' => '',
                                'img' => get_template_directory_uri() . '/assets/images/elements/pattern-img4.jpg',
                                'width' => '20',
                                'height' => '20',
                            ),

                        ),
                    ),
                    array(
                        'id'       => 'opt-media-body-background',
                        'type'     => 'media',
                        'required'  => array('opt-background-pattern', 'equals', 'custom'),
                        'url'      => true,
                        'title' => __('Body Background', 'themestudio'),
                        'subtitle' => __('Body background with image, color, etc.', 'themestudio'),
                        'default'  => array(
                            'url'=>''
                        ),
                    ),
                    array(
                        'id' => 'breadcrumb_background',
                        'type' => 'background',
                        'output' => array('.page_title'),
                        'title' => __('Breadcrumb Background', 'themestudio'),
                        'subtitle' => __('Breadcrumb background with image, color, etc.', 'themestudio'),
                        'default' => array(
                            'background-color' => '#97B5BF',
                            'background-image' => get_template_directory_uri(). '/assets/images/page-titlebg.jpg',
                        )
                    ),
                )
            );

    // Blog settings 
            $this->sections[] = array(
                'icon' => 'el-icon-th-list',
                'title' => __('Blog Settings', 'themestudio'),
                'fields' => array(

                     array(
                        'id'        => 'blog_style',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Blog style', 'themestudio'),
                        'subtitle'  => __('Select blog style(List/Grid).', 'themestudio'),
                        'options'   => array(
                            'list' => array('alt' => 'List Image',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/list.png'),
                            'grid' => array('alt' => 'Grid Image',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/grid.png'),
                        ),
                        'default'   => 'list'
                    ),

                    array(
                        'id'        => 'blog_page_layout',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Blog layout', 'themestudio'),
                        'subtitle'  => __('Select blog layout(Full with | Left Sidebar | Right Sidebar).', 'themestudio'),
                        'options'   => array(
                            'fulwidth' => array('alt' => 'Full width(No Sidebar)',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/1column.png'),
                            'left-sidebar' => array('alt' => 'Left Sidebar',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cl.png'),
                            'right-sidebar' => array('alt' => 'Right Sidebar',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cr.png'),
                        ),
                        'default'   => 'right-sidebar'
                    ),

                    array(
                        'id' => 'blog_title',
                        'type' => 'text',
                        'title' => __('Blog title', 'themestudio'),
                        'subtitle' => __('Default blog title', 'themestudio'),
                        'desc' => __('Enter your blog title.', 'themestudio'),
                        'default' => 'Our blog',
                    ),
                    array(
                        'id'       => 'blog_metas',
                        'type'     => 'select',
                        'multi'    => true,
                        'title'    => __('Blog metas', 'themestudio'),
                        'options'  => array(
                            'author'    => 'Author',
                            'date'      => 'Date time',
                            'category'  => 'Category',
                            'comment'   => 'Comment',
                            'tag'       => 'Tag',
                        ),
                        'default'  => array('author','category','comment','date')
                    ),
                    array(
                        'id'        => 'blog_social_switch',
                        'type'      => 'switch',
                        'title'     => __('Enable social sharing on single post', 'themestudio'),
                        'subtitle'  => __('Enable/ Disable post social sharing', 'themestudio'),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'blog_author_switch',
                        'type'      => 'switch',
                        'title'     => __('Enable author bio block on single post', 'themestudio'),
                        'subtitle'  => __('Enable/ Disable author block', 'themestudio'),
                        'default'   => true,
                    ),

                    array(
                        'id'=>'sidebars',
                        'type' => 'multi_text',
                        'title' => __('Default Sidebar', 'themestudio'),
                        'default' => array('Right Sidebar', 'Left Sidebar'),
                    ),
                )
            );

        // Portfolio settings 
            $this->sections[] = array(
                'icon' => 'el-icon-th-list',
                'title' => __('Portfolio Settings', 'themestudio'),
                'fields' => array(

                     array(
                        'id'        => 'portfolio_style',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Portfolio style', 'themestudio'),
                        'subtitle'  => __('Select portfolio style(2/3/4 Columns).', 'themestudio'),
                        'options'   => array(
                            '2columns' => array('alt' => '2 Columns Image',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2columns.png'),
                            '3columns' => array('alt' => '3 Columns Image',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/3columns.png'),
                            '4columns' => array('alt' => '4 Columns Image',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/4columns.png'),
                        ),
                        'default'   => '2columns'
                    ),

                    array(
                        'id'        => 'portfolio_page_layout',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Portfolio layout', 'themestudio'),
                        'subtitle'  => __('Select Portfolio layout(Full with | Left Sidebar | Right Sidebar).', 'themestudio'),
                        'options'   => array(
                            'fulwidth' => array('alt' => 'Full width(No Sidebar)',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/1column.png'),
                            'left-sidebar' => array('alt' => 'Left Sidebar',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cl.png'),
                            'right-sidebar' => array('alt' => 'Right Sidebar',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cr.png'),
                        ),
                        'default'   => 'fulwidth'
                    ),

                    array(
                        'id'        => 'portfolio_social_switch',
                        'type'      => 'switch',
                        'title'     => __('Enable toolbar on portfolio', 'themestudio'),
                        'subtitle'  => __('Enable/ Disable toolbar on portfolio', 'themestudio'),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'portfolio_pagination_switch',
                        'type'      => 'switch',
                        'title'     => __('Enable pagination on portfolio', 'themestudio'),
                        'subtitle'  => __('Enable/ Disable pagination on portfolio', 'themestudio'),
                        'default'   => true,
                    ),
                )
            );

    // Social settings 
             $this->sections[] = array(
                'title' => __('Social Settings', 'themestudio'),
                'desc' => __('Social Settings', 'themestudio'),
                'icon' => 'el-icon-twitter',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                    array(
                        'id' => 'social_facebook',
                        'type' => 'text',
                        'title' => __('Facebook url', 'themestudio'),
                        'subtitle' => __('Facebook url', 'themestudio'),
                        'desc' => __('Facebook url', 'themestudio'),
                        'default' => 'http://facebook.com',
                    ),
                    array(
                        'id' => 'social_twitter',
                        'type' => 'text',
                        'title' => __('Twitter url', 'themestudio'),
                        'subtitle' => __('Twitter url', 'themestudio'),
                        'desc' => __('Twitter url', 'themestudio'),
                        'default' => 'http://twitter.com',
                    ),
                    array(
                        'id' => 'social_googleplus',
                        'type' => 'text',
                        'title' => __('Google Plus url', 'themestudio'),
                        'subtitle' => __('Google Plus url', 'themestudio'),
                        'desc' => __('Google Plus url', 'themestudio'),
                        'default' => 'http://plus.google.com',
                    ),
                    array(
                        'id' => 'social_linkedin',
                        'type' => 'text',
                        'title' => __('Linkedin url', 'themestudio'),
                        'subtitle' => __('Linkedin url', 'themestudio'),
                        'desc' => __('Linkedin url', 'themestudio'),
                        'default' => 'http://linkedin.com',
                    ),
                    array(
                        'id' => 'social_flickr',
                        'type' => 'text',
                        'title' => __('Flickr url', 'themestudio'),
                        'subtitle' => __('Flickr url', 'themestudio'),
                        'desc' => __('Flickr url', 'themestudio'),
                        'default' => 'http://flickr.com',
                    ),
                    array(
                        'id' => 'social_youtube',
                        'type' => 'text',
                        'title' => __('Youtube url', 'themestudio'),
                        'subtitle' => __('Youtube url', 'themestudio'),
                        'desc' => __('Youtube url', 'themestudio'),
                        'default' => 'http://youtube.com',
                    ),
                    array(
                        'id' => 'social_rss',
                        'type' => 'text',
                        'title' => __('RSS url', 'themestudio'),
                        'subtitle' => __('RSS url', 'themestudio'),
                        'desc' => __('RSS url', 'themestudio'),
                        'default' => '#',
                    ),
                )
            );

            // Footer settings 
             $this->sections[] = array(
                'title' => __('Footer Settings', 'themestudio'),
                'desc' => __('Footer Settings', 'themestudio'),
                'icon' => 'el-icon-th-large',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(

                    array(
                        'id'        => 'footer_widgets',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Footer widgets', 'themestudio'),
                        'subtitle'  => __('Select footer number widget.', 'themestudio'),
                        'options'   => array(
                            '1' => array('alt' => '1 Column',       'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/1column.png'),
                            '2' => array('alt' => '2 Column ',  'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2columns.png'),
                            '3' => array('alt' => '3 Column ','img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/3columns.png'),
                            '4' => array('alt' => '4 Column ', 'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/4columns.png')
                        ),
                        'default'   => '4',
                        
                    ),
                    array(
                        'id' => 'footer_background',
                        'type' => 'background',
                        'output' => array('.footer'),
                        'title' => __('Footer Background', 'themestudio'),
                        'subtitle' => __('Footer background with image, color, etc.', 'themestudio'),
                        'default' => array(
                            'background-color' => '#F0F0F0',
                            'background-image' => get_template_directory_uri(). '/assets/images/bg-graph3.jpg',
                        )
                    ),
                    array(
                        'id' => 'footer_social_background',
                        'type' => 'background',
                        'output' => array('.curve_graph3'),
                        'title' => __('Footer Social Background', 'themestudio'),
                        'subtitle' => __('Footer Social background with image, color, etc.', 'themestudio'),
                        'default' => array(
                            'background-image' => get_template_directory_uri(). '/assets/images/graph3.png',
                        )
                    ),
                    array(
                        'id'       => 'footer_switch_widget',
                        'type'     => 'switch',
                        'title'    => __('Footer switch widget', 'themestudio'),
                        'subtitle' => __('Look, it\'s on!', 'themestudio'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'footer_switch_social',
                        'type'     => 'switch',
                        'title'    => __('Footer switch social', 'themestudio'),
                        'subtitle' => __('Look, it\'s on!', 'themestudio'),
                        'default'  => true,
                    ),
                    array(
                        'id' => 'copyright_text',
                        'type' => 'textarea',
                        'title' => __('Copyright text', 'themestudio'),
                        'subtitle' => __('Copyright text', 'themestudio'),
                        'desc' => __('Copyright text', 'themestudio'),
                        'default' => ' <b>Copyright &copy; 2014 liwo.com. All rights reserved. by <a href="#">Liwo</a></b> <span><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></span> ',
                    ),
                )
            );

            // Form Contact settings 
             $this->sections[] = array(
                'title' => __('Contact Settings', 'themestudio'),
                'desc' => __('Contact Settings', 'themestudio'),
                'icon' => 'el-icon-envelope',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                    array(
                        'id'               => 'contact_text',
                        'type'             => 'editor',
                        'title'            => __('Contact text', 'themestudio'),
                        'subtitle'         => __('Subtitle text would go here.', 'themestudio'),
                        'default'          => '<p>Feel free to talk to our online representative at any time you please using our Live Chat system on our website or one of the below instant messaging programs.</p><br /><p>Please be patient while waiting for response. (24/7 Support!) <strong>Phone General Inquiries: 1-888-123-4567-8900</strong></p><br />',
                        'editor_options'   => array(
                            'teeny'            => true,
                            'textarea_rows'    => 10
                        )
                    ),
                    array(
                        'id'       => 'contact_switch_address_info',
                        'type'     => 'switch',
                        'title'    => __('Address widget', 'themestudio'),
                        'subtitle' => __('Look, it\'s on!', 'themestudio'),
                        'default'  => true,
                    ),
                    array(
                        'id'               => 'contact_address_textarea',
                        'type'             => 'editor',
                        'title'            => __('Contact Address Info', 'themestudio'),
                        'subtitle'         => __('Subtitle text would go here.', 'themestudio'),
                        'default'          => '<strong>Liwo</strong><br />2901 Marmora Road, Glassgow, Seattle, WA 98122-1090<br />Telephone: +1 1234-567-89000<br />FAX: +1 0123-4567-8900<br />E-mail: <a href="mailto:mail@companyname.com">mail@companyname.com</a><br />Website: <a href="#">themestudio.net</a>',
                        'editor_options'   => array(
                            'teeny'            => true,
                            'textarea_rows'    => 10
                        )
                    ),
                    array(
                        'id'       => 'contact_switch_map',
                        'type'     => 'switch',
                        'title'    => __('Map widget', 'themestudio'),
                        'subtitle' => __('Look, it\'s on!<br><img src="http://www.ten28.com/qa.jpg">', 'themestudio'),
                        'default'  => true,
                    ),
                )
            );
         
            $this->sections[] = array(
                'type' => 'divide',
            );

            $this->sections[] = array(
                'icon' => 'el-icon-info-sign',
                'title' => __('Theme Information', 'themestudio'),
                'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'themestudio'),
                'fields' => array(
                    array(
                        'id' => 'raw_new_info',
                        'type' => 'raw',
                        'content' => $item_info,
                    )
                ),
            );

            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'themestudio'),
                    'content' => ''
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'themestudio'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'themestudio')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'themestudio'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'themestudio')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'themestudio');
        }

        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
        **/
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'liwo',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'submenu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Liwo Options', 'themestudio'),
                'page_title'        => __('Liwo Options', 'themestudio'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyBTFiwsbTWfSMvvClQjz192yMJOdIKNMoo', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => 'liwo',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
                // $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'themestudio'), $v);
            } else {
                // $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'themestudio');
            }

            // Add content after the form.
            // $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'themestudio');
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
