<?php
/**
 * Renders an accessible CTA
 */
$link = $args['link_data'];
$descrip = $args['accessibility_text'];
?>

<?php if (false == empty($link['url'])) : ?>
<a 
  class="cta"
  href="<?= esc_url( $link['url'] ); ?>" 
  <?php if ( $descrip ) : ?>
  aria-label="<?= $descrip; ?>"
  <?php endif; ?>
><?php echo esc_html( $link['title'] ); ?></a>
<?php endif; ?>