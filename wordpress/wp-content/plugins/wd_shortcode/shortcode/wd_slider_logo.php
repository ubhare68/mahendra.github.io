<?php
add_shortcode("wd_slider_logo", "tvlgiao_wpdance_slider_logo");
function tvlgiao_wpdance_slider_logo($atts)
{
  extract(shortcode_atts(array(
    'per_page'            => -1,
    'number_show'         => 6,
    'logo_category'       => ''
  ), $atts));

  $args = array(
          'ignore_sticky_posts'       => 1,
          'posts_per_page'        => $per_page,
          'post_type'           => 'ts_logos',
          'post_status'           => 'publish',
          'orderby'             => 'title',
          'order'             => 'ASC',
        );
  if(!empty($logo_category)){
    $args['tax_query'] = array(
        array(
          'taxonomy' => 'ts_logos_category',
          'terms' => array( esc_attr($logo_category) ),
          'field' => 'slug',
          'include_children' => false
        )
      );
  }

  $logo = new WP_Query($args);
  $id_slider = 'wd_slide_logo_'.rand(1,100);
  ob_start();
  if ($logo->have_posts()): 
     $output = "<div class='wd_slide_logo_container'><ul id='".$id_slider."' class='owl-carousel owl-theme'>";
    while ($logo->have_posts()): $logo->the_post();
      $thumb=get_post_thumbnail_id(get_the_id());
      $thumburl=wp_get_attachment_image_src($thumb,'full');
      $output .= "<li class='item'>";
      $output .= "<div class='sl__image'><img width ='".esc_attr($thumburl[1])."' height ='".esc_attr($thumburl[2])."' alt='".get_the_title( )."' title='".get_the_title()."' class='opacity_0' src='".esc_url($thumburl[0])."'/></div>";// end div rb_row_left
      $output .="<div class='rb_title'><h3><a href='".get_the_permalink()."'>".get_the_title()."</a></h3></div>";
      $output .= "</li>";
    endwhile;
     $output .= '</ul></div>';//end if recent_blogs_horizontal_container
    echo $output;
  endif; // end if have_post
  wp_reset_postdata();
  ?>
  <script type='text/javascript'>
      //<![CDATA[
        jQuery(document).ready(function() {
          "use strict";
          var temp_visible = <?php echo esc_js($number_show);?>;
          var id_slider = <?php echo esc_js($id_slider); ?> ;
           jQuery(id_slider).owlCarousel({
            navigation : false,
            autoplay:true,
            loop:true,
            autoHeight:false,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            items:temp_visible,
            navigation: false,
            navigationText: ["<",">"]
          });

        });
      //]]> 
      </script>
  <?php

  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
?>