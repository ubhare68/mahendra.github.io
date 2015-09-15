<?php get_header(); ?>
<div id="content" class="narrowcolumn">
<?php if (have_posts()) : ?>
<?php $post = $posts[0];  ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top" class="titlebg">Howdy Stranger! Welcome to <?php bloginfo('name'); ?></td>
</tr>
<tr>
<td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td width="65%" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 1</td>
</tr>
<tr>
<td class="cell-h" style="padding:8px;">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div align="center" class="Landscape-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="150" width="225" src="<?php echo get_post_meta($post->ID, "Landscape", true); ?>" /></a></div>
<?php the_content_limit(250, ""); ?>
<div style="display:block; text-align:center;"><b><a style="font-size:14px;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title2('', '...', true, '22') ?> &raquo;</a></b></div>
<?php endwhile; ?>
</td>
</tr>
</table></td>
<td style="border-left:1px dotted #999999;" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 2</td>
</tr>
<tr>
<td class="cell-h"  style="padding:8px;">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div align="center" class="Landscape-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="150" width="225" src="<?php echo get_post_meta($post->ID, "Landscape", true); ?>" /></a></div>
<?php the_content_limit(250, ""); ?>
<div style="display:block; text-align:center;"><b><a style="font-size:14px;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title2('', '...', true, '22') ?> &raquo;</a></b></div>
<?php endwhile; ?>
</td>
</tr>
</table></td>
</tr>
<tr>
<td style="border-top:1px dotted #999999;" colspan="2" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 3</td>
</tr>
<tr>
<td class="cell-h">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div class="cat-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="150" width="150" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div><?php the_content_limit(300, ""); ?>
<div style="display:block; text-align:right;"><b><a style="font-size:14px;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></b></div>
<?php endwhile; ?>
</td>
</tr>
</table>  </td>
</tr>
<tr>
<td style="border-top:1px dotted #999999;" colspan="2" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 4</td>
</tr>
<tr>
<td class="cell-h">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div class="cat-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="150" width="150" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div><?php the_content_limit(300, ""); ?>
<div style="display:block; text-align:right;"><b><a style="font-size:14px;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></b></div>
<?php endwhile; ?>
</td>
</tr>
</table></td>
</tr>
<tr>
<td style="border-top:1px dotted #999999;" colspan="2" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 5</td>
</tr>
<tr>
<td class="cell-h">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div class="cat-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="150" width="150" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div><?php the_content_limit(300, ""); ?>
<div style="display:block; text-align:right;"><b><a style="font-size:14px;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></b></div>
<?php endwhile; ?>
</td>
</tr>
</table></td>
</tr>
</table>
</td>
<td style="border-left:1px dotted #999999;" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 6</td>
</tr>
<tr>
<td class="cell-h" style="padding:8px;">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div class="Small-Landscape-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="80" width="80" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div>
<a style="text-align:left;" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>" rel="bookmark"><strong><?php the_title2('', '...', true, '18') ?></strong></a>
<?php the_content_limit(60, ""); ?>
<?php endwhile; ?>

<div class="new-stuff" style="margin:0px;">
<b>Category Title 6</b>
<?php $recent = new WP_Query("cat=1&showposts=7&offset=1"); while($recent->have_posts()) : $recent->the_post();?>
<li><a style="text-align:left;" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>" rel="bookmark"><strong><?php the_title2('', '...', true, '24') ?></strong></a></li>
<?php endwhile; ?>
</div>
</td>
</tr>
</table></td>
</tr>
<tr>
<td style="border-top:1px dotted #999999;" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 7</td>
</tr>
<tr>
<td class="cell-h">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div class="Small-Landscape-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="80" width="80" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div>
<a style="text-align:left;" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>" rel="bookmark"><strong><?php the_title2('', '...', true, '18') ?></strong></a>
<?php the_content_limit(60, ""); ?>
<?php endwhile; ?>

<div class="new-stuff" style="margin:0px;">
<b>Category Title 7</b>
<?php $recent = new WP_Query("cat=3&showposts=7&offset=1"); while($recent->have_posts()) : $recent->the_post();?>
<li><a style="text-align:left;" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>" rel="bookmark"><strong><?php the_title2('', '...', true, '24') ?></strong></a></li>
<?php endwhile; ?>
</div>
</td>
</tr>
</table>  </td>
</tr>
<tr>
<td style="border-top:1px dotted #999999;" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td valign="top" class="cell-t" style="border:1px solid #ccc;">Category Title 8</td>
</tr>
<tr>
<td class="cell-h">
<?php $recent = new WP_Query("cat=1&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
<div class="Small-Landscape-image"><a href="<?php the_permalink() ?>"><img style="padding:0px; margin:0px; border:0px;" height="80" width="80" src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" /></a></div>
<a style="text-align:left;" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>" rel="bookmark"><strong><?php the_title2('', '...', true, '18') ?></strong></a>
<?php the_content_limit(60, ""); ?>
<?php endwhile; ?>

<div class="new-stuff" style="margin:0px;">
<b>Category Title 8</b>
<?php $recent = new WP_Query("cat=1&showposts=7&offset=1"); while($recent->have_posts()) : $recent->the_post();?>
<li><a style="text-align:left;" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>" rel="bookmark"><strong><?php the_title2('', '...', true, '24') ?></strong></a></li>
<?php endwhile; ?>
</div>
</td>
</tr>
</table>  </td>
</tr>
</table></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<?php else : ?>
<?php include (TEMPLATEPATH . '/notfound.php');?>
<?php endif; ?>
<?php get_footer(); ?>