<?php
/**
 * Template Name: Sidebar Left
 * 
 * The template for displaying left sidebar pages 
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WPBoot3
 */

get_header(); ?>

<div class="container">
	<div class="row">

	<div id="primary" class="content-area col-md-9 col-lg-9 col-md-push-3">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_sidebar('left');
	?>
	</div> <!-- .row -->
</div> <!-- .container -->
	<?php 
get_footer();
?>
