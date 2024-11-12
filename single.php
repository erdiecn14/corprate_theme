<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package real_realty
 */
$blog_post_options = get_field('feature_options');
$blog_archive_options = get_field('blog_archive', 'option'); 
$show_sidebar = $blog_archive_options['show_sidebar'];
$show_title = $blog_post_options['show_post_title'];
$show_featured_image = $blog_post_options['show_featured_image'];
$blog_post_class_list = "blog-post";
if ($show_sidebar) {
	$blog_post_class_list .= " with-sidebar--right";
}
get_header();
?>

  <div class="<?php echo $blog_post_class_list; ?>">

    <main id="primary" class="site-main">

      <?php while ( have_posts() ) : the_post(); ?>
      
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php 
        if ($show_featured_image) : 
          stratford_partners_post_thumbnail(); 
        endif;
        ?>
          
        <?php if ($show_title) : ?>
        <header class="entry-header">
          <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
        <?php endif; ?>

        <section class="entry-content stack">
          <?php the_content(); ?>
        </section>
      
      </article>
      
      <?php
        // the_post_navigation(
        //   array(
        //     'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'stratford-partners' ) . '</span> <span class="nav-title">%title</span>',
        //     'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'stratford-partners' ) . '</span> <span class="nav-title">%title</span>',
        //   )
        // );
      ?>

      <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->

    <?php
    get_sidebar();
    ?>

  </div> <!-- .blog-post-with-sidebar -->

<?php
get_footer();
