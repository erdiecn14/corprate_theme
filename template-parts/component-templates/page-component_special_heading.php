<?php
/**
 * Displays the Special Heading component
 */


$util_classes = get_sub_field('utility_classes');
$background = get_sub_field('bg_color_numbers');

$heading = get_sub_field('heading_text');
$optional_text = get_sub_field('optional_text');

?>

<div class="heading-with-line stack <?php echo $util_classes; ?> <?php maybe_bg_class($background); ?>">
  <h2><?php echo $heading ?></h2>
  <div class="heading-line"></div>
  <?php if($optional_text) : ?>
    <p class="optional-text"><?php echo $optional_text; ?></p>
  <?php endif; ?>  
</div>


