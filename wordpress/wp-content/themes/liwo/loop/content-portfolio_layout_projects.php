<?php 
  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
  
  $taxonomy = 'dslc_projects_cats';
  $post_id  = (int)get_the_id();

  // get the term IDs assigned to post.
  $post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
  // separator between links
  $separator = ', ';

  if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {
    $term_ids = implode( ',' , $post_terms );

    $args = array(
      'orderby'                  => 'name',
      'order'                    => 'ASC',
      'include'                  => $term_ids,
      'taxonomy'                 => $taxonomy,

    );

    $categories = get_categories( $args );
    $cats_slug  = array();
    $cats_name  = array();
    foreach ( $categories as $category ) {
      $cats_slug[] = $category->slug;
      $cats_name[] = $category->name;
    }
  }
?>
<li class="cbp-item <?php echo implode(" ", $cats_slug); ?>">
    <div class="cbp-caption">
        <div class="cbp-caption-defaultWrap">
            <img src="<?php echo $url; ?>" alt="" width="100%">
        </div>
        <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                    <a href="<?php echo the_permalink(); ?>" class="cbp-l-caption-falink"><i class="fa fa-link fa-2x"></i></a>
                    <a href="<?php echo $url ?>" class="cbp-lightbox cbp-l-caption-fasearch" data-title="<?php the_title( ); ?>"><i class="fa fa-search-plus fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="cbp-l-grid-projects-title"><?php the_title( ); ?></div>
    <div class="cbp-l-grid-projects-desc"><?php echo implode("/ ", $cats_slug); ?></div>
</li>