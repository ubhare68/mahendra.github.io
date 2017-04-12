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
<li class="cbp-item <?php echo implode(" ", $cats_slug); ?> logo"> <a href="<?php echo $url; ?>" class="cbp-caption cbp-lightbox" data-title="Consectetuer Adipiscing<br>by Rutrum adipiscing luctus">
  <div class="cbp-caption-defaultWrap"> <?php the_post_thumbnail(array('310','233')); ?> </div>
  <div class="cbp-caption-activeWrap">
    <div class="cbp-l-caption-alignLeft">
      <div class="cbp-l-caption-body">
        <div class="cbp-l-caption-title"><?php the_title( ); ?> </div>
        <div class="cbp-l-caption-desc"><?php the_excerpt(); ?></div>
      </div>
    </div>
  </div>
  </a> 
</li>
<?php wp_reset_query(); wp_reset_postdata(); ?>