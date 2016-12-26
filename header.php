<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Elo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

	<div class="container">
		<div class="wrapper">

			<!-- top nav begin -->
			<nav id="navigation" class="navbar-custom navbar-fixed-top">
				<div class="wrap-top-nav clearfix">
					<div class="logo left">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
					<div class="search-form-wrap">
						<?php get_search_form(); ?>
					</div>
					<div class="menu-button right">
						<a id="trigger-overlay" href="javascript:void(0)"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-toggle-menu.png" alt="menu"></a>
					</div>
				</div>
			</nav>
			<!-- top nav end -->
