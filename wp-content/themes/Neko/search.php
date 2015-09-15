<?php get_header(); ?>
<div id="content" class="narrowcolumn">
<div class="post">
<div class="entry">
<?php if (have_posts()) : ?>
<?php $post = $posts[0];  ?>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="titlebg">Search Results</td>
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
<fieldset>
<legend><?php the_title(); ?></legend>
<div class="cat-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; border:0px; margin:0px;" width="150" height="150" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div>
<?php the_content_limit(400, ""); ?>
<div class="continue-reading">
<b><a style="font-size:14px;" href="<?php the_permalink() ?>"><?php the_title(); ?> &raquo;</a></b>
</div>
</fieldset>
<?php endwhile; ?>
<?php else : ?>
<?php include (TEMPLATEPATH . '/search404.php');?>
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
</div>
</div>
<?php get_footer(); ?>