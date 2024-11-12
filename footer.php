<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package real_realty
 */

$site_footer_content = get_field('footer_content', 'option');
$footer_logo_id = $site_footer_content['footer_logo'];
$bottom_copy = $site_footer_content['bottom_copy'];
?>

	<footer id="colophon" class="site-footer bg-7">


		
    <section class="footer-bottom py-1">

			<div class="footer-logo">
				<?php echo wp_get_attachment_image($footer_logo_id, 'full'); ?>
			</div>

			<div class="footer-end multi-column">
				<div class="column nav-column">
					<nav id="bottom-navigation" class="footer-navigation">
						<span class="sr-only"><?php esc_html_e( 'Footer Menu', 'stratford-partners'); ?></span>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-3',
									'menu_id'        => 'footer-menu',
									'menu_class' => 'footer-horiz-list columns',
									'walker' => new Stratford_Partners_Footer_Nav_Walker()
								)
							);
						?>
					</nav>
				</div>
				<div class="column">
					<ul class="footer-contact stack">
						<li>
							<a href="<?php echo LOCATION['map_link']; ?>" title="link opens in new tab" target="_blank" rel="noopener">
								<?php render_address(); ?>
							</a>
						</li>
						<li>
							<?php phone_link(CONTACT['primary_phone']); ?>
						</li>
					</ul>
				</div>
				<?php if( false  ==  empty(social_link_list()) ) :?>
					<div class="column">
						<?php social_link_list(); ?>
					</div>
				<?php endif; ?>
			</div>  
		</section>

		<section class="footer-fine-print">
			<?php if (false == empty($bottom_copy)) : ?>
      <div class="footer-bottom__copy prose">
        <?php echo $bottom_copy; ?>
      </div>
      <?php endif; ?>
      
      <div class="legal-links">
        <span class="copyright">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>, all rights reserved</span>
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-4',
              'menu_id'        => 'footer-legal-links',
              'walker' => new stratford_partners_Top_Nav_walker()
            )
          );
        ?>
      </div>
		</section>
    
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
