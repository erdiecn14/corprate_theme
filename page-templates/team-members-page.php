<?php

/**
 * Template Name: Team Members
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

$page_feature_list = get_field('feature_options');
$GLOBALS['lyst_section_y_overlap'] = "0px";
$team_member_options = get_field('team_member_options', 'option');

$team_member_args = array(
    'post_type' => 'team_member',
    'publish_status' => 'published',
    'posts_per_page' => -1,
);

$team_member_query = new WP_Query($team_member_args);

$background_image_id = $team_member_options['tm_bg_image'];


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
    <section class="page-section stack hugger py-2 team-member-section" 
             style="background-image: url('<?php echo wp_get_attachment_url($background_image_id, 'full') ?>');"   >
        <ul id="team-member-list" class="team-member-post-list grid-auto">
            <?php
            /* Start the Loop */
            while ($team_member_query->have_posts()) :
                $team_member_query->the_post();
                $team_member_details = get_field('team_member_details', $post->ID);
                $headshot_id = $team_member_details['headshot'];
                $email = $team_member_details['email'];
                $position = $team_member_details['position'];
                $nickname = $team_member_details['Nickname'];
                $first_name = $team_member_details['first_name'];
            ?>
                <li class='team-member-post-list__item'>
                    <a href="/?page_id=<?php the_ID(); ?>">
                        <article id="post-<?php the_ID(); ?>" class="team-member-card stack">

                            <header class="entry-header">
                                <?php if (false == empty($headshot_id)) : ?>
                                    <div class="headshot">
                                        <?php echo wp_get_attachment_image($headshot_id, 'large'); ?>
                                    </div>
                                <?php endif; ?>
                            </header><!-- .entry-header -->

                            <ul class="team-member-card__details">
                                <li>
                                    <?php the_title('<h2 class="post-title">', '</h2>'); ?>
                                </li>
                                <?php if (false == empty($nickname)) : ?>
                                    <li>
                                        <strong>(<?php echo $nickname; ?>)</strong>
                                    </li>
                                <?php endif; ?>
                                <li class="team-member-position">
                                    <?php echo $position; ?>
                                </li>
                            </ul>

                        </article><!-- #post-<?php the_ID(); ?> -->
                    </a>
                </li>
            <?php
            endwhile;
            ?>
        </ul>
    </section>

</article><!-- #post-<?php the_ID(); ?> -->


<?php
get_footer();
