<?php 
    $post_id = (int)get_post_thumbnail_id( );
?>
<li class="cbp-item identity cbp-l-grid-masonry-height1">
    <a class="cbp-caption cbp-lightbox" data-title="<?php the_title( ); ?>" href="<?php echo wp_get_attachment_image_src( $post_id, 'large' )[0]; ?>">
        <div class="cbp-caption-defaultWrap">
            <?php the_post_thumbnail( ); ?>
        </div>
        <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title"><?php the_title( ); ?></div>
                    <div class="cbp-l-caption-desc"><?php the_excerpt(); ?></div>
                </div>
            </div>
        </div>
    </a>
</li>