<h4><i><?php echo __('Recent Posts', 'themestudio'); ?></i></h4>
<ul class="recent_posts_list">
<?php
    $postslist = get_posts('numberposts=3&order=DESC&orderby=date');
    foreach ($postslist as $post) :
    setup_postdata($post);
?>

    <li> 
        <span>
            <a href="<?php the_permalink(); ?>">
                <?php if(has_post_thumbnail(get_the_id())){ ?>
                    <?php the_post_thumbnail( array(50,50) ); ?>
                <?php } else { ?>
                    <img src="<?php echo THEMESTUDIO_ASSETS; ?>/images/blog/small_thumb.png" alt="" />
                <?php } ?>
            </a>
        </span> 
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
        <i><?php the_time( 'F d, Y' ); ?></i> 
    </li>

<?php endforeach; ?>

<?php
    wp_reset_postdata();
    wp_reset_query();
?>
</ul>