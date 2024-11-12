<?php

/**
 * Template part for displaying post card content on the blog post list page 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package real_realty
 */

//  $team_member_query->the_post();
$team_member_details = get_field('team_member_details', $post->ID);
$headshot_id = $team_member_details['headshot'];
$email = $team_member_details['email'];
$position = $team_member_details['position'];
$nickname = $team_member_details['Nickname'];
$first_name = $team_member_details['first_name'];
$last_name = $team_member_details['last_name'];
$bio_content = $team_member_details['team_member_bio'];
$arrow_right = file_get_contents(get_template_directory() . '/template-parts/svg/chevron_right.svg.php');
get_header();

// var_dump($team_member_details);

?>

<article class="team-member-post-wrapper" id="post-<?php the_ID(); ?>">
    <header class="entry-header">
        <div class="headshot">
            <?php if (false == empty($headshot_id)) : ?>
                <div class="headshot">
                    <?php echo wp_get_attachment_image($headshot_id, 'large'); ?>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="bio-info">
        <h2><?php echo $first_name ?> <?php echo $last_name ?></h2>
        <h3><?php echo $position ?></h3>
        <?php echo $bio_content ?>
        <section class="back-to-page">
            <a href="/team/" class="cta">
                <span class="arrow-link__text">Back to Full Team</span><span><?php echo $arrow_right ?></span>
            </a>
        </section>
    </div>


</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();
