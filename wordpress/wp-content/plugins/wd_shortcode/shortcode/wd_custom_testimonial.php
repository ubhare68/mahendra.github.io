<?php

function TS_VCSC_Testimonial_Slider_Category1($atts, $content = null){
				global $VISUAL_COMPOSER_EXTENSIONS;
				ob_start();
				wp_enqueue_style('ts-extend-owlcarousel2');
				wp_enqueue_script('ts-extend-owlcarousel2');
				wp_enqueue_style('ts-font-ecommerce');
				wp_enqueue_style('ts-extend-animations');
				wp_enqueue_style('ts-visual-composer-extend-front');
				wp_enqueue_script('ts-visual-composer-extend-front');
				
				extract( shortcode_atts( array(
					'testimonialcat'                => '',
					'style'							=> 'style1',
					'show_author'					=> 'true',
					'show_avatar'					=> 'true',
					'testimonials_slide'			=> 1,
					'auto_height'                   => 'true',
					'page_rtl'						=> 'false',
					'auto_play'                     => 'false',
					'show_playpause'				=> 'true',
					'show_bar'                      => 'true',
					'bar_color'                     => '#dd3333',
					'show_speed'                    => 5000,
					'stop_hover'                    => 'true',
					'show_navigation'               => 'true',
					'show_dots'						=> 'true',
					'page_numbers'                  => 'false',
					'items_loop'					=> 'true',				
					'animation_in'					=> 'ts-viewport-css-flipInX',
					'animation_out'					=> 'ts-viewport-css-slideOutDown',
					'animation_mobile'				=> 'false',
					'content_wpautop'				=> 'false',
					'margin_top'                    => 0,
					'margin_bottom'                 => 0,
					'el_id'                         => '',
					'el_class'                      => '',
					'css'							=> '',
				), $atts ));
				
				$testimonial_random                 = mt_rand(999999, 9999999);
				
				if (!empty($el_id)) {
					$testimonial_slider_id			= $el_id;
				} else {
					$testimonial_slider_id			= 'ts-vcsc-testimonial-slider-' . $testimonial_random;
				}
				
				if (!is_array($testimonialcat)) {
					$testimonialcat 				= array_map('trim', explode(',', $testimonialcat));
				}
				
				// Check for Front End Editor
				if ($VISUAL_COMPOSER_EXTENSIONS->TS_VCSC_VCFrontEditMode == "true") {
					$slider_class					= 'owl-carousel2-edit';
					$slider_message					= '<div class="ts-composer-frontedit-message">' . __( 'The slider is currently viewed in front-end edit mode; slider features are disabled for performance and compatibility reasons.', "ts_visual_composer_extend" ) . '</div>';
					$testimonial_style				= 'width: ' . (100 / $testimonials_slide) . '%; height: 100%; float: left; margin: 0; padding: 0;';
					$frontend_edit					= 'true';
				} else {
					$slider_class					= 'ts-owlslider-parent owl-carousel2';
					$slider_message					= '';
					$testimonial_style				= '';
					$frontend_edit					= 'false';
				}
				
				$output 							= '';
				$wpautop 							= ($content_wpautop == "true" ? true : false);
				
				// Retrieve Testimonial Post Main Content
				$testimonial_array					= array();
				$category_fields 	                = array();
				$args = array(
					'no_found_rows' 				=> 1,
					'ignore_sticky_posts' 			=> 1,
					'posts_per_page' 				=> -1,
					'post_type' 					=> 'ts_testimonials',
					'post_status' 					=> 'publish',
					'orderby' 						=> 'title',
					'order' 						=> 'ASC',
				);
				$testimonial_query = new WP_Query($args);
				if ($testimonial_query->have_posts()) {
					foreach($testimonial_query->posts as $p) {
						$categories = TS_VCSC_GetTheCategoryByTax($p->ID, 'ts_testimonials_category');
						if ($categories && !is_wp_error($categories)) {
							$category_slugs_arr     = array();
							$arrayMatch             = 0;
							foreach ($categories as $category) {
								if (in_array($category->slug, $testimonialcat)) {
									$arrayMatch++;
								}
								$category_slugs_arr[] = $category->slug;
								$category_data = array(
									'slug'			=> $category->slug,
									'name'			=> $category->cat_name,
									'number'    	=> $category->term_id,
								);
								$category_fields[] 	= $category_data;
							}
							$categories_slug_str 	= join(",", $category_slugs_arr);
						} else {
							$category_slugs_arr     = array();
							$arrayMatch             = 0;
							if (in_array("ts-testimonial-none-applied", $testimonialcat)) {
								$arrayMatch++;
							}
							$category_slugs_arr[]   = '';
							$categories_slug_str    = join(",", $category_slugs_arr);
						}
						if ($arrayMatch > 0) {
							$testimonial_data = array(
								'author'			=> $p->post_author,
								'name'				=> $p->post_name,
								'title'				=> $p->post_title,
								'id'				=> $p->ID,
								'content'			=> $p->post_content,
								'categories'        => $categories_slug_str,
							);
							$testimonial_array[] 	= $testimonial_data;
						}
					}
				}
				wp_reset_postdata();
				
				if (function_exists('vc_shortcode_custom_css_class')) {
					$css_class 	= apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'ts-testimonials-slider ' . $slider_class . ' ' . $el_class . ' ' . vc_shortcode_custom_css_class($css, ' '), 'TS_VCSC_Testimonial_Slider_Category', $atts);
				} else {
					$css_class	= 'ts-testimonials-slider ' . $slider_class . ' ' . $el_class;
				}
				
				$output .= '<div id="' . $testimonial_slider_id . '-container" class="ts-testimonials-slider-container" style="margin-top: ' . $margin_top . 'px; margin-bottom: ' . $margin_bottom . 'px;">';
					// Front-Edit Message
					if ($frontend_edit == "true") {
						$output .= $slider_message;
					}
					// Add Progressbar
					if (($auto_play == "true") && ($show_bar == "true") && ($frontend_edit == "false")) {
						$output .= '<div id="ts-owlslider-progressbar-' . $testimonial_random . '" class="ts-owlslider-progressbar-holder" style=""><div class="ts-owlslider-progressbar" style="background: ' . $bar_color . '; height: 100%; width: 0%;"></div></div>';
					}
					// Add Navigation Controls
					if ($frontend_edit == "false") {
						$output .= '<div id="ts-owlslider-controls-' . $testimonial_random . '" class="ts-owlslider-controls" style="' . (((($auto_play == "true") && ($show_playpause == "true")) || ($show_navigation == "true")) ? "display: block;" : "display: none;") . '">';
							$output .= '<div id="ts-owlslider-controls-next-' . $testimonial_random . '" style="' . (($show_navigation == "true") ? "display: block;" : "display: none;") . '" class="ts-owlslider-controls-next"><span class="ts-ecommerce-arrowright5"></span></div>';
							$output .= '<div id="ts-owlslider-controls-prev-' . $testimonial_random . '" style="' . (($show_navigation == "true") ? "display: block;" : "display: none;") . '" class="ts-owlslider-controls-prev"><span class="ts-ecommerce-arrowleft5"></span></div>';
							if (($auto_play == "true") && ($show_playpause == "true")) {
								$output .= '<div id="ts-owlslider-controls-play-' . $testimonial_random . '" class="ts-owlslider-controls-play active"><span class="ts-ecommerce-pause"></span></div>';
							}
						$output .= '</div>';
					}
					// Add Slider
					$output .= '<div id="' . $testimonial_slider_id . '" class="' . $css_class . '" data-id="' . $testimonial_random . '" data-items="' . $testimonials_slide . '" data-rtl="' . $page_rtl . '" data-loop="' . $items_loop . '" data-navigation="' . $show_navigation . '" data-dots="' . $show_dots . '" data-mobile="' . $animation_mobile . '" data-animationin="' . $animation_in . '" data-animationout="' . $animation_out . '" data-height="' . $auto_height . '" data-play="' . $auto_play . '" data-bar="' . $show_bar . '" data-color="' . $bar_color . '" data-speed="' . $show_speed . '" data-hover="' . $stop_hover . '">';
						// Build Testimonial Post Main Content
						foreach ($testimonial_array as $index => $array) {
							//$Testimonial_Author				= $testimonial_array[$index]['author'];
							//$Testimonial_Name 				= $testimonial_array[$index]['name'];
							$Testimonial_Title 				= $testimonial_array[$index]['title'];
							$Testimonial_ID 				= $testimonial_array[$index]['id'];
							$Testimonial_Content 			= $testimonial_array[$index]['content'];
							//$Testimonial_Category 		= $testimonial_array[$index]['categories'];
							$Testimonial_Image				= wp_get_attachment_image_src(get_post_thumbnail_id($Testimonial_ID), 'full');
							if ($Testimonial_Image == false) {
								$Testimonial_Image          = TS_VCSC_GetResourceURL('images/defaults/default_person.jpg');
							} else {
								$Testimonial_Image          = $Testimonial_Image[0];
							}
							
							// Retrieve Testimonial Post Meta Content
							$custom_fields 						= get_post_custom($Testimonial_ID);
							$custom_fields_array				= array();
							foreach ($custom_fields as $field_key => $field_values) {
								if (!isset($field_values[0])) continue;
								if (in_array($field_key, array("_edit_lock", "_edit_last"))) continue;
								if (strpos($field_key, 'ts_vcsc_testimonial_') !== false) {
									$field_key_split 			= explode("_", $field_key);
									$field_key_length 			= count($field_key_split) - 1;
									$custom_data = array(
										'group'					=> $field_key_split[$field_key_length - 1],
										'name'					=> 'Testimonial_' . ucfirst($field_key_split[$field_key_length]),
										'value'					=> $field_values[0],
									);
									$custom_fields_array[] = $custom_data;
								}
							}
							foreach ($custom_fields_array as $index => $array) {
								${$custom_fields_array[$index]['name']} = $custom_fields_array[$index]['value'];
							}
							if (isset($Testimonial_Position)) {
								$Testimonial_Position 			= $Testimonial_Position;
							} else {
								$Testimonial_Position 			= '';
							}
							if (isset($Testimonial_Author)) {
								$Testimonial_Author 			= $Testimonial_Author;
							} else {
								$Testimonial_Author 			= '';
							}
		
							if ($style == "style1") {
								$output .= '<div class="ts-testimonial-main" style="width: 99%; margin: 0 auto;">';
										if ($show_avatar == "true") {
												$output .= '<div class="wd-testimonial-thumb"><img src="' . $Testimonial_Image . '" alt=""></div>';
										}

									$output .= '<div class="wd-testimonial-content">';
										if (($show_avatar == "true") || ($show_author == "true")) {
											$output .= '<span class="ww-testimonial-arrow"></span>';
										}
										if (function_exists('wpb_js_remove_wpautop')){
											$output .= '' . wpb_js_remove_wpautop(do_shortcode($Testimonial_Content), $wpautop) . '';
										} else {
											$output .= '' . do_shortcode($Testimonial_Content) . '';
										}
									$output .= '</div>';
								
										
											if ($show_author == "true") {
												$output .= '<div class="wd-testimonial-user-name">' . $Testimonial_Author . '</div>';
												$output .= '<div class="wd-testimonial-user-meta">' . $Testimonial_Position . '</div>';
											}
									
								$output .= '</div>';

							}
							if ($style == "style2") {
								$output .= '<div class="ts-testimonial-main style2 clearFixMe" style="width: 99%; margin: 0 auto;">';
									$output .= '<div class="blockquote">';
										$output .= '<span class="leftq quotes"></span>';
											if (function_exists('wpb_js_remove_wpautop')){
												$output .= '' . wpb_js_remove_wpautop(do_shortcode($Testimonial_Content), $wpautop) . '';
											} else {
												$output .= '' . do_shortcode($Testimonial_Content) . '';
											}
										$output .= '<span class="rightq quotes"></span>';
									$output .= '</div>';
									if (($show_avatar == "true") || ($show_author == "true")) {
										$output .= '<div class="information">';
											if ($show_avatar == "true") {
												$output .= '<img src="' . $Testimonial_Image . '" style="width: 150px; height: auto; " width="150" height="auto" />';
											}
											if ($show_author == "true") {
												$output .= '<div class="author" style="' . ($show_avatar == "false" ? "margin-left: 15px;" : "") . '">' . $Testimonial_Author . '</div>';
												$output .= '<div class="metadata">' . $Testimonial_Position . '</div>';
											}
										$output .= '</div>';
									}
								$output .= '</div>';
							}
							if ($style == "style3") {
								$output .= '<div class="ts-testimonial-main style3 clearFixMe" style="width: 99%; margin: 0 auto;">';
									if ($show_avatar == "true") {
										$output .= '<div class="photo">';
											$output .= '<img src="' . $Testimonial_Image . '" alt=""/>';
										$output .= '</div>';
									}
									$output .= '<div class="content" style="' . ($show_avatar == "false" ? "margin-left: 0;" : "") . '">';
										$output .= '<span class="laquo"></span>';
											if (function_exists('wpb_js_remove_wpautop')){
												$output .= '' . wpb_js_remove_wpautop(do_shortcode($Testimonial_Content), $wpautop) . '';
											} else {
												$output .= '' . do_shortcode($Testimonial_Content) . '';
											}
										$output .= '<span class="raquo"></span>';
									$output .= '</div>';
									if ($show_author == "true") {
										$output .= '<div class="sign">';
											$output .= '<span class="author">' . $Testimonial_Author . '</span>';
											$output .= '<span class="metadata">' . $Testimonial_Position . '</span>';
										$output .= '</div>';
									}
								$output .= '</div>';
							}
							if ($style == "style4") {
								$output .= '<div class="ts-testimonial-main style4 clearFixMe" style="width: 99%; margin: 0 auto 32px auto;">';
									if (($show_avatar == "true") || ($show_author == "true")) {
										$output .= '<div class="ts-testimonial-author-info clearfix">';
											if ($show_avatar == "true") {
												$output .= '<div class="ts-testimonial-author-image">';
													$output .= '<img src="' . $Testimonial_Image . '" alt="">';
													$output .= '<span class="ts-testimonial-author-overlay"></span>';
												$output .= '</div>';
											}
											if ($show_author == "true") {
												$output .= '<span class="ts-testimonial-author-name">' . $Testimonial_Author . '</span>';
												$output .= '<span class="ts-testimonial-author-position">' . $Testimonial_Position . '</span>';
											}
										$output .= '</div>';
									}
									$output .= '<div class="ts-testimonial-statement clearfix">';
										if (function_exists('wpb_js_remove_wpautop')){
											$output .= '' . wpb_js_remove_wpautop(do_shortcode($Testimonial_Content), $wpautop) . '';
										} else {
											$output .= '' . do_shortcode($Testimonial_Content) . '';
										}
									$output .= '</div>';			
									$output .= '<div class="ts-testimonial-bottom-arrow"></div>';
								$output .= '</div>';
							}
							
							foreach ($custom_fields_array as $index => $array) {
								unset(${$custom_fields_array[$index]['name']});
							}
							if ($frontend_edit == 'true') {
								break;
							}
						}
					
					$output .= '</div>';
				$output .= '</div>';
				
				echo $output;
				
				$myvariable = ob_get_contents();
			ob_get_clean();
				return $myvariable;
			}
add_shortcode('ts_testimonial_custom','TS_VCSC_Testimonial_Slider_Category1');