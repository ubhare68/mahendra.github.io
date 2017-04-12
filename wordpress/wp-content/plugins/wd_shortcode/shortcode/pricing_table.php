<?php

// **********************************************************************// 
// ! Register New Element: Pricing Table
// **********************************************************************//
if (!function_exists('wd_ptable_shortcode')) {
	function wd_ptable_shortcode($atts, $content = null) {
        $args = array(
            "title"         => "",
            "price"         => "0",
            "currency"      => "$",
            "price_period"  => "/ month",
            "link"          => "",
            "style"        => "wd_pricing_style_image",
            "button_text"   => "Buy Now",
            'content_pricing' => '',
            "image"        => ""
        );
	        
		extract(shortcode_atts($args, $atts));
	    ob_start();
        ?>
        <div class="<?php echo esc_attr($style); ?>">
            <div class="header_pricing">
                <h3><?php echo esc_html($title); ?></h3>
                <p> 
                    <span><?php echo esc_html($currency );?></span>
                    <span><?php echo esc_html($price); ?></span>
                    <span><?php echo esc_html($price_period); ?></span>
                </p>
            </div>
            <div class="content_pricing">
                <?php echo wp_kses_post($content_pricing); ?>
            </div>
            <div class="footer_pricing">
                <?php if(!empty($image)):
                        $url = wp_get_attachment_url($image);
                        ?>
                <div class="footer_image"><img src="<?php echo esc_attr($url); ?>"></div>
                <?php endif; ?>
                <div class="footer_button"><a class='button' href="<?php echo esc_attr($link); ?>"><?php echo esc_html($button_text ); ?></a></div>
            </div>
        </div>
        <?php
        $html = ob_get_contents();
        ob_get_clean();
        //ob_end_clean();
	    return $html;
	}
}
add_shortcode('wd_ptable', 'wd_ptable_shortcode');

?>