<?php $page_id = wdjewelry_page_id(); ?>
<footer id="colophon" class="site-footer footer-line">
	<div class="container">
  	<div class ='wd-footer-widget row'>
  			<?php if(get_post_meta($page_id,'_sidebar_f1',true ) != 'sidebar_hidden'): ?>
  				<?php if(get_post_meta($page_id,'_sidebar_f1',true )): ?>
  					<div class="site-footer footer-logo col-sm-24">
  					<?php if (is_active_sidebar(get_post_meta($page_id,'_sidebar_f1',true ))): ?>
  						<?php dynamic_sidebar(get_post_meta($page_id,'_sidebar_f1',true )); ?>
  					<?php endif; ?>
  					</div>
  				<?php else: ?>
  					<div class="site-footer footer-logo col-sm-24">
  					<?php 
  						if(is_active_sidebar("footer-1")):
  							dynamic_sidebar("footer-1" );
  						endif;
  					?>
  					</div>
  				<?php endif; ?>
  			<?php endif; ?>
  			<?php if(get_post_meta($page_id,'_sidebar_f2',true ) != 'sidebar_hidden'): ?>
  				<?php if(get_post_meta($page_id,'_sidebar_f2',true )): ?>
  					<div class="site-footer footer-content col-sm-24">
  					<?php if ( is_active_sidebar(get_post_meta($page_id,'_sidebar_f2',true )) ) : ?>
  						<?php dynamic_sidebar(get_post_meta($page_id,'_sidebar_f2',true )); ?>
  					<?php endif; ?>
  					</div>
  				<?php else: ?>
  					<div class="site-footer footer-content col-sm-24">
  					<?php 
  						if(is_active_sidebar( "footer-2" )):
  							dynamic_sidebar("footer-2" );
  						endif;
  					?>
  					</div>
  				<?php endif; ?>
  			<?php endif; ?>
  			<?php if(get_post_meta($page_id,'_sidebar_f3',true ) != 'sidebar_hidden'): ?>
  				<?php if(get_post_meta($page_id,'_sidebar_f3',true )): ?>
  					<div class="site-footer footer-image col-sm-24">
  					<?php if ( is_active_sidebar(get_post_meta($page_id,'_sidebar_f3',true )) ) : ?>
  						<?php dynamic_sidebar(get_post_meta($page_id,'_sidebar_f3',true )); ?>
  					<?php endif; ?>
  					</div>
  				<?php else: ?>
  					<div class="site-footer footer-image col-sm-24">
  					<?php 
  						if(is_active_sidebar( "footer-3" )):
  							dynamic_sidebar("footer-3" );
  						endif;
  					?>
  					</div>
  				<?php endif; ?>	
  			<?php endif; ?>
  	</div>
	</div>
  <div class="site-info">
    <div class="container">
    <div class ='wd-footer-copyright'>
      <?php if(get_theme_mod('text_footer')){?>
        <p><?php echo get_theme_mod('text_footer');  ?></p>
      <?php }else{ ?>
        <p><?php esc_html_e('Copyright @ 2015 Theoakwooden . All Rights Reserved.','wdjewelry'); ?></p>
      <?php } ?>
    </div>
    <div class = 'wd-footer-social'>
      <?php 
        if(is_active_sidebar( "footer-4" )):
          dynamic_sidebar("footer-4" );
        endif;
      ?>
    </div>
    </div>
  </div><!-- .site-info -->
</footer><!-- .site-footer -->