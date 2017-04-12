<?php 
	global $liwo ;
	if(isset($liwo['switch_header_top'])){
		if ($liwo['switch_header_top'] == 1) { 
?>
	<!-- top header bar -->
	<div id="topHeader">
	  <div class="wrapper">
	    <div class="top_contact_info">
	      <div class="container">
	        <ul class="tci_list_left">

		          <?php if ($liwo['switch_header_email'] == 1) { ?>
		          	<li><a href="mailto:<?php echo $liwo['header_email'] ?>"><i class="fa fa-envelope"></i> <?php echo $liwo['header_email'] ?></a> &nbsp;</li>
		          <?php } ?>
		          <?php if ($liwo['switch_header_phone'] == 1) { ?>
		          	<li><i class="fa fa-phone-square"></i> <?php echo $liwo['header_phone'] ?></li>
		          <?php } ?>
		          
	        </ul>
		    
		    <?php if ($liwo['switch_header_social'] == 1) { ?>
	        	<?php get_template_part('content-parts/header', 'socials' ); ?>
		    <?php } ?>
	      
	      </div>
	    </div>
	    <!-- end top contact info -->
	  </div>
	</div>
	<!-- end top header -->
<?php 
		}
	}
?>