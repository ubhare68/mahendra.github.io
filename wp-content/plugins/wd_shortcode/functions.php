<?php 
	if(!function_exists('wpdance_get_excerpt')){
		function wpdance_get_excerpt($excerpt,$number=20){
			global $post;
			$connect_excerpt = preg_replace('(\[.*?\])', '', $excerpt);
			if(!empty($connect_excerpt) && !empty($number)){
				$array = explode(" ",$connect_excerpt );
				if ( count($array) > $number ){
					for ($i = 0; $i < $number; $i++ ) {  $string[] = $array[$i] ;}
					$connect_excerpt = implode(" ", $string) ;
					$connect_excerpt .= '...';
				} 
			}
			return $connect_excerpt.'';
		}
	}