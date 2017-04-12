<?php 
	/**
	 * header.php
	 * The header used in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<?php global $liwo; ?> 
<?php if(isset($liwo['theme_view_layout'])): ?>
  <?php if ($liwo['theme_view_layout']=='boxed'): ?>
      <div class="wrapper_boxed">
  <?php endif; ?>
<?php else : ?>
  <div class="wrapper_boxed">
<?php endif; ?>

<div id="wrapper_boxed_id" class="">

<div class="site_wrapper">
  <header id="header">
    <?php get_template_part('content-parts/header','top-style1' ); ?>
    <div id="trueHeader">
      <div class="wrapper">
        <div class="container">
            <!-- Logo -->
            <!-- <div class="logo_main"><a href="<?php echo get_home_url(); ?>" id="logo"></a></div> -->
            <div class="logo_main">
              <?php if ($liwo['custom_logo']['url']): ?>
                <a href="<?php echo get_home_url(); ?>">
                  <img src="<?php echo $liwo['custom_logo']['url']; ?>" alt="">
                </a>
              <?php else : ?>
                <a href="<?php echo get_home_url(); ?>" id="logo"></a>
              <?php endif; ?>
            </div>
            <!-- Menu -->
            <div class="menu_main">

              <?php get_template_part('content-parts/studio', 'nav'); ?>

            </div>
            <!-- end nav menu -->
        </div>
      </div>
    </div>
	
  </header>
  <!-- end header -->
  <div class="clearfix"></div>