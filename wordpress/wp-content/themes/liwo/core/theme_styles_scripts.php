<?php 
/**
*
*/

if(!function_exists('ts_js')){
	
	/*
	 * javascript
	*/
	function 	ts_js()
	{
		if(!is_admin())
		{

		    global $liwo;
		    if(isset($liwo['theme_view_layout'])){
			    if ($liwo['theme_view_layout']=='fullwidth'){
			        $fullwidth = '';
			    } else {
			        $fullwidth = '';
			    }
			} else {
				$fullwidth = '';
			}
			
			wp_enqueue_script('jquery');

		    wp_register_script('jquery.jcarousel.min', THEMESTUDIO_JS.'/jcarousel/jquery.jcarousel.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'jquery.jcarousel.min' );

		    wp_register_script('jquery.themepunch.plugins.min', THEMESTUDIO_JS.'/revolutionslider/rs-plugin/js/jquery.themepunch.plugins.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'jquery.themepunch.plugins.min' );

		    wp_register_script('jquery.themepunch.revolution.min', THEMESTUDIO_JS.'/revolutionslider/rs-plugin/js/jquery.themepunch.revolution.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'jquery.themepunch.revolution.min' );

		    wp_register_script('accordion.custom', THEMESTUDIO_JS.'/accordion/custom.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'accordion.custom' );

		    wp_register_script('core', THEMESTUDIO_JS.'/sticky-menu/core.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'core' );

		    wp_register_script('modernizr.custom.75180', THEMESTUDIO_JS.'/sticky-menu/modernizr.custom.75180.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'modernizr.custom.75180' );

		    wp_register_script('bootstrap.min', THEMESTUDIO_JS.'/mainmenu/bootstrap.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'bootstrap.min' );

		    wp_register_script('fhmm', THEMESTUDIO_JS.'/mainmenu/fhmm.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'fhmm' );

		    wp_register_script('responsiveslides.min', THEMESTUDIO_JS.'/shortslider/responsiveslides.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'responsiveslides.min' );

		    wp_register_script('progressbar', THEMESTUDIO_JS.'/progressbar/progress.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'progressbar' );

		    wp_register_script('tabs', THEMESTUDIO_JS.'/tabs/tabs.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'tabs' );

		    wp_register_script('jquery.fitvids', THEMESTUDIO_JS.'/jquery.fitvids.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'jquery.fitvids' );

		    wp_register_script('ts-custom-js', THEMESTUDIO_JS.'/custom.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'ts-custom-js' );

		    wp_register_script('tabs-style2', THEMESTUDIO_JS.'/tabs/tabs-style2.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'tabs-style2' );

		    wp_register_script('modernizr.custom', THEMESTUDIO_JS.'/icon-hover/modernizr.custom.js', false, THEMESTUDIO_THEME_VERSION, true );
		    wp_enqueue_script( 'modernizr.custom' );


		}
	}
	add_action('wp_enqueue_scripts','ts_js');

}

if(!function_exists('ts_onepage_menu_js')){
	function ts_onepage_menu_js(){
	  	wp_register_script('jquery.scrollto.min', THEMESTUDIO_JS.'/mainmenu/jquery.scrollto.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		wp_enqueue_script( 'jquery.scrollto.min' );
	  	wp_register_script('jquery.nav', THEMESTUDIO_JS.'/mainmenu/jquery.nav.js', false, THEMESTUDIO_THEME_VERSION, true );
		wp_enqueue_script( 'jquery.nav' );
	}
}

if(!function_exists('metabox_js')){
	add_action('admin_enqueue_scripts','metabox_js');
	function    metabox_js()
	{
	    if(is_admin())
	    {
	        wp_register_script('custommetabox', THEMESTUDIO_THEME_LIBS_URL . '/admin/metaboxes/js/custommetabox.js', false, THEMESTUDIO_THEME_VERSION, true);
	        wp_enqueue_script('custommetabox');

	        wp_register_style( 'font-awesome.min', THEMESTUDIO_CSS.'/font-awesome/css/font-awesome.min.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	        wp_enqueue_style( 'font-awesome.min' );
	    }
	}
}

if(!function_exists('ts_css')){
	
	/*
	 * load css
	*/
	function 	ts_css()
	{
		global $liwo;

		if(isset($liwo['theme_color'])){
			$theme_color = $liwo['theme_color'];
		} else {
			$theme_color = 'lightblue.css';
		}


	    wp_register_style( 'reset', THEMESTUDIO_CSS.'/reset.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'reset' );

	    wp_register_style( 'styles', THEMESTUDIO_CSS.'/styles.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'styles' );
	    
	    wp_register_style( 'icon_hover', THEMESTUDIO_CSS.'/icon_hover.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'icon_hover' );

	    wp_register_style( 'font-awesome.min', THEMESTUDIO_CSS.'/font-awesome/css/font-awesome.min.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'font-awesome.min' );

	    wp_register_style( 'responsive-leyouts', THEMESTUDIO_CSS.'/responsive-leyouts.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'responsive-leyouts' );

	    wp_register_style('core', THEMESTUDIO_JS.'/sticky-menu/core.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'core' );

	    wp_register_style('bootstrap', THEMESTUDIO_JS.'/mainmenu/bootstrap.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'bootstrap' );

	    wp_register_style('fhmm', THEMESTUDIO_JS.'/mainmenu/fhmm.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'fhmm' );

	    wp_register_style('skin2', THEMESTUDIO_JS.'/jcarousel/skin2.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'skin2' );

	    wp_register_style('skin3', THEMESTUDIO_JS.'/jcarousel/skin3.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'skin3' );

	    wp_register_style('accordion', THEMESTUDIO_JS.'/accordion/accordion.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'accordion' );

	    wp_register_style('demo', THEMESTUDIO_JS.'/shortslider/demo.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'demo' );

	    wp_register_style( "theme_color", THEMESTUDIO_CSS.'/colors/'.$theme_color, false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style(  "theme_color" );

	    wp_register_style( 'ui.progress-bar', THEMESTUDIO_JS.'/progressbar/ui.progress-bar.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'ui.progress-bar' );

	    wp_register_style( 'tabs', THEMESTUDIO_JS.'/tabs/tabs.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'tabs' );

	    wp_register_style( 'tabs-style2', THEMESTUDIO_JS.'/tabs/tabs-style2.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'tabs-style2' );

	    wp_register_style( 'custom_layout3', THEMESTUDIO_CSS.'/custom_layout3.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style( 'custom_layout3' );

	}
	add_action("wp_enqueue_scripts",'ts_css');

}

if(!function_exists('flex_assets')){
	
	/*
	 * Flex slider
	*/
	function flex_assets()
	{
	    global $liwo;
	    if ($liwo['theme_view_layout']=='fullwidth'){
	        $fullwidth = '';   
	    } else {
	        $fullwidth = '';
	    }

	    wp_register_style('flexslider', THEMESTUDIO_CSS.'/flexslider.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style('flexslider');
	    
	    wp_register_script('jquery.flexslider', THEMESTUDIO_JS.'/jquery.flexslider.js', false, THEMESTUDIO_THEME_VERSION, true);
	    wp_enqueue_script('jquery.flexslider' );
	}

}


if(!function_exists('ts_get_custom_style')){
	
	function ts_get_custom_style()
	{

	    global $liwo;

	    $return ='';
	    if(isset($liwo['custom_css_code'])){
	    	$custom_css = $liwo['custom_css_code'];
	    } else {
	    	$custom_css = '';
	    }
	    
	    if(isset($liwo['opt-background-pattern'])) {
		    switch ($liwo['opt-background-pattern']) {
		    	case 'preset':
		    		$return.= '
						body {
							padding: 0px;
							margin: 0px 0px 0px 0px;
							background: url('.$liwo["opt-background-patternPreset"].') repeat left top;
						}
			    	';
		    	break;

		    	case 'custom':
		    		$return.= '
						body {
							padding: 0px;
							margin: 0px 0px 0px 0px;
							background: url('.$liwo["opt-media-body-background"]['url'].') repeat left top;
						}
			    	';
		    	break;
		    	
		    	default:
		    		$return.= '
						body {
							padding: 0px;
							margin: 0px 0px 0px 0px;
							background: #FFF;
						}
			    	';
		    	break;
		    }
		}
	    $return.= $custom_css;

	    wp_add_inline_style( 'custom-style', $return );
	}
	add_action( 'wp_enqueue_scripts', 'ts_get_custom_style' );

}


if(!function_exists('ts_scroll_dropdown')){
	
	function ts_scroll_dropdown()
	{
	    global $liwo;
	    if (!isset( $liwo ) && $liwo['theme_view_layout']=='fullwidth'){
	        $fullwidth = '';   
	    } else {
	        $fullwidth = '';
	    }

	    if(!is_admin())
	    {
	        wp_register_script('scroll.dropdown', THEMESTUDIO_JS.'/scroll.js', false, THEMESTUDIO_THEME_VERSION, true );
	        wp_enqueue_script( 'scroll.dropdown' );
	    }
	}
	add_action('wp_enqueue_scripts', 'ts_scroll_dropdown');

}

if(!function_exists('flex_nav_menu')){
	
	/*Flex nav menu*/
	function flex_nav_menu()
	{
	    wp_register_style('flexnav', THEMESTUDIO_ASSETS.'/flex-nav/css/flexnav.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
	    wp_enqueue_style('flexnav');
	    
	    wp_register_script('jquery.flexnav', THEMESTUDIO_ASSETS.'/flex-nav/js/jquery.flexnav.js', false, THEMESTUDIO_THEME_VERSION, true);
	    wp_enqueue_script('jquery.flexnav' );

	    wp_register_script('custom.flexnav', THEMESTUDIO_ASSETS.'/flex-nav/js/custom.js', false, THEMESTUDIO_THEME_VERSION, true );
	    wp_enqueue_script( 'custom.flexnav' );
	}

}


if(!function_exists('ts_cube_js')){
	
	function ts_cube_js()
	{
		wp_register_style('cubeportfolio.min', THEMESTUDIO_JS.'/cubeportfolio/cubeportfolio.min.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'cubeportfolio.min' );

	    wp_register_script('jquery.cubeportfolio.min', THEMESTUDIO_JS.'/cubeportfolio/jquery.cubeportfolio.min.js', false, THEMESTUDIO_THEME_VERSION, true );
	    wp_enqueue_script( 'jquery.cubeportfolio.min' );

	}
	add_action('wp_enqueue_scripts','ts_cube_js');

}

if(!function_exists('cubewidgets')){
	
	function cubewidgets()
	{
	    wp_register_style('cubeportfolio.min', THEMESTUDIO_JS.'/cubeportfolio2/cubeportfolio.min.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'cubeportfolio.min' );

	    wp_enqueue_style('jquery.cubeportfolio.min', THEMESTUDIO_JS.'/cubeportfolio2/cols4.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'jquery.cubeportfolio.min' );

	    wp_register_script('jquery.cubeportfolio.min', THEMESTUDIO_JS.'/cubeportfolio2/jquery.cubeportfolio.min.js', false, THEMESTUDIO_THEME_VERSION, true );
	    wp_enqueue_script( 'jquery.cubeportfolio.min' );

	    wp_register_script('main', THEMESTUDIO_JS.'/cubeportfolio2/main.js', false, THEMESTUDIO_THEME_VERSION, true );
	    wp_enqueue_script( 'main' );
	}

}


if (!function_exists('ts_fancybox')) {
	
	function ts_fancybox()
	{
		wp_register_style('jquery.fancybox', THEMESTUDIO_FANCYBOX.'/source/jquery.fancybox.css', false, THEMESTUDIO_THEME_VERSION, 'screen' );
	    wp_enqueue_style( 'jquery.fancybox' );

	    wp_register_script('jquery.fancybox', THEMESTUDIO_FANCYBOX.'/source/jquery.fancybox.js', false, THEMESTUDIO_THEME_VERSION, true );
	    wp_enqueue_script( 'jquery.fancybox' );

	    wp_register_script('jquery.fancybox-media', THEMESTUDIO_FANCYBOX.'/source/helpers/jquery.fancybox-media.js', false, THEMESTUDIO_THEME_VERSION, true );
	    wp_enqueue_script( 'jquery.fancybox-media' );

	    wp_register_script('custom.fancybox', THEMESTUDIO_FANCYBOX.'/source/custom.fancybox.js', false, THEMESTUDIO_THEME_VERSION, true );
	    wp_enqueue_script( 'custom.fancybox' );
	}

}

if (!function_exists('ts_contact_form')) {
	
	function ts_contact_form()
	{
		wp_register_style('sky-forms', THEMESTUDIO_JS . '/form/sky-forms.css' , false, THEMESTUDIO_THEME_VERSION, 'screen');
		wp_enqueue_style( 'sky-forms' );

		wp_register_script('jquery.form.min', THEMESTUDIO_JS . '/form/jquery.form.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		wp_enqueue_script( 'jquery.form.min' );

		wp_register_script('jquery.validate.min', THEMESTUDIO_JS . '/form/jquery.validate.min.js', false, THEMESTUDIO_THEME_VERSION, true );
		wp_enqueue_script( 'jquery.validate.min' );

	}

}


if ( !function_exists('style_switcher') ) {
	
	function style_switcher()
	{
		if(!is_admin())
		{
			wp_register_style('color-switcher', THEMESTUDIO_JS . '/style-switcher/color-switcher.css' , false, THEMESTUDIO_THEME_VERSION, 'screen');
			wp_enqueue_style( 'color-switcher' );

			wp_register_script('styleswitcher', THEMESTUDIO_JS . '/style-switcher/styleswitcher.js', false, THEMESTUDIO_THEME_VERSION, true );
			wp_enqueue_script( 'styleswitcher' );

			wp_register_script('styleswitcher-custom', THEMESTUDIO_JS . '/style-switcher/custom.js', false, THEMESTUDIO_THEME_VERSION, true );
			wp_enqueue_script( 'styleswitcher-custom' );

			wp_register_script('styleselector', THEMESTUDIO_JS . '/style-switcher/styleselector.js', false, THEMESTUDIO_THEME_VERSION, true );
			wp_enqueue_script( 'styleselector' );
		}
	}
	add_action('wp_enqueue_scripts','style_switcher');

}


// if ( !function_exists('ts_style_accent_color') ) {
// 	function ts_style_accent_color()
// 	{
// 		global $liwo;
// 		$acc_color = '';
// 		if (isset($liwo['accent_color'])) {
// 			$accent_color = $liwo['accent_color'];
// 			$acc_color .= "
// 				#trueHeader #logo{
// 					float:left;
// 					display:block;
// 					width:100%;
// 					height:61px;
// 					text-indent:-999em;
// 					background: url(http://user2.themestudio.net:80/liwo/wp-content/themes/liwo/assets/images/colors/orange/logo.png) no-repeat left 18px;
// 				}
// 				.jetmenu > li:hover > a, .jetmenu > li.active > a {
// 				    color: #ff6407;
// 				}
// 				a.button_slider {
// 					background-color: #ff6407;
// 				}
// 				.liwo.punch_text {
// 					background: #ff6407;
// 				}
// 				.liwo.punch_text a {
// 					border: 2px solid #bb4701;
// 				}
// 				.liwo.punch_text a:hover {
// 					background-color:#bb4701;
// 				}
// 				.liwo.fusection1 .one_fourth.helight i {
// 				    border: 1px solid #ff6407;
// 					color: #ff6407;
// 				}
// 			";
// 		}
// 		wp_add_inline_style( 'custom-style-accent', $acc_color );
// 	}
// 	add_action( 'wp_enqueue_scripts', 'ts_style_accent_color' );

// }

?>