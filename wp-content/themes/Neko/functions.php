<?php

/**
 * remove_default_widgets
 *
 * @todo remove?
 */
function remove_default_widgets() {
	
	if (function_exists('unregister_sidebar_widget')) {
	unregister_sidebar_widget('Calendar');
	unregister_sidebar_widget('Recent Comments');
	unregister_sidebar_widget('Mysearch');
	unregister_sidebar_widget('Text 1');
	}
}

add_action('widgets_init','remove_default_widgets', 0);

/*
 * Lee's version of recent comments
 */
function mw_recent_comments(
						$no_comments = 5,
						$show_pass_post = false,
						$title_length = 150, 	// shortens the title if it is longer than this number of chars
						$author_length = 30,	// shortens the author if it is longer than this number of chars
						$wordwrap_length = 150, // adds a blank if word is longer than this number of chars
						$type = 'all', 	// Comments, trackbacks, or both?
						$format = '<li>%date%: <a href="%permalink%" title="%title%">%title%</a> (von %author_full%)</li>',
						$date_format = 'd.m.y, H:i',
						$none_found = '<li style="padding:5px;">No Comments Found</li>',	// None found
						$type_text_pingback = 'Pingback von',
						$type_text_trackback = 'Trackback von',
						$type_text_comment = 'von'
						)
	{

		//Language...
		$mwlang_anonymous = 'Anonym'; // Anonymous
		$mwlang_authorurl_title_before = 'Webseite von &lsaquo;';
		$mwlang_authorurl_title_after = '&rsaquo; besuchen';
	
	
		global $wpdb;
	
		$request = "SELECT ID, 
					comment_ID, 
					comment_content, 
					comment_author, 
					comment_author_url, 
					comment_date, 
					post_title, 
					comment_type 
					FROM {$wpdb->comments} 
					LEFT JOIN {$wpdb->posts} 
					ON {$wpdb->posts}.ID = {$wpdb->comments}.comment_post_ID 
					WHERE post_status IN ('publish','static')";
	
		switch($type) {
			case 'all':
				// Do nothing
			break;
			
			case 'comment_only':
				$request .= "AND $wpdb->comments.comment_type='' ";
			break;
			
			case 'trackback_only':
				$request .= "AND ( $wpdb->comments.comment_type='trackback' OR $wpdb->comments.comment_type='pingback' ) ";
			break;
			
			default:
				// Do nothing
			break;
		}
	
		if (! $show_pass_post) {
			$request .= "AND post_password ='' ";
		}
	
		$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";
	
		$comments = $wpdb->get_results($request);
		
		$output = '';
		
		if ($comments) {
			foreach ($comments as $comment) {
	
				// Permalink to post/comment
				$loop_res['permalink'] = get_permalink($comment->ID). '#comment-' . $comment->comment_ID;
				
				// Title of the post
				$loop_res['post_title'] = stripslashes($comment->post_title);
				$loop_res['post_title'] = wordwrap($loop_res['post_title'], $wordwrap_length, ' ' , 1);
				
				if (strlen($loop_res['post_title']) >= $title_length) {
				$loop_res['post_title'] = substr($loop_res['post_title'], 0, $title_length) . '&#8230;';
				}
				
				// Author's name only
				$loop_res['author_name'] = stripslashes($comment->comment_author);
				$loop_res['author_name'] = wordwrap($loop_res['author_name'], $wordwrap_length, ' ' , 1);
				
				if ($loop_res['author_name'] == '') $loop_res['author_name'] = $mwlang_anonymous;
				if (strlen($loop_res['author_name']) >= $author_length) {
				$loop_res['author_name'] = substr($loop_res['author_name'], 0, $author_length) . '&#8230;';
				}
				
				// Full author (link, name)
				$author_url = $comment->comment_author_url;
				if (empty($author_url)) {
				$loop_res['author_full'] = $loop_res['author_name'];
				} else {
				$loop_res['author_full'] = '<a href="' . $author_url . '" title="' . $mwlang_authorurl_title_before . $loop_res['author_name'] . $mwlang_authorurl_title_after . '">' . $loop_res['author_name'] . '</a>';
				}
				
				/*
				// Comment excerpt
				$comment_excerpt = strip_tags($comment->comment_content);
				$comment_excerpt = stripslashes($comment_excerpt);
				if (strlen($comment_excerpt) >= $comment_length) {
				$comment_excerpt = substr($comment_excerpt, 0, $comment_length) . '...';
				}
				
				*/
				
				// Comment type
				if ( $comment->comment_type == 'pingback' ) {
				$loop_res['comment_type'] = $type_text_pingback;
				} elseif ( $comment->comment_type == 'trackback' ) {
				$loop_res['comment_type'] = $type_text_trackback;
				} else {
				$loop_res['comment_type'] = $type_text_comment;
				}
				
				// Date of comment
				$loop_res['comment_date'] = mysql2date($date_format, $comment->comment_date);
				
				// Output element
				$element_loop = str_replace('%permalink%', $loop_res['permalink'], $format);
				$element_loop = str_replace('%title%', $loop_res['post_title'], $element_loop);
				$element_loop = str_replace('%author_name%', $loop_res['author_name'], $element_loop);
				$element_loop = str_replace('%author_full%', $loop_res['author_full'], $element_loop);
				$element_loop = str_replace('%date%', $loop_res['comment_date'], $element_loop);
				$element_loop = str_replace('%type%', $loop_res['comment_type'], $element_loop);
				
				
				$output .= $element_loop . "\n";
	
	
			} //foreach
	
			$output = convert_smilies($output);
	
		}
		else {
			$output .= $none_found;
		}
	
		echo $output;
	}



