<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#118886">
    <style><?php // include the above the fold style and, remind, include is different than enqueue and the code will be added directly to the page
	    include (TEMPLATEPATH . '/assets/dist/css/atf.css' );
	  ?></style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

  <?php get_template_part( 'template-parts/header/header' ); ?>

  <div id="content" class="site-content">
