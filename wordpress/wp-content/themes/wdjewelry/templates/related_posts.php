<?php
  $gallery_ids = array();
  $galleries = wp_get_post_terms($post->ID,'gallery');
  if(!is_array($galleries))
    $galleries = array();
  foreach($galleries as $gallery){
    if( $gallery->count > 0 ){
      array_push( $gallery_ids,$gallery->term_id );
    } 
  }
  if(!empty($galleries) && count($gallery_ids) > 0 )
    $args = array(
      'post_type'=>$post->post_type,
        'tax_query' => array(
        array(
          'taxonomy' => 'gallery',
          'field' => 'id',
          'terms' => $gallery_ids
        )
      ),
      'post__not_in'=>array($post->ID),
      'posts_per_page'=> get_option('posts_per_page'),//get_option(THEME_SLUG.'num_post_related', 10)
    );
  else
    $args = array(
    'post_type'=>$post->post_type,
    'post__not_in'=>array($post->ID),
    'posts_per_page'=> get_option('posts_per_page'),//get_option(THEME_SLUG.'num_post_related', 10)
  );
  $recent_posts=new wp_query($args);

    if($recent_posts->have_posts()):?>
        <div class="related_title"><h3><?php echo esc_html__('Related Post','wdjewelry'); ?></h3></div>
      <div id = "owl-demo" class = "owl-carousel related-posts" >
        <?php
          while ($recent_posts->have_posts()):
          $recent_posts->the_post();?>
         <div class = "item">
           <div class = 'thumbnail_image'>

            <?php
              if(has_post_thumbnail()){
                the_post_thumbnail(array(300, 200));
              }?>

            </div>

            <div class="content">
              <div class='wd-url-home'><a href="<?php echo esc_url(home_url('/' )); ?>"><?php echo esc_html__( 'HOME','wdjewelry'); ?></a></div>
              <div class="content_title">
                <h3> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
              </div>
              <div class="content_author">
                <span><?php echo get_the_date(); ?></span>
                <span>post by <?php echo get_the_author( ); ?></span>
                <span>  <?php comments_number( '0 comment', '1 comment', '% comment' ); ?></span>

              </div>
              <div class="clear"></div>

              <div class="content_infor">
               <?php echo wdjewelry_get_excerpt(get_the_excerpt( ),22);  ?>
              </div>

            </div>
          
        </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
      </div>

    <?php endif; 
?>