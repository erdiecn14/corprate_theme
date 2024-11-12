<?php
/**
 * Displays the Framed image component
 */
$frame_color = get_sub_field('frame_color_numbers');
$image_id = get_sub_field('picture');
$image_options = get_sub_field('image_options');
$aspect = $image_options['image_aspect_ratio'];
$horizontal = $image_options['horizontal'];
$vertical = $image_options['vertical'];
$image_max_width_value = $image_options['max_width'];
$color_num = '';
$frame_color_class = '';
$inline_styles = '';
if (false == empty($frame_color)) {
  $color_num = explode('_', $frame_color)[1];
}
if (false == empty($aspect)) {
  $inline_styles .= "aspect-ratio: $aspect;";
}
if (false == empty($horizontal)) {
  $inline_styles .= "--frame-img-pos-x: $horizontal;";
}  
if (false == empty($vertical)) {
  $inline_styles .= "--frame-img-pos-y: $vertical;";
}
if (false == empty($image_max_width_value)) {
  $inline_styles .= "max-width: $image_max_width_value;";
}
if (false == empty($color_num)) {
	$frame_color_class = "frame-$color_num";
}

// var_dump(wp_get_attachment_url($image_id));
?>

<div 
  class="image-frame <?php echo $frame_color_class; ?>"
<?php if ($inline_styles) : ?>
  style="<?php echo $inline_styles; ?>"
<?php endif; ?>
>
  <a 
    class="sfpt-lightbox-image"
    href="<?php echo wp_get_attachment_url($image_id); ?>"
    aria-haspopup="true"
    title="open image in a lightbox"
    >
    <?php echo wp_get_attachment_image($image_id, 'full'); ?>
  </a>
</div>