// below are widget custom to custom the widget looks without the default //

if ( function_exists('register_sidebars') )  {

	register_sidebars(1, 
		array(
			'before_widget' => '<ul>',
			'after_widget' => '</ul>',
			'before_title' => '<ol>',
			'after_title' => '</ol>'
		)
	);

	function unregister_problem_widgets() {
		unregister_sidebar_widget('RSS 1');
		unregister_sidebar_widget('Search');
		unregister_sidebar_widget('Links');
		unregister_sidebar_widget('Recent Comments');
	}
	
	add_action('widgets_init','unregister_problem_widgets');
}

// below are widget custom to custom the widget looks without the default //

function widget_mytheme_blogroll() {
	
	echo '<ol>Blogroll</ol>';
	get_links(-1, '<li>', '</li>', ' - ');
	
}

if ( function_exists('register_sidebar_widget') ) {
	register_sidebar_widget(__('Blogroll'), 'widget_mytheme_blogroll');
}

if ( function_exists('register_sidebar_widget') ) { 
	register_sidebar_widget(__('Recent_Comments'), 'widget_Recent_Comments');
}


function widget_Recent_Comments() {
	
	echo '<ol>Recent Comments</ol>
			<ul>';
	
	if (function_exists("get_recent_comments")) {
		get_recent_comments();
	}
	else {
		mw_recent_comments(5, false, 150, 150, 135, 'all', '<li style="border:0px; "><a style="background-image:none; padding:10px;" href="%permalink%" title="%title%"><img style="float:left; margin:0px 5px 0px 0px; border:0px;" src="' .get_option('home'). '/wp-content/themes/Neko/img/user_comment.png" /><b>%author_name%</b><br>%title%...</a></li>','d.m'); 
	}
	
	echo '</ul>';
	
}

if ( function_exists('register_sidebar_widget') ) { 
	register_sidebar_widget(__('Mysearch'), 'widget_mytheme_mysearch');
}



function widget_mytheme_Rss() {
	
	echo '<ol>Rss</ol>
			<li><a href="<?php bloginfo("rss2_url"); ?>" title="<?php _e("Syndicate this site using RSS"); ?>">Main Entries RSS</a></li>
			<li><a href="<?php bloginfo("comments_rss2_url"); ?>" title="<?php _e("The latest comments to all posts in RSS"); ?>"><?php _e("Comments RSS"); ?></a></li>';

}

if ( function_exists("register_sidebar_widget") ) {
	register_sidebar_widget(__("MyRSS"), "widget_mytheme_myrss");
}


