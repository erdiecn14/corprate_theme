<?php
/**
 * Displays the Prose component
 */

$util_classes = get_sub_field('utility_classes');
$display_buffer = get_sub_field('display_buffer'); 
$code_snippet = get_sub_field('code_snippet');
$background = get_sub_field('bg_color_numbers');
$block_align = get_sub_field('block_alignment');
$block_align_class = 'x-start';
if ($block_align == 'center') {
  $block_align_class = 'x-center';
} elseif ($block_align == 'right') {
  $block_align_class = 'x-end';
}
$util_classes .= " $block_align_class";
?>

<div class="snippet-wrapper <?php echo $util_classes; ?> <?php maybe_bg_class($background); ?>">
  <?php echo $code_snippet; ?>
</div>
