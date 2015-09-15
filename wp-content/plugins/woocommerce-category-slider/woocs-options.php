<?php

function woocs_admin_menu() {
	add_menu_page('Category Slider Settings', 'Category Slider', 'manage_options', 'woocs.php', 'woocs_show_options', plugins_url('/styles/images/mini.png', __FILE__), 1247);
}

add_action('admin_menu', 'woocs_admin_menu');


function woocs_register_settings() {
	register_setting('woocs-settings-group', 'woocs_enabled');
	register_setting('woocs-settings-group', 'woocs_type');
	register_setting('woocs-settings-group', 'woocs_bgcolor');
	
	register_setting('woocs-settings-group', 'woocs_ph_pcats_in_section');
	register_setting('woocs-settings-group', 'woocs_ph_products');
	register_setting('woocs-settings-group', 'woocs_ph_from');
	register_setting('woocs-settings-group', 'woocs_ph_to');
	register_setting('woocs-settings-group', 'woocs_ph_all_for');
	register_setting('woocs-settings-group', 'woocs_ph_veiw_all_prod');
	
	register_setting('woocs-settings-group', 'woocs_t1_autoslide');
	register_setting('woocs-settings-group', 'woocs_t2_autoslide');
	
	register_setting('woocs-settings-group', 'woocs_t1_speed');
	register_setting('woocs-settings-group', 'woocs_t2_speed');
	
	register_setting('woocs-settings-group', 'woocs_t1_pager');
	register_setting('woocs-settings-group', 'woocs_t2_pager');
	
	register_setting('woocs-settings-group', 'woocs_t1_controls');
	register_setting('woocs-settings-group', 'woocs_t2_controls');
	
	register_setting('woocs-settings-group', 'woocs_t1_title_length');
	register_setting('woocs-settings-group', 'woocs_t2_title_length');
	
	register_setting('woocs-settings-group', 'woocs_t2_numberofrows');
	
}

add_action('admin_init', 'woocs_register_settings');


