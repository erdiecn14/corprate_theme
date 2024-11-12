<?php
/**
 * Displays a basic page section
 * see inc/acf-flex-section-fields/section-basic.php for fields setup
 */

$section_type = get_sub_field('section_type');
if (empty($section_type)) {
  $section_type = 'basic';
}
$section_heading = get_sub_field('heading');
$heading_alignment = get_sub_field('heading_alignment');
$anchor = get_sub_field('anchor_id');
$background = get_sub_field('bg_color_numbers');
$background_image_id = get_sub_field('background_image');
$block_padding = get_sub_field('block_padding');
$overlapper = get_sub_field('overlap_next');
$overlap_amount = get_sub_field('overlap_amount');
$util_classes = get_sub_field('utility_classes');
global $lyst_section_y_overlap;
if ($section_type == 'basic') {
	// add class to restrain content inside the section
	$util_classes .= " hugger";
}
if ($section_type == 'image') {
	$util_classes .= ' has-bg-image hugger';
}
if ($overlapper) {
	$util_classes .= " pull-up-next";
	switch ($overlap_amount) {
		case 1: $lyst_section_y_overlap = 'var(--space-2xs)';
		break;
		case 2: $lyst_section_y_overlap = 'var(--space-xs)';
		break;
		case 3: $lyst_section_y_overlap = 'var(--space-s)';
		break;
		case 4: $lyst_section_y_overlap = 'var(--space-m)';
		break;
		case 5: $lyst_section_y_overlap = 'var(--space-l)';
		break;
	}
}

if (false == empty($block_padding)) {
	$padding_class = "py-$block_padding";	
	$util_classes .= " $padding_class";
}

if ( have_rows('layout_collection') ) : ?>

	<section 
		<?php maybe_anchor($anchor); ?> 
		class="page-section stack <?php echo $util_classes; ?> <?php maybe_bg_class($background); ?>" 
		style="--section-y-overlap: <?php echo $lyst_section_y_overlap; ?>;"
	>

		<?php maybe_heading($section_heading, 'h2', $heading_alignment); ?>

		<?php if ($section_type == 'image' && false == empty($background_image_id)) :  ?>
			<div class="section-bg-image">
				<?php echo wp_get_attachment_image($background_image_id, 'full'); ?>
			</div>
		<?php endif; ?>

		<?php
			while ( have_rows('layout_collection') ) : the_row();
				get_template_part( 'template-parts/layout-templates/page', get_row_layout() );
			endwhile;
		?>

	</section>
<?php endif; // end if have rows ?>
