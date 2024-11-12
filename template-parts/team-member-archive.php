<?php
/**
 * Displays the post cards and sidebar 
 */
?>
<?php if (is_tax()) : ?>
<section>
  <a href="/faculty-staff-directory/" class="arrow-link">
    <span class="arrow-back"><?php get_template_part('template-parts/svg/arrow-back.svg'); ?></span><span class="arrow-link__text">Back to Full Directory</span>
  </a>
</section>
<?php endif; ?>
<div class="team-member-archive-body-wrapper r-reverse with-sidebar--left">
  <aside class="tax-sidebar widget-area sidebar">
    <?php 
    echo get_template_part('template-parts/tax-sidebar-toggle-nav', '', array(
      'heading_sr_text' => 'Faculty &amp; Staff By ',
      'heading_text' => 'Locations',
      'description' => 'Click a location to view its Faculty &amp; Staff',
      'tax_name' => 'location',
    )); 

    echo get_template_part('template-parts/tax-sidebar-static-nav', '', array(
      'heading_sr_text' => 'Faculty &amp; Staff By ',
      'heading_text' => 'Locations',
      'description' => 'Click a location to view its Faculty &amp; Staff',
      'tax_name' => 'location',
    ));
    
    echo get_template_part('template-parts/tax-sidebar-toggle-nav', '', array(
      'heading_sr_text' => 'Faculty &amp; Staff By ',
      'heading_text' => 'Job Function',
      'description' => 'Click a location to view its Faculty &amp; Staff',
      'tax_name' => 'function',
    ));

    echo get_template_part('template-parts/tax-sidebar-static-nav', '', array(
      'heading_sr_text' => 'Faculty &amp; Staff By ',
      'heading_text' => 'Job Function',
      'description' => 'Click a location to view its Faculty &amp; Staff',
      'tax_name' => 'function',
    ));
    ?>
  </aside>

  <section class="team-member-listing-section">
    
  <?php if ( have_posts() ) : ?>

    <ul id="team-member-list" class="team-member-post-list grid-auto">
      <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        $team_member_details = get_field('team_member_details', $post->ID);
        $headshot_id = $team_member_details['headshot'];
        $email = $team_member_details['email'];
        $position = $team_member_details['position'];
        $nickname = $team_member_details['Nickname'];
        $first_name = $team_member_details['first_name'];
      ?>
        <li class='team-member-post-list__item'>
          <article id="post-<?php the_ID(); ?>" class="team-member-card stack">

            <header class="entry-header">
              <?php if (false == empty($headshot_id)) : ?>
                <div class="headshot">
                  <?php echo wp_get_attachment_image($headshot_id, 'large'); ?>
                </div>
              <?php endif; ?>
              <?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
              <?php if (false == empty($nickname)) : ?>
                <strong>(<?php echo $nickname; ?>)</strong>
              <?php endif; ?>
            </header><!-- .entry-header -->
            
            <ul class="team-member-card__details">
              <li class="team-member-position">
                <strong><?php echo $position; ?></strong>
              </li>
              <li class="team-member-email">
                <a href="mailto:<?php echo $email; ?>" target="_blank" rel="noopener nofollow" title="link opens email in a new window">
                  <span role="presentation" aria-hidden="true" class="email-icon-wrapper"><?php echo get_template_part('template-parts/svg/email.svg'); ?></span>
                  Email <?php echo $first_name; ?>
                </a>
                <!--
                <button class="email-copy-button" data-email="<?php echo $email; ?>">
                  <?php echo get_template_part('template-parts/svg/copy.svg'); ?>
                  <span>Copy <?php echo $first_name; ?>'s <span class="no-break">Email Address</span></span>
                </button>
                -->
              </li>
            </ul>

          </article><!-- #post-<?php the_ID(); ?> -->
        </li>
      <?php
      endwhile;
      ?>
    </ul>

    <?php 
    /*
    the_posts_navigation(array(
      'prev_text' => '<span aria-hidden="true">< </span>Older Posts',
      'next_text' => 'Newer Posts<span aria-hidden="true"> ></span>',
    ));
    */ 
    ?> 

  </section> <!-- .blog-listing-sectoin -->

  <?php

  else :

    get_template_part( 'template-parts/content', 'none' );

  endif;
  ?>

  
</div> <!-- .blog-archive-all-wrapper -->