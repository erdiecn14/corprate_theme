<?php

/**
 * Displays the Contact Card List
 * see _card-list.scss for CSS
 * see _buttons.scss for pseudo-cta CSS
 * see inc/theme-custom-fields/acf-flex-component-fields/super-list.php for fields
 */

$card_collection = $args['items'];

?>

<ul class="card-list contact-card grid-auto">

  <?php
  foreach ($card_collection as $card) :
    $is_linked = false;
    $cta_text = 'Read More';
    if (false == empty($card['link_item']['url'])) {
      $is_linked = true;
    }
    if (false == empty($card['cta_text_override'])) {
      $cta_text = $card['cta_text_override'];
    }
  ?>

    <li class="card <?php if ($is_linked) echo 'linked'; ?>">

      <?php if (false == empty($card['heading'])) : ?>
        <header class="card__header">
          <h3 class="card__heading">
            <?php if ($is_linked) : ?>
              <a href="<?php echo $card['link_item']['url']; ?>">
                <?php echo $card['heading']; ?>
              </a>
            <?php else : ?>
              <?php echo $card['heading']; ?>
            <?php endif; ?>
          </h3>
        </header>
      <?php endif; ?>

      <?php echo wp_get_attachment_image($card['cover_image'], 'full', false, ['class' => 'card__cover-image attachment-full']) ?>

      <?php echo $card['body']; ?>

      <?php if ($is_linked) : ?>
        <span class="pseudo-cta" aria-hidden="true"><?php echo $cta_text; ?></span>
      <?php endif; ?>

    </li>

  <?php endforeach; ?>

</ul>