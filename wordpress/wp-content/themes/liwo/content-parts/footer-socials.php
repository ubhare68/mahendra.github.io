<?php 
	global $liwo;
	if(is_home() || is_front_page()){
		$curve_graph = 3;
	} else {
		$curve_graph = 4;
	}
?>
<div class="curve_graph<?php echo $curve_graph; ?>">
  <div class="container">
    <ul class="footer_social_links">
      <li><a href="<?php echo $liwo['social_facebook'] ?>"><i class="fa fa-facebook fa-lg"></i></a></li>
      <li><a href="<?php echo $liwo['social_twitter'] ?>"><i class="fa fa-twitter fa-lg"></i></a></li>
      <li><a href="<?php echo $liwo['social_googleplus'] ?>"><i class="fa fa-google-plus fa-lg"></i></a></li>
      <li><a href="<?php echo $liwo['social_rss'] ?>"><i class="fa fa-rss fa-lg"></i></a></li>
    </ul>
  </div>
</div>