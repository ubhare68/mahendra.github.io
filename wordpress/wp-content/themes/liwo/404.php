<?php
	/**
	 * index.php
	 * The main post loop in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	**/
	
	$post = new stdClass();
	$post->ID = 24;
	get_header();
	global $liwo;

?>
	
    <div class="page_title">
      <div class="container">
        <div class="title">
          <h1>W PL O CK ER .COM<?php echo __( '404 Error Page', 'themestudio' ); ?></h1>
        </div>
        <div class="pagenation"><?php ts_breadcrumbs(); ?></div>
      </div>
    </div>
	
	<div class="container">
	    <div class="content_fullwidth">
	      <div class="error_pagenotfound"> <strong>404</strong> <br />
	        <b>Oops... Page Not Found!</b> <em>Sorry the Page Could not be Found here.</em>
	        <p>Try using the button below to go to main page of the site</p>
	        <div class="clearfix mar_top3"></div>
	        <a href="<?php echo get_home_url(); ?>" class="but_goback"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; Go to Back</a> </div>
	      <!-- end error page notfound -->
	    </div>
	</div>

<?php
get_footer();