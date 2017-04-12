<?php
function wdjewelry_page_id()
{
  if (wdjewelry_checkplugin_woocommerce() && is_shop()) {
    $page_id = get_option('woocommerce_shop_page_id');
  } elseif (is_search() || is_year() || is_month() || is_day()) {
    $page_id = '';
  } else {
    $page_id = get_the_id();;
  }
  return $page_id;
}

if (!function_exists('wdjewelry_custom_layout')) {
  function wdjewelry_custom_layout()
  {
    $page_id = wdjewelry_page_id();
    $layout  = array();
    if (get_post_meta($page_id, '_layout', true)) {
      if (get_post_meta($page_id, '_layout', true) === 'full_width') {
        $layout['class_main']    = 'col-sm-12';
        $layout['class_sidebar'] = 'col-sm-hiden';
      } else {
        $layout['class_main']    = 'col-sm-9';
        $layout['class_sidebar'] = 'col-sm-3';
      }
    }
    return $layout;
  }
}

if (!function_exists('wdjewelry_check_sidebar')) {
  function wdjewelry_check_sidebar()
  {
    $page_id = wdjewelry_page_id();
    if (get_post_meta($page_id, '_layout', true)) {
      if (get_post_meta($page_id, '_layout', true) === 'full_width') {
        return 'col-sm-24';
      } elseif (get_post_meta($page_id, '_layout', true) === 'right_left') {
        return 'col-sm-12';
      } else {
        return 'col-sm-18';
      }

    }
    return 'col-sm-24';
  }
}

if (!function_exists('wdjewelry_check_sidebar_left')) {
  function wdjewelry_check_sidebar_left()
  {
    $page_id = wdjewelry_page_id();
    if (get_post_meta($page_id, '_layout', true)) {
      if (get_post_meta($page_id, '_layout', true) === 'sidebar_left' || get_post_meta($page_id, '_layout', true) === 'right_left') {
        return true;
      } else {
        return false;
      }
    }
  }
}

if (!function_exists('wdjewelry_check_sidebar_right')) {
  function wdjewelry_check_sidebar_right()
  {
    $page_id = wdjewelry_page_id();
    if (get_post_meta($page_id, '_layout', true)) {
      if (get_post_meta($page_id, '_layout', true) === 'sidebar_right' || get_post_meta($page_id, '_layout', true) === 'right_left') {
        return true;
      } else {
        return false;
      }
    }
  }
}

function wdjewelry_create_global()
{
  global $wdjewelry_wd_data;
  $page_id = wdjewelry_page_id();
  if (get_post_meta($page_id, '_column', true)) {
    $wdjewelry_wd_data['wd_prod_cat_column'] = get_post_meta($page_id, '_column', true);
  } else {
    $wdjewelry_wd_data['wd_prod_cat_column'] = 3;
  }
}
add_action('wp', 'wdjewelry_create_global');

if (!function_exists('wdjewelry_ajax_comment')) {
  function wdjewelry_ajax_comment()
  {
    global $post;
    $page     = (isset($_POST['paged']) || !empty($_POST['paged'])) ? $_POST['paged'] : '1';
    $per_page = (isset($_POST['per_page']) && !empty($_POST['per_page'])) ? $_POST['per_page'] : '5';

    ob_start();
    if (isset($_POST['post_id']) && !empty($_POST['post_id'])) {
      $post_id  = $_POST['post_id'];
      $comments = get_comments(array(
        'post_id' => $post_id,
      ));
      wp_list_comments(array(
        'page'       => $page,
        'per_page'   => $per_page,
        'callback'   => 'wdjewelry_item_list_comment',
        'reply_text' => 'Reply',
      ), $comments);
    }

    $content = ob_get_contents();
    ob_get_clean();
    die($content);

  }
}
add_action('wp_ajax_show_comment', 'wdjewelry_ajax_comment');
add_action('wp_ajax_nopriv_show_comment', 'wdjewelry_ajax_comment');

/**********************GET HEADER **************************/
if (!function_exists('wdjewelry_get_header_style')) {
  function wdjewelry_get_header_style()
  {
    $page_id = wdjewelry_page_id();
    if (get_post_meta($page_id, '_header', true)) {
      $header = get_post_meta($page_id, '_header', true);
    } elseif (get_theme_mod('style_header')) {
      $header = get_theme_mod('style_header');
    } else {
      $header = 'default';
    }
    return $header;
  }
}

