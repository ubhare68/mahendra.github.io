<?php get_header(); ?>
<div id="content" class="narrowcolumn">
<?php if (have_posts()) : ?>
<?php $post = $posts[0];  ?>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="titlebg"><?php wp_title(); ?></td>
</tr>

<tr>
<td class="clickbg">
<div class="bread"><?php if (class_exists('breadcrumb_navigation_xt')) {
echo '';
// New breadcrumb object
$mybreadcrumb = new breadcrumb_navigation_xt;
// Options for breadcrumb_navigation_xt
$mybreadcrumb->opt['title_blog'] = 'Home';
$mybreadcrumb->opt['separator'] = ' &raquo; ';
$mybreadcrumb->opt['singleblogpost_category_display'] = true;
// Display the breadcrumb
$mybreadcrumb->display();
} ?></div>
</td>
</tr>
<tr>
<td class="cell-h" align="center" style="padding:10px 0px 0px 0px;">
<?php include 'adsense/728x90.php';?>
</td>
</tr>
<tr>
<td class="main-content">
<div class="post">
<div class="entry">
<?php while (have_posts()) : the_post(); ?>
<?php if(is_single()) : ?>
<?php endif;  ?>
<fieldset>
<legend><?php the_title(); ?> <?php edit_post_link('(Edit)', '', ''); ?></legend>
<div class="cat-image"><a style="borer:0px; padding:0px;" href="<?php the_permalink() ?>"><img style="padding:0px; border:0px; margin:0px;" width="150" height="150" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div>
<?php the_content_limit(400, ""); ?>
<div class="continue-reading">
<b><a style="font-size:14px;" href="<?php the_permalink() ?>"><?php the_title(); ?> &raquo;</a></b>
</div>
</fieldset>
<?php endwhile; ?>
<?php else : ?>
<?php include (TEMPLATEPATH . '/notfound.php');?>
<?php endif; ?>
<?php
        if(class_exists('wp_pagination_plugin')){
                        $p = new wp_pagination_plugin;
                        $p->show();
                } ?>

</div>
</div>
</td>
</tr>
</table>
</div>
<?php get_footer(); ?>