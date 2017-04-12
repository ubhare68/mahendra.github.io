<?php global $liwo ;
?>
<?php if ($liwo['switch_header_top'] == 1) { ?>
	<!-- top header bar -->
	<div id="topHeader">
	  <div class="wrapper">
	    <div class="top_contact_info">
	      <div class="container">
	        <?php //ts_top_menu(); ?>
		    
		    <?php if ($liwo['switch_header_social'] == 1) { ?>
	        	<?php get_template_part('content-parts/header', 'socials' ); ?>
		    <?php } ?>
	      
	      </div>
	    </div>
	    <!-- end top contact info -->
	  </div>
	</div>
	<!-- end top header -->
<?php } ?>