<?php
	if(!function_exists('wdjewelry_check_audio_soundcloud')){
		function wdjewelry_check_audio_soundcloud($link_audio){
			if(preg_match('/^(https?:\/\/)?soundcloud.com\/(.*)/',$link_audio,$match)){
				return $match[0];
			}else{
				return '';
			}
		}
	}
	if(!function_exists('wdjewelry_audio_soundcloud')){
		function wdjewelry_audio_soundcloud($link_audio){
			if(strstr($link_audio,'soundcloud.com')){
				return '<iframe width="100%" height="200" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.wdjewelry_check_audio_soundcloud($link_audio).'&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false&amp;visual=false"></iframe>';
			}else{
				return $link_audio;
			}
			
		}
	}