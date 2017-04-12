<?php
    /**
	 * Enqueue scripts
	 *
	 * @param string $handle Script name
	 * @param string $src Script url
	 * @param array $deps (optional) Array of script names on which this script depends
	 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
	 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
	 */
	function wdjewelry_register() {

		/**********************Loading Page*******************************/

		wp_enqueue_script('modernizr-2.6.2.min.js',get_template_directory_uri().'/js/modernizr-2.6.2.min.js',array(),'v1',true );
		wp_enqueue_script('wdjewelry-main2.js',get_template_directory_uri().'/js/main2.js',array(),'v1',true );
		/**********************ADD FLEXSLIDER jquery.flexslider*******************************/
		wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array( 'jquery' ), false, true);
		
		wp_enqueue_script( 'cloud-zoom', get_template_directory_uri().'/js/cloud-zoom.1.0.2.js', array( 'jquery' ), false, true);
		wp_enqueue_style('cloud-zoom-css',get_template_directory_uri().'/css/cloud-zoom.css' );
		
		wp_enqueue_script('masonry.pkgd.min',get_template_directory_uri().'/js/masonry.pkgd.min.js',array('jquery'),'v1',true);

		wp_register_script( 'fancybox.js', get_template_directory_uri().'/js/jquery.fancybox.pack.js',array(),'v1',true);
		wp_enqueue_script('fancybox.js');

		wp_enqueue_script("bootstrap",get_template_directory_uri()."/js/bootstrap.js",array(),"v1",true );
		wp_enqueue_style("bootstrap",get_template_directory_uri()."/css/bootstrap.css",array(),"v1" );
		wp_enqueue_style("bootstrap-theme",get_template_directory_uri()."/css/bootstrap-theme.css",array(),"v1" );
		wp_enqueue_style("font-awesome.min",get_template_directory_uri()."/css/font-awesome.min.css",array(),"v1" );
		// add animate css 
		wp_enqueue_style("animate.css",get_template_directory_uri()."/css/animate.css",array(),"v1" );
		
		wp_enqueue_style( 'carousel.theme-jquey', get_template_directory_uri() . '/css/owl.carousel.css',array(),'v1');
		wp_enqueue_style( 'carousel-css', get_template_directory_uri() . '/css/owl.theme.css',array(),'v1');
		wp_enqueue_script('carousel.script-jquery', get_template_directory_uri() .'/js/owl.carousel.js', array(),"v1",true );

		wp_register_script('wdjewelry-comment-ajax',get_template_directory_uri().'/js/comment.ajax.js',array(),'v1',true);

		wp_register_script("wdjewelry-main.ajax",get_template_directory_uri()."/js/main.ajax.js", array(),"v1",true);
		wp_localize_script( 'wdjewelry-main.ajax','main', array('ajax_url'=> admin_url( 'admin-ajax.php' )));
		wp_enqueue_script('wdjewelry-main.ajax');

		wp_register_script('wd-admin-url',get_template_directory_uri().'/js/wd-admin-url.js',array(), 'v1', true );

		wp_register_script('wd-remove-yith-wishlist',get_template_directory_uri().'/js/wd-remove-yith-wishlist.js',array(), 'v1', true );

		wp_enqueue_script("wdjewelry-main.jquery",get_template_directory_uri()."/js/main.jquery.js", array(),"v1",true);
		wp_enqueue_style('wdjewelry-main.css',get_template_directory_uri().'/css/main.css',array(),'v1' );

		wp_enqueue_script('wdjewelry-main.js',get_template_directory_uri().'/js/main.js',array('jquery'),'v1',true);

		wp_enqueue_script('wdjewelry-scroll.js',get_template_directory_uri().'/js/scrollbutton.js',array(),'v1',true );
		
		/*$url = wdjewelry_edit_background_header() ;
		if(!empty($url)):
			$custom_css = '.site-branding{background: url('.esc_url($url).') no-repeat top center #ffffff;} ';
		else:
			$custom_css = '.site-branding{background-color: #ffffff }';
		endif;
		wp_add_inline_style('wdjewelry-main.css',$custom_css);*/
		//inster scss for custom 
		wp_enqueue_style('wdjewelry-main.css',get_template_directory_uri().'/sass/_customize.scss',array(),'v1' );

		

	}

	add_action( 'wp_enqueue_scripts', 'wdjewelry_register' );

	function wdjewelry_loadJSCSS(){
		wp_enqueue_script('jquery');
		wp_enqueue_script("jquery-ui-core");
		wp_enqueue_script("jquery-ui-widget");
		wp_enqueue_script("jquery-ui-tabs");
		wp_enqueue_script("jquery-ui-mouse");
		wp_enqueue_script("jquery-ui-sortable");
		wp_enqueue_script("jquery-ui-slider");
		wp_enqueue_script("jquery-ui-accordion");
		wp_enqueue_script("jquery-effects-core");
		wp_enqueue_script("jquery-effects-slide");
		wp_enqueue_script("jquery-effects-blind");	
		/*wp_register_script( 'jqueryform', THEME_INCLUDES_JS_URI.'/jquery.form.js');
		wp_enqueue_script('jqueryform');

		wp_register_script( 'tab', THEME_INCLUDES_JS_URI.'/tab.js');
		wp_enqueue_script('tab');
		
		wp_register_script( 'page_config_js', THEME_INCLUDES_JS_URI.'/page_config.js');
		wp_enqueue_script('page_config_js');
		
		wp_register_script( 'product_config', THEME_INCLUDES_JS_URI.'/product_config.js');
		wp_enqueue_script('product_config');
		
		wp_register_style( 'config_css', THEME_INCLUDES_CSS_URI.'/admin.css');
		wp_enqueue_style('config_css');*/
		 

		/// Start Fancy Box
		//wp_register_style( 'fancybox_css', THEME_CSS.'/jquery.fancybox.css');
		//wp_enqueue_style('fancybox_css');		
		wp_register_script( 'fancybox_js', get_template_directory_uri().'/js/jquery.fancybox.pack.js');
		wp_enqueue_script('fancybox_js');	
		/// End Fancy Box		
		wp_register_script('wdjewelry-admin.main', get_template_directory_uri().'/admin/js/admin.main.js');
		wp_enqueue_script('wdjewelry-admin.main');
		wp_enqueue_style('wdjewelry-admin.main.css',get_template_directory_uri().'/admin/css/admin.main.css',array(),'v1' );

		/*wp_register_style( 'colorpicker', THEME_CSS.'/colorpicker.css');
		wp_enqueue_style('colorpicker');		
		wp_register_script( 'bootstrap-colorpicker', THEME_JS.'/bootstrap-colorpicker.js');
		wp_enqueue_script('bootstrap-colorpicker');	*/
		wp_enqueue_style('font-awesome');	
		wp_enqueue_script('plupload-all');
		wp_enqueue_script('utils');
		wp_enqueue_script('plupload');
		wp_enqueue_script('plupload-html5');
		wp_enqueue_script('plupload-flash');
		wp_enqueue_script('plupload-silverlight');
		wp_enqueue_script('plupload-html4');
		wp_enqueue_script('media-views');
		wp_enqueue_script('wp-plupload');		
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
		
	}
	add_action('admin_init','wdjewelry_loadJSCSS');
	add_action('admin_enqueue_scripts','wdjewelry_loadJSCSS');