<?php 
	if(!function_exists('wdjewelry_checkplugin_woocommerce')){
		function wdjewelry_checkplugin_woocommerce(){
			$_active_woocommerce = apply_filters('active_plugins',get_option('active_plugins'));
			if(in_array('woocommerce/woocommerce.php',$_active_woocommerce)){
				return true;
			}else{
				return false;
			}
		}
	}

	if(!function_exists('wdjewelry_checkplugin_vc')){
		function wdjewelry_checkplugin_vc(){
			$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
			if(in_array('js_composer/js_composer.php',$_active_vc)){
				return true;
			}else{
				return false;
			}
		}
	}
	if(!function_exists('wdjewelry_checkplugin_extention')){
		function wdjewelry_checkplugin_extention(){
			$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
			if(in_array('ts-visual-composer-extend/ts-visual-composer-extend.php',$_active_vc)){
				return true;
			}else{
				return false;
			}
		}
	}
?>