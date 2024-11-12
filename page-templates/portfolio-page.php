<?php

/**
 * Template Name: Portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

$page_feature_list = get_field('feature_options');
$GLOBALS['lyst_section_y_overlap'] = "0px";

$asset_args = array(
    'post_type' => 'asset',
    'publish_status' => 'published',
    'posts_per_page' => -1,
);

$asset_query = new WP_Query($asset_args);


get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-main-article'); ?>>

    <?php
    if (have_rows('section_collection')) :
        while (have_rows('section_collection')) : the_row();
            // get_template_part( 'template-parts/section-templates/page', get_row_layout() );
            get_template_part(
                'template-parts/section-templates/page',
                'section_basic'
            );
        endwhile;
        $GLOBALS['lyst_section_y_overlap'] = "0px";
    endif;
    ?>
    <section class="page-section stack hugger py-2 portfolio-section">
        <ul id="assets-list" class="asset-post-list grid-auto">
            <?php
            /* Start the Loop */
            while ($asset_query->have_posts()) :
                $asset_query->the_post();
                $asset_details = get_field('asset_details', $post->ID);
                $asset_image = $asset_details['asset_image'];
                $asset_info = $asset_details['asset_info'];
                // var_dump($asset_details);

            ?>
                <li class='asset-post-list__item'>
                    <article id="post-<?php the_ID(); ?>" class="asset-card stack">

                        <header class="entry-header">
                            <?php if (false == empty($asset_image)) : ?>
                                <div class="asset-image">
                                    <?php echo wp_get_attachment_image($asset_image, 'large'); ?>
                                </div>
                            <?php endif; ?>
                        </header><!-- .entry-header -->

                        <div class="asset-info">
                            <?php echo $asset_info; ?>
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->
                </li>
            <?php
            endwhile;
            ?>
        </ul>
        <!-- <div class="load-more-button-wrapper">
            <p id="load-more-portfolio-cards" class="load-more-btn cta">
                Load More
            </p>
        </div> -->
    </section>

</article><!-- #post-<?php the_ID(); ?> -->


<?php
get_footer();
