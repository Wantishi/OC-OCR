<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oc-ocr
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Google Ad Sense -->
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-7497500882195696",
		enable_page_level_ads: true
	});
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'oc-ocr' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<div class="logo"></div>
				</a>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary_menu',
					'menu_id'        => 'primary-menu',
				) );
				?>
				<button id="mobile-menu-open" class="mobile-menu-btn trigger"></button>

			</nav><!-- #site-navigation -->
			<div id="mobile-sidepanel">
				<div class="mobile-menu-wrap">
					<div class="branding">
						<div class="logo"></div>
						<button id="mobile-menu-close" class="mobile-menu-btn trigger">
							<svg class="icon icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.5 90.34498">
					            <polygon fill="#FFF" points="94.5 7.337 85.273 0 47.25 38.184 9.227 0 0 7.337 37.835 45.172 0 83.008 9.227 90.345 47.25 52.161 85.273 90.345 94.5 83.008 56.665 45.173 94.5 7.337"></polygon>
					        </svg>
						</button>	
						<hr>
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'mobile_menu',
						'menu_id'        => 'mobile-menu',
					) );
					?>
				</div>
			</div>
			<div class="overlay"></div>
		</div>
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
