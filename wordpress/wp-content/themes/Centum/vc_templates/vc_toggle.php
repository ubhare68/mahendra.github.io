<?php
$output = $title = $el_class = $open = $css_animation = '';
extract(shortcode_atts(array(
    'title' => __("Click to toggle", "trizzy"),
    'el_class' => '',
    'open' => 'false',
    'css_animation' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);
$open = ( $open == 'true' ) ? 'opened' : '';
$el_class .= ( $open == ' wpb_toggle_title_active' ) ? ' opened' : '';

//$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_toggle' . $open, $this->settings['base'], $atts );
$css_class = $this->getCSSAnimation($css_animation);

$output .= '<h5 class="toggle-trigger"><a href="#">'.$title.'</a></h5>';
$output .= '<div class="toggle-container"><div class="content">'.wpb_js_remove_wpautop($content, true).'</div></div>'.$this->endBlockComment('toggle')."\n";

echo $output;


 
