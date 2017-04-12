<?php 
	if(!function_exists('wdjewelry_get_excerpt')){
		function wdjewelry_get_excerpt($excerpt,$number=''){
			global $post;
			$connect_excerpt = preg_replace('(\[.*?\])', '', $excerpt);
			
			if(!empty($connect_excerpt) && !empty($number)){
				$array = explode(" ",$connect_excerpt );
				if ( count($array) > $number ){
					for ($i = 0; $i < $number; $i++ ) {  $string[] = $array[$i] ;}
					$connect_excerpt = implode(" ", $string) ;
					$connect_excerpt = $connect_excerpt;
				} 
			}
			return $connect_excerpt.'';
		}
	}