function woocs_show_options(){ ?>
<style type="text/css"> .woocs-label{ font-size:14px; font-weight:bold;} .woocs .submit{ text-align:right;} .wcs-ph{ width:190px; float:left; padding:10px; }</style>

<div class="wrap">

    <div style="float:left; width:50px; height:55px; margin:10px 10px 20px 0px;">
        <img src="<?php echo plugins_url('/styles/images/icon.png', __FILE__); ?>" style="height:43px;"/>
    </div>
    <h2 style="padding-bottom:20px; padding-top:15px;"><?php _e('WooCommerce Category Slider Settings', 'woodiscuz'); ?></h2>
    <br style="clear:both" />
	
	<link rel="stylesheet" href="<?php echo WOOCS_PATH ?>bxslider/jquery.bxslider.css" type="text/css" />
	<script src="<?php echo WOOCS_PATH ?>bxslider/jquery.min.js"></script>
	<script src="<?php echo WOOCS_PATH ?>bxslider/jquery.bxslider.js"></script>
	
	<table width="100%" border="0">
          <tr>
            <td style="padding:10px; padding-left:0px; vertical-align:top; width:500px; height:470px;">
                    <div class="slider">
                        <ul class="bxslider">
						<li>
						  	<div style="width:470px; margin:0px auto;"><a href="http://www.gvectors.com/woocommerce-category-slider/"><img src="<?php echo WOOCS_PATH ?>styles/images/gc/0.png" title="" style="padding:0px; width:469px" /></a></div>
						  	<div style="padding:10px;">
								<p style="padding:0px; margin:0px; text-align:center; color:#CC3300; font-size:24px; font-family:Georgia, 'Times New Roman', Times, serif;">
									Get More! +3 Awesome Slider Layouts!
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;">
									<a href="http://www.gvectors.com/woocommerce-category-slider/" style="text-decoration:none;">
										<span style="font-size:16px; font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif;">WooCommerce Category Slider PRO</span>
									</a>
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;"><a class="button button-primary" target="_blank" href="http://www.gvectors.com/woocommerce-category-slider/">Update to Pro Now!</a></p>
							</div>
						  </li>
                          <li>
						    <div style="padding:10px;">
								<p style="padding:0px; margin:0px; text-align:center; color:#CC3300; font-size:24px; font-family:Georgia, 'Times New Roman', Times, serif;">
									Slider Layout #3
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;">
									<a href="http://www.gvectors.com/woocommerce-category-slider/#sl3" style="text-decoration:none;">
										<span style="font-size:16px; font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif;">WooCommerce Category Slider PRO</span>
									</a>
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;"><a class="button button-primary" target="_blank" href="http://www.gvectors.com/woocommerce-category-slider/#sl3">Update to Pro Now!</a></p>
							</div>
						  	<div style="width:410px; margin:0px auto;"><a href="http://www.gvectors.com/woocommerce-category-slider/#sl3"><img src="<?php echo WOOCS_PATH ?>styles/images/gc/1.png" title="" style="padding:0px" /></a></div>
						  </li>
                          <li>
						  	<div style="padding:10px;">
								<p style="padding:0px; margin:0px; text-align:center; color:#CC3300; font-size:24px; font-family:Georgia, 'Times New Roman', Times, serif;">
									Slider Layout #4
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;">
									<a href="http://www.gvectors.com/woocommerce-category-slider/#sl4" style="text-decoration:none;">
										<span style="font-size:16px; font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif;">WooCommerce Category Slider PRO</span>
									</a>
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;"><a class="button button-primary" target="_blank" href="http://www.gvectors.com/woocommerce-category-slider/#sl4">Update to Pro Now!</a></p>
							</div>
						  	<div style="width:410px; margin:0px auto;"><a href="http://www.gvectors.com/woocommerce-category-slider/#sl4"><img src="<?php echo WOOCS_PATH ?>styles/images/gc/2.png" title="" style="padding:0px" /></a></div>
						  </li>
						  <li>
						  	<div style="padding:10px;">
								<p style="padding:0px; margin:0px; text-align:center; color:#CC3300; font-size:24px; font-family:Georgia, 'Times New Roman', Times, serif;">
									Slider Layout #5
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;">
									<a href="http://www.gvectors.com/woocommerce-category-slider/#sl5" style="text-decoration:none;">
										<span style="font-size:16px; font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif;">WooCommerce Category Slider PRO</span>
									</a>
								</p>
								<p style="padding:0px; margin:0px; padding-bottom:15px; text-align:center;"><a class="button button-primary" target="_blank" href="http://www.gvectors.com/woocommerce-category-slider/#sl5">Update to Pro Now!</a></p>
							</div>
						  	<div style="width:410px; margin:0px auto;"><a href="http://www.gvectors.com/woocommerce-category-slider/#sl5"><img src="<?php echo WOOCS_PATH ?>styles/images/gc/3.png" title="" style="padding:0px" /></a></div>
						  </li>
                        </ul>
                    </div>
                    <div style="clear:both"></div>
            </td>
            <td valign="top" style="padding:10px; padding-right:0px;">
            
            <table width="100%" border="0" cellspacing="1" class="widefat">
                <thead>
                <tr>
                <th colspan="2">&nbsp;Need Help?</th>
                </tr>
                </thead>
                <tbody>
                    <tr valign="top">
                        <td style="background:#FFF; text-align:left; font-size:13px;">
                        	 If you need help with this plugin or if you want to make a suggestion, then please visit to plugin support forum. 
						</td>
						<td>
							<a href="https://wordpress.org/support/plugin/woocommerce-category-slider/" class="button button-primary" target="_blank">WooCS Support Forum</a>
                        </td>
                    </tr>
					<tr>
						<td colspan="2"><span style="color:#CC3300">If you find some problem please do not decrease this plugin rating. Just open a new support topic and we'll help to fix it ASAP.</span></td>
					</tr>
                </tbody>
              </table>
			  <br />
              <table width="100%" border="0" cellspacing="1" class="widefat">
                    <thead>
                    <tr>
                    <th>&nbsp;Like WooCommerce Category Slider plugin?</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr valign="top">
                            <td style="background:#FFF; text-align:left; font-size:12px;">
                            <ul>
                            <li>If you like WooCS and want to encourage us to develop and maintain it,why not do any or all of the following:</li>
                            <li>- Link to it so other folks can find out about it.</li>
                            <li>- Give it a good rating on <a href="http://wordpress.org/extend/plugins/woocommerce-category-slider/" target="_blank">WordPress.org.</a></li>
                            <li>- We spend as much of my spare time as possible working on WooCommerce PDF &amp; Print and any donation is appreciated. Donations play a crucial role in supporting Free and Open Source Software projects. <div style="width:200px; float:right;">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="VNMGTCF9NRH5C">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></div>

                            </ul>
                            </td>
                        </tr>
                    </tbody>
                 </table>
                
            </td>
          </tr>
        </table>
	
	
	<form method="post" action="options.php">
		<?php settings_fields('woocs-settings-group'); ?>
    	<?php do_settings_sections('woocs-settings-group'); ?>
		
		<table cellspacing="0" class="wp-list-table widefat plugins woocs" style="border-color:#CCCCCC;">
            <thead>
                <tr style="background:#F2FBFF">
                    <th scope="col" colspan="2" style="font-size:20px;">General Settings</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="2" style="text-align:right"><?php submit_button(); ?></th>
                </tr>
            </tfoot>
            <tbody>
            <tr style="background:#F8F8F8;">
                <td style="width:40%"><span class="woocs-label">Enable Slider</span></td>
                <td>
                    <p><input type="checkbox" name="woocs_enabled" id="woocs_enabled" value="1" <?php checked('1', get_option('woocs_enabled')); ?> />
                    <label for="woocs_enabled">Enable</label></p>
                </td>
            </tr>
            <tr>
                <td><span class="woocs-label">Slider Type</span></td>
                <td>
                	
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>
                        	<img src="<?php echo plugins_url('/styles/images/L1.png', __FILE__); ?>"/><br />
                        	<p><label for="woocs0">Layout 1</label>&nbsp;<input name="woocs_type" id="woocs0" type="radio" value="0" <?php checked('0', get_option('woocs_type')); ?> /></p>
                        </td>
                        <td>
                        	<img src="<?php echo plugins_url('/styles/images/L2.png', __FILE__); ?>"/><br />
                            <p><label for="woocs1">Layout 2</label>&nbsp;<input name="woocs_type" id="woocs1" type="radio" value="1" <?php checked('1', get_option('woocs_type')); ?> /></p>
                        </td>
                      </tr>
                      
                    </table>
                    
                </td>
            </tr>
            <tr style="background:#F8F8F8;">
                <td><span class="woocs-label">Slider Background Color</span></td>
                <td><input class="color" name="woocs_bgcolor" value="<?php echo esc_attr(get_option('woocs_bgcolor')); ?>" style="border:#CCCCCC 1px solid;"> </td>
            </tr>
            <tr>
                <td colspan="2">
					<div style="padding:10px 0px 10px 5px;"><span class="woocs-label">Slider Front-end Phrases</span></div>
					<div class="wcs-ph"><input type="text" name="woocs_ph_pcats_in_section" value="<?php echo esc_attr(get_option('woocs_ph_pcats_in_section')); ?>" class="woocs_phrase"></div>
					<div class="wcs-ph"><input type="text" name="woocs_ph_products" value="<?php echo esc_attr(get_option('woocs_ph_products')); ?>" class="woocs_phrase"></div>
					<div class="wcs-ph"><input type="text" name="woocs_ph_from" value="<?php echo esc_attr(get_option('woocs_ph_from')); ?>" class="woocs_phrase"></div>
					<div class="wcs-ph"><input type="text" name="woocs_ph_to" value="<?php echo esc_attr(get_option('woocs_ph_to')); ?>" class="woocs_phrase"></div>
					<div class="wcs-ph"><input type="text" name="woocs_ph_all_for" value="<?php echo esc_attr(get_option('woocs_ph_all_for')); ?>" class="woocs_phrase"></div>
					<div class="wcs-ph"><input type="text" name="woocs_ph_veiw_all_prod" value="<?php echo esc_attr(get_option('woocs_ph_veiw_all_prod')); ?>" class="woocs_phrase"></div>
					<div style="clear:both;"></div>
                </td>
            </tr>
            </tbody>
        </table>
		
        <table cellspacing="0" class="wp-list-table widefat plugins woocs" style="border-color:#CCCCCC; margin-top:25px;">
            <thead>
                <tr style="background:#F2FBFF">
                    <th scope="col" colspan="2" style="font-size:20px;">Options - Layout #1</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="2" style="text-align:right"><?php submit_button(); ?></th>
                </tr>
            </tfoot>
            <tbody>
            <tr style="background:#F8F8F8;">
                <td style="width:40%"><span class="woocs-label"><label for="woocs_t1_title_length">Title length</label></span></td>
                <td><input type="number" min="10" max="300" name="woocs_t1_title_length" value="<?php echo esc_attr(get_option('woocs_t1_title_length')); ?>" /></td>
            </tr>
            <tr>
                <td><span class="woocs-label"><label for="woocs_t1_pager">Pager</label></span></td>
                <td>&nbsp;&nbsp;<input type="checkbox" name="woocs_t1_pager" id="woocs_t1_pager" value="1" <?php checked('1', get_option('woocs_t1_pager')); ?> /></td>
            </tr>
            <tr style="background:#F8F8F8;">
                <td><span class="woocs-label"><label for="woocs_t1_controls">Controls</label></span></td>
                <td>&nbsp;&nbsp;<input type="checkbox" name="woocs_t1_controls" id="woocs_t1_controls" value="1" <?php checked('1', get_option('woocs_t1_controls')); ?> /></td>
            </tr>
            <tr>
                <td><span class="woocs-label"><label for="woocs_t1_autoslide">Autoslide</label></span></td>
                <td>&nbsp;&nbsp;<input type="checkbox" name="woocs_t1_autoslide" id="woocs_t1_autoslide" value="1" <?php checked('1', get_option('woocs_t1_autoslide')); ?> /></td>
            </tr>
            <tr style="background:#F8F8F8;">
                <td><span class="woocs-label"><label for="woocs_t1_speed">Autoslide speed</label></span></td>
                <td><input type="number" min="10" max="5000" name="woocs_t1_speed" value="<?php echo esc_attr(get_option('woocs_t1_speed')); ?>" /></td>
            </tr>
            </tbody>
        </table>
        
        <table cellspacing="0" class="wp-list-table widefat plugins woocs" style="border-color:#CCCCCC; margin-top:25px;">
            <thead>
                <tr style="background:#F2FBFF">
                    <th scope="col" colspan="2" style="font-size:20px;">Options - Layout #2</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="2" style="text-align:right"><?php submit_button(); ?></th>
                </tr>
            </tfoot>
            <tbody>
            <tr>
                <td style="width:40%"><span class="woocs-label"><label for="woocs_t2_title_length">Title length</label></span></td>
                <td><input type="number" min="10" max="300" name="woocs_t2_title_length" value="<?php echo esc_attr(get_option('woocs_t2_title_length')); ?>" /></td>
            </tr>
            <tr style="background:#F8F8F8;">
                <td><span class="woocs-label"><label for="woocs_t2_pager">Pager</label></span></td>
                <td>&nbsp;&nbsp;<input type="checkbox" name="woocs_t2_pager" id="woocs_t2_pager" value="1" <?php checked('1', get_option('woocs_t2_pager')); ?> /></td>
            </tr>
            <tr>
                <td><span class="woocs-label"><label for="woocs_t2_controls">Controls</label></span></td>
                <td>&nbsp;&nbsp;<input type="checkbox" name="woocs_t2_controls" id="woocs_t2_controls" value="1" <?php checked('1', get_option('woocs_t2_controls')); ?> /></td>
            </tr>
            <tr style="background:#F8F8F8;">
                <td><span class="woocs-label"><label for="woocs_t2_autoslide">Autoslide</label></span></td>
                <td>&nbsp;&nbsp;<input type="checkbox" name="woocs_t2_autoslide" id="woocs_t2_autoslide" value="1" <?php checked('1', get_option('woocs_t2_autoslide')); ?> /></td>
            </tr>
            <tr>
                <td><span class="woocs-label"><label for="woocs_t2_speed">Autoslide speed</label></span></td>
                <td><input type="number" min="10" max="5000" name="woocs_t2_speed" value="<?php echo esc_attr(get_option('woocs_t2_speed')); ?>" /></td>
            </tr>
            <tr style="background:#F8F8F8;">
                <td><span class="woocs-label"><label for="woocs_t2_numberofrows">Number of Rows</label></span></td>
                <td><input type="number" min="2" max="6" name="woocs_t2_numberofrows" value="<?php echo esc_attr(get_option('woocs_t2_numberofrows')); ?>"></td>
            </tr>
            </tbody>
        </table>
        
	</form>
</div>
<script>
$('.bxslider').bxSlider({
  mode: 'fade',
  captions: false,
  auto: true,
  controls: false,
  adaptiveHeight: false
});
</script>
	<?php 
}