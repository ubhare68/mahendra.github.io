<?php 
	/**
	 * footer.php
	 * The footer used in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	*/
  global $liwo;
?>
      <div class="footer">
        <?php if( $liwo['footer_switch_social']== true ){ ?>
          <?php get_template_part('content-parts/footer','socials' ); ?>
        <?php } ?>
        <?php if( $liwo['footer_switch_widget']== true ){ ?>
          <?php get_template_part('content-parts/footer','widgets' ); ?>
        <?php } ?>
      </div><!-- /.body-wrapper -->
      <div class="clearfix"></div>
      <div class="copyright_info">
        <div class="container"><?php echo $liwo['copyright_text'] ?></div>
      </div>

    <!-- end copyright info -->
    <a href="#" class="scrollup">Scroll</a>
    <?php get_template_part('content-parts/switch', 'style'); ?>
  </div>
  <?php if(isset($liwo['theme_view_layout'])): ?>
    <?php if ($liwo['theme_view_layout']=='boxed'): ?>
        </div>
    <?php endif; ?>
  <?php else : ?>
    </div>
  <?php endif; ?>
  </div>
<?php wp_footer(); ?>
</body>
</html>