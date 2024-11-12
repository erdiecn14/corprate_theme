<?php
/**
 * The template for displaying Faculty and Staff Directory
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
            <h1>Faculty &amp; Staff Directory</h1> 
          </div>
          <?php // get_template_part('template-parts/breadcrumbs', ''); ?>
        </header><!-- .entry-header -->
      </div>
    </div>

    <?php get_template_part('template-parts/team-member-archive',''); ?>     

  </main><!-- #main -->

  

<?php
get_footer();
