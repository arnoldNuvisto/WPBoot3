<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPBoot3
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--[if (lte IE 10) & (!IEMobile)]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'WPBoot3' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-static-top navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
 
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a>
				</div>
 
				<div class="navbar-collapse collapse navbar-responsive-collapse">
				<?php
				$args = array(
					'theme_location'	=> 'menu-1',
					'depth'      		=> 3, // bootstrap ignores anything > 2 :(
					'container'			=> false,
					'menu_class'		=> 'nav navbar-nav navbar-right',
                    'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
					'walker'			=> new WP_Bootstrap_Navwalker()
					);
				if (has_nav_menu('menu-1')) {
					wp_nav_menu($args);
				}
				?>
				</div>
			</div>
		</nav>		

	</header><!-- #masthead -->

	<div id="content" class="site-content">
