<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes" />

		<!-- Header scripts (only essential) -->
		<!--[if lt IE 9]>
		  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script>
		  (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)
		</script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="skip-to-content" class="screen-reader-text">
			<a href="#site-content"><?php _e('Skip to main content', 'xtheme'); ?></a>
		</div>

		<header id="site-header" class="header" role="banner" aria-label="Main Header">
			<?php get_template_part('components/top-bar'); ?>
			<div class="centering">
				<div class="header-inner">
					<div class="header-logo">
						<a href="<?php echo site_url(); ?>" title="Back to Homepage">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png'" alt="<?php bloginfo('name'); ?>" aria-label="<?php echo get_bloginfo('name'); ?> Logo" width="90" height="35" />
						</a>
					</div>

					<a class="hamburger" href="#" title="Menu">
						<span class="line-1"></span>
						<span class="line-2"></span>
						<span class="line-3"></span>
					</a>

					<nav id="main-nav" class="main-nav" role="navigation" aria-label="Main Navigation">
						<?php wp_nav_menu( array('theme_location'  => 'main', 'container' => false) ); ?>
					</nav>
				</div>
			</div>
		</header>

		<?php if(is_front_page()) { get_template_part('components/homepage-slideshow'); } else { get_template_part('components/page-banner'); } ?>
		<main id="site-content" class="main" role="main" aria-label="Main Content">