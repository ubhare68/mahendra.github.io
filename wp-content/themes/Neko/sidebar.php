<div id="sidebar">
<div class="right-nav">
<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar(1) ) : ?>

<ol>Categories</ol>
<ul>
<?php wp_list_cats('sort_column=name&optioncount=0'); ?>
</ul>
<ol>Most Recent</ol>
<ul>
<?php get_archives('postbypost', 10); ?>
</ul>
<ol>Recent Comments</ol>
<ul>
<?php if(function_exists("get_recent_comments")) : ?>
<?php get_recent_comments(); ?>
<?php else : ?>
<?php mw_recent_comments(5, false, 150, 150, 135, 'all', '<li style="border:0px; "><a style="background-image:none; padding:10px;" href="%permalink%" title="%title%"><img style="float:left; margin:0px 5px 0px 0px; border:0px;" src="' .get_option('home'). '/wp-content/themes/Neko/img/user_comment.png" /><b>%author_name%</b><br>%title%...</a></li>','d.m'); ?>
<?php endif; ?>
</ul>
<ol>Recommended</ol>
<ul>
<?php get_links(-1, '<li>', '</li>', ' - '); ?>
</ul>
<?php endif; ?>
</div>
</div>