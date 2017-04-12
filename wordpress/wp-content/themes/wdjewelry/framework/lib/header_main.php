<?php $style_header = wdjewelry_get_header_style(); ?>
	<?php if( $style_header != 'header_hidden'): ?>
		<header id="masthead" class="site-header <?php echo esc_attr($style_header ); ?>">
			<?php if ($style_header == 'header_3'): ?>
				<div id="site-header-top" class="site-header-top ">
					<div class="wd-header-widget-right shopping-cart-wrapper">
						<ul>
							<li class='wd_account'><?php echo wdjewelry_woo_account();?></li>
							<li class='wd_cart'><?php echo wdjewelry_mini_cart();?></li>
						</ul>
					</div>
				</div>
		<?php elseif($style_header == 'header_5'):?>
			<?php wdjewelry_menu_mobile(); ?>
			<div class='wd_header_5 hidden-xs'>
				<div class="wd-logo">
	              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
	                <img src="<?php echo wdjewelry_get_logo_url();?>" alt='<?php echo esc_html__("logo","wdjewelry");?>'>
	              </a>
	          	</div>
		        <div class='wd-menu-primary'>
		          <?php 
		            if (has_nav_menu('primary')):
		              wp_nav_menu(array("theme_location" => "primary",'menu_class' => 'primary nav-menu',
		                "container" => "div" ));
		            else: 
		              $args = array(
		                'menu_class' => 'primary nav-menu',
		                "container" => "div", 
		              );
		              wp_nav_menu( $args );
		            endif;  
		          ?>
		          <?php 
		            if(is_active_sidebar("header-1" ) ):
		              dynamic_sidebar("header-1" );
		            endif;
	          	?>
		        </div>
	        </div>
		<?php else: ?>
				<div id="site-header-top" class="site-header-top ">
					<?php do_action('wdjewelry_header_menu'); ?>
				</div>
				<?php 
				if(!is_home()&& !is_front_page()):
					$page_id = wdjewelry_page_id();
					$class_bread = (get_post_meta($page_id,'_breadcrumbs',true))?get_post_meta($page_id,'_breadcrumbs',true):''; ?>
				<div class="breadcrumbs <?php echo esc_attr($class_bread ); ?>">
					<div class="container">
						
							<div class="site-branding ">
								<?php do_action('wdjewelry_breadcrumbs'); ?>
							</div>
						
					</div>
				</div>
				<?php endif; ?>
		<?php endif; ?>
	</header><!-- .site-header -->
	<?php endif; ?>