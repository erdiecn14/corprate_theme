<?php
/**
 * The Blog Posts List template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

$blog_posts_page_id = get_option('page_for_posts');
$blog_archive_options = get_field('blog_archive', 'option'); 
$cta_text = $blog_archive_options['post_cta'];
$image_size = $blog_archive_options['image_size'];
$show_excerpt = $blog_archive_options['show_excerpt'];
$show_sidebar = $blog_archive_options['show_sidebar'];

get_header();
?>

<main id="primary" class="site-main">

	<?php
	if ( have_rows('section_collection', $blog_posts_page_id) ) :
		while ( have_rows('section_collection', $blog_posts_page_id) ) : the_row();
			get_template_part( 'template-parts/section-templates/page', 'section_basic');
		endwhile;
	else : 
	?>
    <div class="page-intro-container">
      <div class="page-intro">
        <header class="entry-header">
          <div class="entry-title-container">
            <h1><?php echo get_the_title($blog_posts_page_id); ?></h1>
          </div>
          <?php // get_template_part('template-parts/breadcrumbs', ''); ?>
        </header><!-- .entry-header -->
      </div>
    </div>
	<?php endif; ?>

		<?php
		/**
		 * Displays the post cards and sidebar 
		 */
		$blogs_wrapper_class_list = "blog-archive-body-wrapper";
		if ($show_sidebar) {
			$blogs_wrapper_class_list .= " with-sidebar--right";
		}
		?>

		<div class="<?php echo $blogs_wrapper_class_list; ?>">

			<section class="blog-listing-section py-1">
			<?php if ( have_posts() ) : ?>

				<ul class="blog-post-list grid-auto">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						$blog_item_class_list = "blog-post-list__item";
						if (false == has_post_thumbnail()) {
							$blog_item_class_list .= " no-thumbnail";	
						} 
					?>
						<li class='<?php echo $blog_item_class_list; ?>'>

							<article id="post-<?php the_ID(); ?>" class="blog-post-card bg-3">
								<header class="entry-header">
									<a href="<?php the_permalink(); ?>" class="blog-post-card__link">
										<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
									</a>
								</header><!-- .entry-header -->

								<?php if (has_post_thumbnail()) : ?>
								<div class='blog-post-card__image'>
									<?php the_post_thumbnail($image_size); ?>
								</div>
								<?php endif; ?>

								<div class="entry-content stack">
									<?php
									the_excerpt();
									?>
									<div class="post-publish-date"><?php echo get_the_date(); ?></div>
								</div><!-- .entry-content -->
								<?php if (false == empty($cta_text)) : ?>
									<span class="pseudo-cta" aria-hidden="true"><?php echo $cta_text; ?></span>
								<?php endif; ?>
							</article><!-- #post-<?php the_ID(); ?> -->

						</li>
					<?php
					endwhile;
					?>
				</ul>

				<?php 
				$short_arrow_back = file_get_contents(get_template_directory() . '/template-parts/svg/arrow-back-short.svg.php');
				$short_arrow_forward = file_get_contents(get_template_directory() . '/template-parts/svg/arrow-forward-short.svg.php');
				the_posts_navigation(array(
					// 'prev_text' => '<span aria-hidden="true">< </span>Older Posts',
					'prev_text' => $short_arrow_back . ' Older Posts',
					'next_text' => 'Newer Posts ' . $short_arrow_forward,
				)); 
				?> 

			</section> <!-- .blog-listing-sectoin -->

			<?php

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			<?php
			if ($show_sidebar) {
				get_sidebar();
			}
			?>
		</div> <!-- .blog-archive-all-wrapper -->
		
  </main><!-- #main -->

  

<?php
get_footer();
