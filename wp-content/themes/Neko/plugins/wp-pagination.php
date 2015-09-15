<?php
/*
Plugin Name: WP Paginate
Version: .1.1
Plugin URI: http://www.scriptygoddess.com/archives/2004/05/23/wppaginate/
Description: This function will paginate your posts. (See plugin URI for details on use)
Author: Jennifer - Scriptygoddess
Author URI: http://scriptygoddess.com
*/

/*
Ability to truncate long navigation lists provided by Stan Schwarz http://bort.gps.caltech.edu
*/

function wpPaginate($paginateAfterNposts = '', $pageNavDivider = ' | ', $paginateHome = FALSE, $briefnavigation = TRUE, $navpad = 6) {
  global $posts_per_page, $posts;
  global $paginationNavigation;
  
  $paginationNavigation = '';
    
  if ($paginateAfterNposts == '') {
    $paginateAfterNposts = $posts_per_page;
  }

    //should I paginate or not?
  if ($paginateHome) {
    //yes, I've said to paginte home
    $paginateThePage = true;
  } else if ($_SERVER['QUERY_STRING'] == '') {
    //we've said not to paginate home -
    //if there's no "query strings" - we must be on the home page
    //therefore do not paginate.
    //break out of function
    return;
  } else {
    $paginateThePage = true;
  }
    
  if (count($posts) <= 0) {
    return;
  }
    
  if ($paginateThePage) {
    if (!(isset($_GET['offset']))) {
      $offset = 0;
    } else if ($_GET['offset'] == "all") {
      //we're not paginating - because all posts have been requested. Break out of function.
      return;
    } else {
      $offset = $_GET['offset'];
    }
        
        //if there's enough content to paginate, and we haven't requested to show everything...
    if ( (count($posts) > $paginateAfterNposts) && $_GET['offset'] != "all" ) {
            //get total number of pages needed
      $num_of_pages = ceil(count($posts)/$paginateAfterNposts);

      //print out navigation
      $paginationNavigation .= "Page: ";
      //If the user requested a navigation, then figure out what pages to make links for.
      if ($briefnavigation) {
	$lowtest = $offset +1 - $navpad;
	$hightest = $offset + 1 + $navpad;
      }
      for ($i = 0; $i < $num_of_pages; $i++) {
	$pg = $i + 1;
	//Make the navigation
	//Make a link for page 1 and the last page, and for pages offset-$navpad to offset+$navpad
        //Also make all page links if $briefnavigation == false
        if ((!$briefnavigation) || (($pg == 1) || ($pg == $num_of_pages) || (($pg > $lowtest) && ($pg < $hightest)))) {
	  if ($i != 0) {
	    $paginationNavigation .= $pageNavDivider;
	  }
	//are we on the current page?
	  if ($offset != $i) {  
	    if(strrpos($_SERVER['REQUEST_URI'],'&offset=') !== false) {
	      $newurl = preg_replace('/(\&offset=)(\d+)(&|)/i', '', $_SERVER['REQUEST_URI']);
	      $addchar = "&";
	    } else if (strrpos($_SERVER['REQUEST_URI'],'?offset=') !== false) {
	      $newurl = preg_replace('/(\?offset=)(\d+)(&|)/i', '', $_SERVER['REQUEST_URI']);
	      if (strrpos($newurl,'?') !== false) {
		$addchar = "&";
	      } else {
		$addchar = "?";
	      }
	    } else {
	      $newurl = $_SERVER['REQUEST_URI'];
	      $addchar = "?";
	    }
	    $paginationNavigation .= "<a href='".$newurl.$addchar."offset=$i'>$pg</a>";
	  } else {
	    $paginationNavigation .= $pg;
	  }
	} else {
	  //Add the divider. If the string ends in an ellipsis ('...') then do nothing
	  if (!preg_match ("/\.\.\.\$/", $paginationNavigation)) {
	    $paginationNavigation .= "$pageNavDivider...";
	  }
	}
      }
    } // end creating navigation
        
    $cutafterPostNum = $offset * $paginateAfterNposts;
    $posts = array_slice($posts, $cutafterPostNum, $paginateAfterNposts);
        
  } // end if paginate the page at all
} //end wp-paginate() function

function print_pg_navigation ($before = '', $after = '') {
    global $paginationNavigation;
    if ($paginationNavigation != '') {
        echo $before.$paginationNavigation.$after;
    }
}
?>