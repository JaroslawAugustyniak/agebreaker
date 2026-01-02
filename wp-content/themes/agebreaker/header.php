<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inwenta
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary-content"><?php esc_html_e( 'Skip to content', 'agebreaker' ); ?></a>
	<div id="is_mobile"></div>
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="logotypy">
						<img src="<?= esc_url(get_template_directory_uri() . '/images/fundusze-europejskie-logo.svg'); ?>" alt="Fundusze Europejskie" class="fundusze">
						<img src="<?= esc_url(get_template_directory_uri() . '/images/rp-logo.svg'); ?>" alt="Rzeczpospolita Polska" class="rp">
						<img src="<?= esc_url(get_template_directory_uri() . '/images/ue-dofinansowanie.svg'); ?>" alt="Dofinansowane przez Unię Europejską" class="ue">
						<img src="<?= esc_url(get_template_directory_uri() . '/images/transfer-hub-logo.svg'); ?>" alt="Fundusze Europejskie" class="hub d-block d-md-none">
					</div>
				</div>
				<div class="col-1 d-none d-md-block"><div class="break-pion"></div></div>
				<div class="col-md-4 d-none d-md-block">
					<div class="hub">
						<img src="<?= esc_url(get_template_directory_uri() . '/images/transfer-hub-logo.svg'); ?>" alt="Fundusze Europejskie">
						<p>Innowacja została opracowana w&nbsp;Inkubatorze TransferHUB, <a href="https://www.transferhub.pl" target="_blank">www.transferhub.pl</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="break full"><div></div></div>
		<div class="container">
			<div class="row">
				<div class="site-branding col-6 col-md-2">
					<?php
						the_custom_logo();
					?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="col-6 main-navigation col-md-10">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Menu toggle">
						<div></div>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
			
					
				</nav><!-- #site-navigation -->
				

				

			</div>
		</div>
	</header><!-- #masthead -->
	<main id="primary-content">