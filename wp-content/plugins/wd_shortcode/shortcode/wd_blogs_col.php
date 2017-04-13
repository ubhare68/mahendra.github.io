<?php
add_shortcode("WD_Blogs_Col", "tvlgiao_dance_blogs_type_2");
function tvlgiao_dance_blogs_type_2($atts)
{
  extract(shortcode_atts(array(
    'style'   => 'regular_image',
    'columns' => '3',
  ), $atts));
  if (get_query_var('paged')):
    $paged = get_query_var('paged');
  elseif (get_query_var('page')):
    $paged = get_query_var('page');
  else:
    $paged = 1;
  endif;
  $args = array(
    'post_type' => 'post',
    'paged'     => $paged,
  );
  $blogs = new WP_Query($args);
  ob_start();
  $maxpage = $blogs->max_num_pages;

  $_sub_class = "col-sm-" . (24 / $columns);

  if ($blogs->have_posts()): ?>
			<div class="content_blog row">

					<div class="content_blogs <?php echo esc_attr($style); ?>">
						<?php while ($blogs->have_posts()): ?>
							<?php $blogs->the_post();?>
							<div class="<?php echo esc_attr($_sub_class); ?> wd_item_blog">
								<?php get_template_part('template-parts/content', 'custom');?>
							</div>
						<?php endwhile;?>
					</div>


		</div>
		<?php
wp_reset_postdata();
  wp_localize_script('main_ajax', 'ajax_post', array(
    'ajaxurl'    => admin_url('admin-ajax.php'),
    'maxpage'    => $maxpage,
    'paged'      => $paged,
    'class_item' => $_sub_class,
  ));
  wp_enqueue_script('main_ajax');
  ?>
		<p class="wd_load_post "><a class='button' href="javascript:void(0)" id="load_post"><span>load more </span>
		<img style="display: none" src="<?php echo SC_IMAGE; ?>/ajax-loader.gif"></a></p>
		<?php endif; /* end if*/?>

		<?php
$content = ob_get_contents();
  ob_end_clean();
  return $content;
}

if (!function_exists('tvlgiao_dance_ajax_load_post')) {
  function tvlgiao_dance_ajax_load_post()
  {
    $paged      = (isset($_POST['paged'])) ? $_POST['paged'] : 0;
    $_sub_class = (isset($_POST['class_item'])) ? $_POST['class_item'] : 'col-sm-4';
    $args       = array(
      'post_type' => 'post',
      'paged'     => $paged,
    );
    $blogs = new WP_Query($args);
    ob_start();
    if ($blogs->have_posts()): ?>
			<?php while ($blogs->have_posts()): ?>
				<div class="<?php echo esc_attr($_sub_class); ?> wd_item_blog">
								<?php $blogs->the_post();?>
								<?php get_template_part('template-parts/content', 'custom');?>
				</div>
			<?php endwhile;?>
			<?php wp_reset_postdata();?>
		<?php endif; /* end if*/?>
		<?php
$content1 = ob_get_contents();
    ob_get_clean();
    die($content1);
  }
}
add_action('wp_ajax_nopriv_more_post_ajax', 'tvlgiao_dance_ajax_load_post');
add_action('wp_ajax_more_post_ajax', 'tvlgiao_dance_ajax_load_post');
?>