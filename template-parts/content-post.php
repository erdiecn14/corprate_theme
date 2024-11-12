<?php
/**
 * Template part for displaying post card content on the blog post list page 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

?>

<article id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<?php 
  if (has_post_thumbnail()) {
    echo "<div class='blog-post-card__image'>";
    the_post_thumbnail('medium');
    echo "</div>";
  } 
  ?>

	<div class="entry-content">
		<?php
		// the_content();
    the_excerpt();
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->
