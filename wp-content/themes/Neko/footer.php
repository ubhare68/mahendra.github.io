</div>
</div>
<?php wp_footer(); ?>
<div class="footer-bg">
<div style="margin:0 auto; width:990px;">
<table width="100%" class="foot" border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top"><table border="0" cellpadding="0" cellspacing="5">
<tr>
<td align="left" style="padding:30px 10px 10px 10px;">
<a href="<?php echo get_option('home'); ?>/"><img class="foot-logo" style="float:left; margin-right:10px;" src="<?php echo get_option('home'); ?>/wp-content/themes/Neko/img/spacer.gif" alt="<?php bloginfo('name');?>" width="116" height="40" border="0" /></a><?php bloginfo('description'); ?> - Theme <a href="http://www.arthack.org">By</a> <a href="http://www.arthack.org" style="color:#FFFFFF;">Theme Spinner</a>.</td>
</tr>
<tr>
<td valign="top"><div class="nav-foot" style="width:970px; margin:0px; padding:0px;">
<ul>
<?php
global $page_sort;	
	if(get_settings('Neko_sortpages')!='')
	{ 
		$page_sort = 'sort_column='. get_settings('Neko_sortpages');
	}	
	global $pages_to_exclude;
	
	if(get_settings('Neko_excludepages')!='')
	{ 
		$pages_to_exclude = 'exclude='. get_settings('Neko_excludepages');
	}	
?>
<li><a href="<?php echo get_option('home'); ?>/">Home</a></li>
<?php wp_list_pages('title_li=&depth=1&'.$page_sort.'&'.$pages_to_exclude)?>
<li><a onclick="backToTop(); return false" href="javascript:;">Back to Top</a></li>
</ul>
</div></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
</div>
</div>
</body>
</html>