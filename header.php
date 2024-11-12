<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package real_realty
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href=https://use.typekit.net/jif6ewu.css>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'stratford-partners' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation-top" class="primary-navigation">
      <div class="top-logo">
        <?php the_custom_logo(); ?>
      </div>
      <button 
        id="primary-nav-toggle" 
        class="menu-toggle" 
        aria-controls="primary-menu" 
        aria-expanded="false"
      >
        <span class="burger"></span>
        <span class="sr-only"><?php esc_html_e( 'Primary Menu', 'stratford-partners' ); ?></span>
      </button>
			<div class="primary-nav-package">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'walker' => new Stratford_Partners_Top_Nav_walker()
					)
				);
				?>
				<?php if (has_nav_menu('menu-2')) : ?>
					<button 
						id="secondary-nav-toggle" 
						class="secondary-menu-toggle" 
						aria-controls="secondary-menu" 
						aria-expanded="false"
					>
						<span class="burger"></span>
						<span class="sr-only"><?php esc_html_e( 'Secondary Menu', 'stratford-partners' ); ?></span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'secondary-menu',
							'walker' => new Stratford_Partners_Top_Nav_walker()
						)
					);
					?>
			<?php endif; ?>
			</div> <!-- .primary-nav-package -->
		</nav><!-- #site-navigation-top -->
	</header><!-- #masthead -->



