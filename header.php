<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drinks
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri() ?>/assets/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon-16x16.png">
	<link rel="manifest" href="<?= get_stylesheet_directory_uri() ?>/assets/site.webmanifest">
	<link rel="mask-icon" href="<?= get_stylesheet_directory_uri() ?>/assets/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon.ico">
	<meta name="msapplication-TileColor" content="#212529">
	<meta name="msapplication-config" content="<?= get_stylesheet_directory_uri() ?>/assets/browserconfig.xml">
	<meta name="theme-color" content="#212529">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-bs-theme="dark">
<?php wp_body_open(); ?>
<main id="page" class="site">
	<header id="masthead" class="site-header container mt-4">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title mb-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="site-logo" src="<?= get_stylesheet_directory_uri() ?>/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</h1>
				<?php
			else :
				?>
				<p class="site-title mb-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="site-logo" src="<?= get_stylesheet_directory_uri() ?>/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</p>
				<?php
			endif;

			$drinks_description = get_bloginfo( 'description', 'display' );

			if ( $drinks_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $drinks_description; ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
