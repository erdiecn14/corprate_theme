<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

$page_feature_list = get_field('feature_options'); 
$GLOBALS['lyst_section_y_overlap'] = "0px";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-main-article'); ?>>

  <?php
  if ( have_rows('section_collection') ) :
    while ( have_rows('section_collection') ) : the_row();
      // get_template_part( 'template-parts/section-templates/page', get_row_layout() );
      get_template_part( 
				'template-parts/section-templates/page', 'section_basic'
			);
    endwhile;
		$GLOBALS['lyst_section_y_overlap'] = "0px";
  endif;
  ?>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
