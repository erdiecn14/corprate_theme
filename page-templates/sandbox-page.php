<?php
/**
 * Sandbox Page
 * Template Name: Sandbox
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'sandbox' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
