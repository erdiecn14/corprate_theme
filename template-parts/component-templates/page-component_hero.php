<?php

/**
 * Displays the Hero component
 */

$background = get_sub_field('bg_color_numbers');
$util_classes = get_sub_field('utility_classes');
$display_buffer = get_sub_field('display_buffer');
$media_options = get_sub_field('media_options');
$overlay_text = get_sub_field('overlay_text');
$vertical_text = get_sub_field('vertical_text');
$cta = get_sub_field('cta');
$has_media = false;
if (
	$media_options['media_type'] == 'image' &&
	false == empty($media_options['background_image']['image_id'])
) {
	$has_media = true;
}
if (
	$media_options['media_type'] == 'video' &&
	(false == empty($media_options['video']['mp4']) || false == empty($media_options['video']['webm']))
) {
	$has_media = true;
}
if (
	$media_options['media_type'] == 'embed' &&
	false == empty($media_options['embed_video'])
) {
	$has_media = true;
}

$arrow_right = file_get_contents(get_template_directory() . '/template-parts/svg/chevron_right.svg.php');
?>

<div class="hero <?php echo $util_classes; ?> <?php maybe_bg_class($background); ?>">

	<div class="vertical-text">
		<p><?php echo $vertical_text; ?></p>
		<span class="fancy-arrow"><?php echo $arrow_right ?></span>
	</div>

	<div class="no-guts">
		<?php if (false == empty($overlay_text)) : ?>
			<div class="prose">
				<?php echo $overlay_text; ?>
			</div>
		<?php endif; ?>

		<?php if ($has_media) : ?>
			<div class=" no-container image-hero">
				<?php render_media($media_options); ?>
			</div>
		<?php endif; ?>
	</div>
	<?php // text column requires no-container class, otherwise css container context interferes with intrinsic flex grow and wrapping when the hero text needs more space 
	?>

</div>