/*********************GET TYPE FOOTER*************************/
if (!function_exists('wdjewelry_get_footer_style')) {
  function wdjewelry_get_footer_style()
  {
    $id_page_footer = wdjewelry_page_id();
    if (get_post_meta($id_page_footer, '_footer', true)) {
      $footer = get_post_meta($id_page_footer, '_footer', true);
    } elseif (get_theme_mod('footer')) {
      $footer = get_theme_mod('footer');
    } else {
      $footer = 'defalut';
    }
    return $footer;
  }
}

if (!function_exists('wdjewelry_get_logo_style')) {
  function wdjewelry_get_logo_style()
  {
    $page_id = wdjewelry_page_id();
    if (get_post_meta($page_id, '_logo', true)) {
      $logo = get_post_meta($page_id, '_logo', true);
    } else {
      $logo = 'logo_header_default';
    }
    return $logo;
  }
}

if (!function_exists('wdjewelry_background_page')) {
  function wdjewelry_background_page()
  {
    $page_id = wdjewelry_page_id();
    if (get_post_meta($page_id, '_background_page', true)) {
      $background_page = get_post_meta($page_id, '_background_page', true);
    } else {
      $background_page = '';
    }
    return $background_page;
  }
}

if (!function_exists('wdjewelry_get_logo_url')) {
  function wdjewelry_get_logo_url()
  {
    $url        = '';
    if (get_theme_mod('logo_header_default')):
      $url = get_theme_mod('logo_header_default');
    endif;

    if (empty($url)) {
      $url = get_template_directory_uri() . '/images/logo.png';
    }

    return $url;
  }
}

function wdjewelry_get_the_more($more)
{
  return '[.....]';
}
add_filter('excerpt_more', 'wdjewelry_get_the_more');

if ( ! function_exists( 'wdjewelry_post_thumbnail' ) ) :

function wdjewelry_post_thumbnail() {
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }

  if ( is_singular() ) :
  ?>

  <div class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
  </div><!-- .post-thumbnail -->

  <?php else : ?>

  <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
    <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
  </a>

  <?php endif; // End is_singular()
}
endif;


function wdjewelry_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/************************Get Category Of Woocommerce ***************************************/

if(!function_exists('wdjewelry_get_category_woo')){
  function wdjewelry_get_category_woo(){
    $taxonomy     = 'product_cat';
    $orderby      = 'name';  
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 0;      // 1 for yes, 0 for no  
    $title        = '';
    $childless    = 1; 
    $empty        = 0;
    $args = array(
           'taxonomy'     => $taxonomy,
           'orderby'      => $orderby,
           'show_count'   => $show_count,
           'pad_counts'   => $pad_counts,
           'hierarchical' => $hierarchical,
           'childless'    => $childless,
           'title_li'     => $title,
           'hide_empty'   => $empty
    );
   $all_categories = get_categories( $args );
   $Category = array();
   foreach ($all_categories as $cate) {
     $Category[$cate->slug] = $cate->name.'('.$cate->count.')';
   }
   return $Category;
  }
}
/*************List Category Woocommerce**************************/
if(!function_exists('wdjewelry_get_list_sidebar')){
  function wdjewelry_get_list_sidebar(){
    global $wdjewelry_default_sidebar;
    $sidebar = array();
    foreach ($wdjewelry_default_sidebar as $value) {
      $sidebar[$value['id']] = $value['name'];
    }
    return $sidebar;
  }
}

/**************************Check Layout woo************************/
if(!function_exists('wdjewelry_check_layout')){
  function wdjewelry_check_layout($name_custom,$default='sidebar-right'){
    if(get_theme_mod($name_custom,$default)){
      if(get_theme_mod($name_custom,$default) !== 'fullwidth'){
        return true;
      }
    }
    return false;
  }
}
/*********************Show Sidebar woo******************************/
if(!function_exists('wdjewelry_get_sidebar')){
  function wdjewelry_get_sidebar($name_sidebar,$name_layout){
    if(wdjewelry_check_layout($name_layout)){

      if(get_theme_mod($name_sidebar,'sidebar-1')){
        ob_start();
        $id_sidebar = get_theme_mod($name_sidebar,'sidebar-1');
        if (is_active_sidebar($id_sidebar)):
          dynamic_sidebar($id_sidebar);
        endif;
        return ob_get_contents();
      }
    }
    return ;
  }
}
/*******************SET PER PAGE PRODUCT*****************************/
if(!function_exists('wdjewelry_set_per_page_product')){
  function wdjewelry_set_per_page_product(){
    if(get_theme_mod('tvlgiao_wpdance_layout_number_shop')){
      $per_page = get_theme_mod('tvlgiao_wpdance_layout_number_shop');
    }else{
      $per_page = get_option('posts_per_page');
    }
    return $per_page;
  }
}

add_filter( 'loop_shop_per_page','wdjewelry_set_per_page_product', 20 );


?>