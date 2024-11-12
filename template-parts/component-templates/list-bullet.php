<?php
/**
 * Displays the default Bullet List
 *  (uses default li styles)
 * see inc/theme-custom-fields/acf-flex-component-fields/super-list.php for fields
 */

$bullet_collection = $args['items'];
?>

<ul class="bullet-list">

<?php foreach($bullet_collection as $bullet) : ?>

  <li>
    <?php if (false == empty($bullet['heading'])) echo "<h3>" . $bullet['heading'] . "</h3>"; ?> 
    <?php echo $bullet['body']; ?>
  </li> 

<?php endforeach; ?>

</ul>