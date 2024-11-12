<?php
/**
 * Renders the testimonial list
 */

$testimonial_options = get_sub_field('featured_testimonial_options');
$testimonial_collection = $testimonial_options['testimonial_collection'];
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

<div class="testimonial-list stack <?php echo $util_classes; ?> <?php maybe_bg_class($background); ?>">
	<div class="testimonial-slider">
		<!-- <div> -->
	<?php foreach($testimonial_collection as $testimonial) : ?>  
		<?php 
		$testimonial_content = get_field('testimonial', $testimonial->ID); 
		$classification = $testimonial_content['classification'];
		$quote = $testimonial_content['quote'];
		$avatar = get_the_post_thumbnail($testimonial->ID, 'post-thumbnail');
		?>
		<div class="testimonial-wrapper">
			<article class="testimonial">
				<header class="testimonial__header">
					<h2 class="testimonial__title"><?php 
					echo $testimonial->post_title;  
					if (false == empty($classification)) echo " | $classification";
					?></h2>
					<?php if (false == empty($avatar)) : ?>
					<div class="testimonial__avatar">
						<?php echo get_the_post_thumbnail($testimonial->ID, 'post-thumbnail'); ?>
					</div>
					<?php endif; ?>
				</header>
				<div class="testimonial__quote">
					<?php echo $quote; ?>
				</div> 
			</article>
		</div>
	<?php endforeach; ?>
	</div>
</div>