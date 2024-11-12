<?php
/**
 * Displays the Prose component
 */

$prose_options = get_sub_field('prose_options');
$util_classes = get_sub_field('utility_classes');
$display_buffer = get_sub_field('display_buffer'); 
$background = get_sub_field('bg_color_numbers');
$simple_frame_class = "";
$block_align = get_sub_field('block_alignment');
$block_align_class = 'x-start';
if ($background) {
  $simple_frame_class = "simple-frame";
}
$util_classes .= " $simple_frame_class";
if ($block_align == 'center') {
  $block_align_class = 'x-center';
} elseif ($block_align == 'right') {
  $block_align_class = 'x-end';
}
$util_classes .= " $block_align_class";
?>

<div class="prose stack <?php echo $util_classes; ?> <?php maybe_bg_class($background); ?>">
  <?php echo $prose_options['body']; ?>
</div>
