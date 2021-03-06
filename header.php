<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Go_Country_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'co-country-theme' ); ?></a>

	
	<?php get_search_form(); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="topBar">
			<div class="container">
				<div class="topBar-container">	
					<img class="topBar-phone-img" src="/~gots/wp-content/uploads/topPhone.png" alt="Telefone">
					<span class="topBar-phone-txt">+55 11 3958-4973  |  +44 78 0923-5633</span>
					<img class="topBar-email-img" src="/~gots/wp-content/uploads/topEmail.png" alt="Email">
					<span class="topBar-email-txt">contato@goescocia.com</span>
				</div>					
			</div>
		</div>
		<div class="container">			
			<div class="site-branding">
				<?php if ( is_front_page() && is_home() ) { ?>
					<h1>
				<?php } ?>
					<span class="site-title">
						<?php $header_image = get_header_image();
							if ( ! empty( $header_image ) ) { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>" />
								</a>
						<?php } ?>
					</span>
				<?php if ( is_front_page() && is_home() ) { ?>
					</h1>
				<?php }

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description" style="display: none;"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<a href="#" id="menu-icon" aria-controls="primary-menu" aria-expanded="false"></a>
				<div class="search-container">
					<a id="openSearch">
						<img src="/~gots/wp-content/uploads/search.png" alt="search">
					</a>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
