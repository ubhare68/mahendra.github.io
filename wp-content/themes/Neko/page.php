<?php get_header(); ?>
<div id="content" class="narrowcolumn">
<?php if (have_posts()) : ?>
<?php $post = $posts[0];  ?>
<?php if (is_category()) { ?>
<?php  } elseif (is_day()) { ?>
<h2 class="titlebg">
<?php _e('Archive for','minyx2Lite')?>
<?php the_time('F jS, Y'); ?>
</h2>
<?php  } elseif (is_month()) { ?>
<h2 class="titlebg">
<?php _e('Archive for','minyx2Lite')?>
<?php the_time('F, Y'); ?>
</h2>
<?php } elseif (is_year()) { ?>
<h2 class="titlebg">
<?php _e('Archive for','minyx2Lite')?>
<?php the_time('Y'); ?>
</h2>
<?php  } elseif (is_search()) { ?>
<h2 class="titlebg"> <?php _e('Search results for ','minyx2Lite')?>&#8216;&#8216;<?php echo($s); ?>&#8217;&#8217; </h2>
<?php } ?>
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
<tr>
<td class="main-content">
<div class="post">
<div class="entry">
<?php while (have_posts()) : the_post(); ?>
<?php if(is_single()) : ?>
<?php endif;  ?>
<fieldset>
<legend><?php the_title(); ?> <?php edit_post_link('(Edit)', '', ''); ?></legend>
<?php the_content(__('<b>Continued</b>')); ?>
</fieldset>
<?php comments_template(); // Get wp-comments.php template ?>
<?php endwhile; ?>
<?php else : ?>
<?php include (TEMPLATEPATH . '/notfound.php');?>
<?php endif; ?>
</div>
</div>
</td>
</tr>
</table>
</div>
<?php get_footer(); ?>