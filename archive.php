<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

get_header();
?>


  <main id="primary" class="site-main">
    <div class="page-intro-container">
      <div class="page-intro">
        <header class="entry-header">
          <div class="entry-title-container">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
          ?>
          </div>
          <?php // get_template_part('template-parts/breadcrumbs', ''); ?>
        </header><!-- .entry-header -->
      </div>
    </div>

		

  </main><!-- #main -->

  

<?php
get_footer();
