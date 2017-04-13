<?php
add_shortcode("wd_custom_blog", "tvlgiao_dance_blogs_custom");
function tvlgiao_dance_blogs_custom($atts)
{
  extract(shortcode_atts(array(
    "ignore_sticky_posts" => "top",
    'style'               => 'regular_image',
    'columns'             => '3',
    'per_page'            => 1,
    'order'               => 'date',
    'orderby'             => 'ASC',
    'excerpt_words'       => 10,
    'show_home'           => 'yes',
    'show_thumbnail'      => 'yes',
    'show_infor'          => 'yes',
    'show_excerpt'        => 'yes',
    'show_style'          => 'all',
    'slug'                => '',
    'category'            => '',
    'cat_childern'        => 'false',
    'offset'              => '',
  ), $atts));

  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => $per_page,
    'order'          => $order,
    'orderby'        => $orderby,
    'offset'         => $offset,
  );

  if($show_style == 'category'){
    $args['tax_query'] = array(
                          array(
                            'taxonomy'=>'category',
                            'field'   => 'id',
                            'terms'   => $category,
                            'include_children ' => $cat_childern,
                            ),
                          );
  }
  if($show_style == 'single'){
    $args['name'] = $slug;
  }
  
  if ($ignore_sticky_posts === "normal") {
    $args['ignore_sticky_posts'] = 1;
  } elseif ($ignore_sticky_posts === "hide") {
    $args['post__not_in'] = get_option('sticky_posts');
  }
  $blogs = new WP_Query($args);
  ob_start();
  $_sub_class = "col-sm-" . (24 / $columns);
  if ($blogs->have_posts()): ?>
			<div class="content_blog row">
					<div class="content_blogs <?php echo esc_attr($style); ?>">
						<?php while ($blogs->have_posts()): $blogs->the_post();
                global $post;
                $post_title = esc_html(get_the_title($post->ID));
                $post_description = substr(strip_tags($post->post_content),0,60);
                $post_url =  esc_url(get_permalink($post->ID));
                $url_video = esc_url(get_post_meta($post->ID,THEME_SLUG.'video_portfolio',true));
                $thumb=get_post_thumbnail_id($post->ID);
                $thumburl=wp_get_attachment_image_src($thumb,'portfolio_image');
            ?>
							<div class="<?php echo esc_attr($_sub_class); ?> wd_item_blog">
								<div class="content_item_video">
                <?php if($show_thumbnail == 'yes' && $thumburl[0]): ?>
                  <div class='item_header'>
                    <img width ='<?php echo  esc_attr($thumburl[1])?>' height ='<?php echo  esc_attr($thumburl[2]);?>' alt="<?php echo $post_title?>" title="<?php echo $post_title;?>" class="opacity_0" src="<?php echo  esc_url($thumburl[0]);?>"/>  
                  </div> <!-- end div conten_itiem_blog -->
                <?php endif; ?>
                  <div class="item_content">
                    <?php if($show_home == 'yes'): ?>
                    <div class="wd_link_home">
                      <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'wdtheoakwooden'); ?></a>
                    </div>
                    <?php endif; ?>

                    <div class="content_title text_center">
                      <h3> <a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
                    </div>
                    <?php if($show_thumbnail == 'yes'): ?>
                    <div class="content_author">
                      <span><?php echo get_the_date(); ?></span>
                      <span><?php echo get_the_author( ); ?></span>
                      <span> <?php comments_number( '0', '1 ', '% ' ); ?></span>
                    </div>
                    <?php endif; ?>

                     <div class="clear"></div>
                    <?php if($show_excerpt == 'yes'): ?>
                    <div class="content_infor">
                      <?php echo wdtheoakwooden_get_excerpt(get_the_excerpt(), $excerpt_words); ?>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
				</div>
			<?php endwhile;?>
		</div>
	</div>
<?php endif;
  wp_reset_postdata();
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}