function widget_mytheme_myrecentcomment() {
	
	echo '<ol>Recent Comments</ol>
		<ul>';

	if(function_exists("get_recent_comments")) {
		get_recent_comments();
	}
	else {
		mw_recent_comments(5, false, 150, 150, 135, 'all', '<li style="border:0px; "><a style="background-image:none; padding:10px;" href="%permalink%" title="%title%"><img style="float:left; margin:0px 5px 0px 0px; border:0px;" src="' .get_option('home'). '/wp-content/themes/Neko/img/user_comment.png" /><b>%author_name%</b><br>%title%...</a></li>','d.m');
	}

	echo '</ul>';

}


// Tag Cloud
function widget_mytheme_tag_cloud() {
	
	echo '<div style="margin-bottom:10px;">
	<ol>Tag Cloud</ol>
			<ul>
			<div style="padding:7px; line-height:20px;">';

wp_tag_cloud('smallest=8&largest=17&number=25&orderby=name');
	
	echo 		'</div>
	</ul>
</div>';
	
}

if ( function_exists('register_sidebar_widget') ) {
	register_sidebar_widget(__('tag_cloud'), 'widget_mytheme_tag_cloud');
}

// Search
function widget_mytheme_search() {
	
	echo '
	<ol>Search</ol>
			<ul>
			<div style="padding:5px; line-height:20px;">';
echo '<form style="margin:0px;" method="get" action="'.get_option('home').'/">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<input style="margin:0px; width:80px; font-weight:bold; border:1px solid #cccccc;" type="text" VALUE="Search..." ONFOCUS="clearDefault(this)" name="s" id="s" size="19" class="search-top" /></td>
<td width="30" style="padding:0px;" valign="middle" align="left"><input type="image" src="'.get_option('home').'/wp-content/themes/Neko/img/go.gif" style="margin:0px 0px 0px 5px; padding:0px; border:0px;" value="GO" />
</td>
</tr>
</table>
</form>';
echo'</div></ul>';
	
}

if ( function_exists('register_sidebar_widget') ) {
	register_sidebar_widget(__('search'), 'widget_mytheme_search');
}

    
    
function Neko_add_theme_page() {
	
	if ( $_GET['page'] == basename(__FILE__) ) {

		// save settings
		if ( 'save' == $_REQUEST['action'] ) {
		
			update_option( 'Neko_asideid', $_REQUEST[ 's_asideid' ] );
			update_option( 'Neko_sortpages', $_REQUEST[ 's_sortpages' ] );
			
			if( isset( $_POST[ 'excludepages' ] ) ) 
			{ 
				update_option( 'Neko_excludepages', implode(',', $_POST['excludepages']) ); 
			} 
			else 
			{ 
				delete_option( 'Neko_excludepages' ); 
			}
			
			// goto theme edit page
			header("Location: themes.php?page=functions.php&saved=true");
			die;
			
			// reset settings
			} 
			else if( 'reset' == $_REQUEST['action'] ) {
			
			delete_option( 'Neko_asideid' );
			delete_option( 'Neko_sortpages' );			
			delete_option( 'Neko_excludepages' );
			
			
			// goto theme edit page
			header("Location: themes.php?page=functions.php&reset=true");
			die;

		}
	}


	add_theme_page("Exclude Top Links", "Exclude Top Links", 'edit_themes', basename(__FILE__), 'Neko_theme_page');

}

