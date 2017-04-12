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
    foreach ( $categories as $category ) {
      $cats_slug[] = $category->slug;
    }
  }

?>

<li class="cbp-item <?php echo implode(" ", $cats_slug); ?>">
    <a href="<?php the_permalink(); ?>" target="_blank" class="cbp-caption">
        <div class="cbp-caption-defaultWrap">
            <?php the_post_thumbnail( ); ?>
        </div>
        <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-text"><?php echo __('View Project','themestudio') ?></div>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php the_permalink(); ?>" target="_blank" class="cbp-l-grid-blog-title"><?php the_title( ); ?> </a>
    <div class="cbp-l-grid-blog-desc"><?php the_excerpt(); ?></div>
</li>