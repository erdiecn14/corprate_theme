<?php
/**
 * The template for displaying the Static Front Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

get_header();
?>

	<main id="primary" class="site-main home-page-main">

  <?php 
	while ( have_posts() ) : 
		the_post(); 
		get_template_part( 'template-parts/content', 'page' );
	endwhile; // end the loop
	?> 

	</main><!-- #main -->

<?php
get_footer();