function Neko_theme_page() {

	// --------------------------
	// Neko theme page content
	// --------------------------
	
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Neko Theme: Settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Neko Theme: Settings reset.</strong></p></div>';
	
	echo '
	<style>
	.wrap { border:#ccc 1px dashed;}
	.block { margin:1em;padding:1em;line-height:1.6em;}
	table tr td {border:#ddd 1px solid;font-family:Verdana, Arial, Serif;font-size:0.9em;}
	h4 {font-size:1.3em;color:#265e15;font-weight:bold;margin:0;padding:10px 0;}	
	</style>
	<div class="wrap">
	<form method="post">
	<fieldset class="options">
	<legend>Neko Theme Settings</legend>
	<table width="100%" cellspacing="5" cellpadding="10" class="editform">
	<tr valign="top">
	<td align="left">
	';
	
	ml_heading("List Pages / Navigation");
			
	global $wpdb;
	
	if (function_exists('wp_list_bookmarks')) { //WP 2.1 or greater
		$results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_type='page' AND post_parent=0 ORDER BY post_title");
	}
	else {
		$results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_status='static' AND post_parent=0 ORDER BY post_title");
	}
	
	$excludepages = explode(',', get_settings('Neko_excludepages'));
	
	if($results) {	

		_e('<br/>Exclude the Following Pages from the Top Navigation <br/><br/>');
	
		foreach($results as $page) {
			echo '<input type="checkbox" name="excludepages[]" value="' . $page->ID . '"';
			if(in_array($page->ID, $excludepages)==true) { echo ' checked="checked"'; }
			echo ' /> <a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a><br />';
		}		
	}
	
	_e('<br/><br/>');
	
	echo "<br/><strong> Sort the List Pages by </strong><br/>";
	
	ml_input( "s_sortpages", "radio", "Page Title ?", "post_title", get_settings( 'Neko_sortpages' ) );		
	ml_input( "s_sortpages", "radio", "Date ?", "post_date", get_settings( 'Neko_sortpages' ) );		
	ml_input( "s_sortpages", "radio", "Page Order ?", "menu_order", get_settings( 'Neko_sortpages' ) );
	
	echo "(Each Page can be given a page order number, from the wordpress admin, edit page area)";
	echo "<br/>";			
	echo '
	</td>
	</tr>	
	<tr>
	<td valign="top" colspan="2" style="border:0px;margin:0;padding:0;">
	<input type="hidden" name="action" value="save" /> ' . 
	ml_input( "save", "submit", "", "Save Settings" ) .
	'</td>
	</tr>
	</table>
	</fieldset>
	</form>
	
	<form method="post">
	
	<fieldset class="options">
	<legend>Reset</legend>
	
	<p>If for some reason you want to uninstall Neko then press the reset button to clean things up in the database.</p>
	<p>You have to make sure to delete the theme folder, if you want to completely remove the theme.</p>
	';
	
	ml_input( "reset", "submit", "", "Reset Settings" );
	
	echo'
	</div>
	<input type="hidden" name="action" value="reset" />
	</form>';
}
add_action('admin_menu', 'Neko_add_theme_page');


function ml_input( $var, $type, $description = "", $value = "", $selected="" ) {

	// ------------------------
	// add a form input control
	// ------------------------
	
	echo "\n";
	
	switch( $type ){
	
	case "text":
	
	echo "<input name=\"$var\" id=\"$var\" type=\"$type\" style=\"width: 60%\" class=\"textbox\" value=\"$value\" />";
	
	break;
	
	case "submit":
	
	echo "<p class=\"submit\"><input name=\"$var\" type=\"$type\" value=\"$value\" /></p>";
	
	break;
	
	case "option":
	
	if( $selected == $value ) { $extra = "selected=\"true\""; }
	
	echo "<option value=\"$value\" $extra >$description</option>";
	
	break;
	case "radio":
	
	if( $selected == $value ) { $extra = "checked=\"true\""; }
	
	echo "<label><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";
	
	break;
	
	case "checkbox":
	
	if( $selected == $value ) { $extra = "checked=\"true\""; }
	
	echo "<label for=\"$var\"><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";
	
	break;
	
	case "textarea":
	
	echo "<textarea name=\"$var\" id=\"$var\" style=\"width: 80%; height: 10em;\" class=\"code\">$value</textarea>";
	
	break;
	}
}

function ml_heading( $title ) {

	// ------------------
	// add a table header
	// ------------------
	
	echo "<h4>" .$title . "</h4>";

}


function the_title2($before = '', $after = '', $echo = true, $length = false) {

	$title = get_the_title();

	if ( $length && is_numeric($length) ) {
    	$title = substr( $title, 0, $length );
	}

	if ( strlen($title)> 0 ) {

		$title = apply_filters('the_title2', $before . $title . $after, $before, $after);
             
		if ( $echo ) {
			echo $title;
		}
		else {
			return $title;
		}

	}
      
}
?>