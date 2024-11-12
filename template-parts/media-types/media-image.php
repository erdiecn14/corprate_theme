<?php
/**
 * renders an image 
 */
  $image_id = $args['media']['background_image']['image_id'];
	$bg_position = $args['media']['background_image']['background_position'];	
	$horizontal = $bg_position['horizontal'];
	$vertical = $bg_position['vertical'];
	$inline_styles = "";
	if (false == empty($horizontal)) {
		$inline_styles .= "--frame-img-pos-x: $horizontal;";
	}  
	if (false == empty($vertical)) {
		$inline_styles .= "--frame-img-pos-y: $vertical;";
	}
?>

<div 
	class="image-frame" 
	<?php if ($inline_styles) : ?>
  style="<?php echo $inline_styles; ?>"
	<?php endif; ?>
>
	<?php echo wp_get_attachment_image($image_id, 'full', false, ['loading' => true]); ?>
</div>
