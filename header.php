<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="keywords" content="bicycle, bicycling, bike, walk, walking, community, communities, project, studies, case studies, walk bike, walking biking, biking">	

	<!--[if lte IE 9]>
    	<script src="/wp-contents/themes/walkbikenc/js/html5shiv.js"></script>
    	<style>
			
    	</style>
	<![endif]-->

	<link rel="shortcut icon" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-152x152.png" type="image/x-icon" />
	<!-- Apple Touch Icons -->
	<link rel="apple-touch-icon" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/walkbikenc/img/favicons/apple-touch-icon-152x152.png" />
	<!-- Windows 8 Tile Icons -->
    <meta name="msapplication-square70x70logo" content="/wp-content/themes/walkbikenc/img/favicons/largetile.png" />
	<meta name="msapplication-square150x150logo" content="/wp-content/themes/walkbikenc/img/favicons/largetile.png" />
	<meta name="msapplication-wide310x150logo" content="/wp-content/themes/walkbikenc/img/favicons/widetile.png" />
	<meta name="msapplication-square310x310logo" content="/wp-content/themes/walkbikenc/img/favicons/largetile.png" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header>
		
		<a href="/" class="logo">
			<?php include ( get_stylesheet_directory() . '/img/logo-beta.svg' ); ?>
		</a>

		<input type="checkbox" name="nav" class="nav-check">
    	<label rel="navigation" class="navicon"></label>

		<nav class="nav-menu">
			<?php wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'menu' => 'main',
				'container' => false,
				'items_wrap' => '<ul class="main-nav">%3$s</ul>'
			)); ?>

			<form role="search" method="get" class="search-form mobile-search" action="/">
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:">
				<input type="submit" class="search-submit" value="Search">
			</form>
		</nav>

		<form role="search" method="get" class="search-form desktop-search" action="/">
			<span class="screen-reader-text">Search for:</span>
			<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:">
			<input type="submit" class="search-submit" value="Search">
		</form>

	</header>