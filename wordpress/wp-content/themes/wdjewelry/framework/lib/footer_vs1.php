
<footer id="colophon" class="site-footer">
  <div class="footer-content-top">
    <div id="widget-newsletter">
      <div class="container">
        <div class="newletter">
          <?php if (is_active_sidebar('newletter')): ?>
            <?php dynamic_sidebar('newletter'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-content-main clearfix">
  	<div class="container">
    	<div class ='footer-content-main__area1 col-md-6 col-xs-12'>
    	   <?php if(is_active_sidebar("footer-1")){dynamic_sidebar("footer-1" );}?>
      </div>
      <div class ='footer-content-main__area2 col-md-6 col-xs-12'>
        <?php if(is_active_sidebar("footer-2")){dynamic_sidebar("footer-2" );}?>
      </div>
    	<div class ='footer-content-main__area3 col-md-6 col-xs-12'>
        <?php if(is_active_sidebar("footer-3")){dynamic_sidebar("footer-3" );}?>
      </div>
      <div class ='footer-content-main__area4 col-md-6 col-xs-12'>
        <?php if(is_active_sidebar("footer-4")){dynamic_sidebar("footer-4" );}?>
      </div>
  	</div>
  </div>

	<div class="footer-content-bottom clearfix">
		<div class="container">
  		<div class ='copyright col-md-12 col-xs-12'>
  			<?php if(get_theme_mod('layout_copyright_footer')){?>
  				<p><?php echo get_theme_mod('layout_copyright_footer');  ?></p>
  			<?php }else{ ?>
  				<p><?php esc_html_e('Copyright @ 2015 Jewelry . All Rights Reserved.','wdjewelry'); ?></p>
  			<?php } ?>
  		</div>
  		<div class ='widget-payment col-md-12 col-xs-12'>
  			<?php 
  				if(is_active_sidebar( "widget-payment" )):
  					dynamic_sidebar("widget-payment" );
  				endif;
  			?>
  		</div>
		</div>
	</div><!-- .footer-content-bottom -->
</footer><!-- .site-footer -->