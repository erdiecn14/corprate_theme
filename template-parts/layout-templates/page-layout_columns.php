<?php
/**
 * Displays the Multi-Column Layout
 * see inc/theme-custom-fields/acf-flex-layout-fields/columns.php for fields setup
 */

$columns_heading = get_sub_field('heading');
$background = get_sub_field('bg_color_numbers');
$util_classes = get_sub_field('utility_classes');
$x_gap = get_sub_field('x_gap');
$y_gap = get_sub_field('y_gap');
$direction = get_sub_field('direction') ?? 'normal';
$alignment = get_sub_field('alignment') ?? 'center';
$alignment_class = '';
$inline_styles = '';
if (($x_gap) !== '') {
	$inline_styles .= " --col-gutter: $x_gap;";
}
if ($y_gap !== '') {
	$inline_styles .= " --stacked-gap: $y_gap;";
}
if ($alignment == 'top') {
  $alignment_class = 'align-start ';
} elseif ($alignment == 'bottom') {
  $alignment_class = 'align-end ';
} elseif ($alignment == 'none') {
  $alignment_class = 'align-none ';
}
?>

<?php if (have_rows('columns')) : ?>

  <div 
		class="multi-column <?php echo $alignment_class; ?><?php echo $direction; ?> <?php maybe_bg_class($background); ?> <?php echo $util_classes; ?>"
		<?php if (false == empty($inline_styles)) : ?>
		style="<?php echo $inline_styles; ?>"
		<?php endif; ?>
	>
    
    <?php maybe_heading($columns_heading, 'h3'); ?>

  <?php 
	/* --- The Actual Columns --- */
	while (have_rows('columns')) : 
		the_row();  // loop through column repeater 
		$anchor = get_sub_field('anchor_id');
		$util_classes = get_sub_field('utility_classes');
		$comp_alignment = get_sub_field('alignment');
		$col_background = get_sub_field('bg_color_numbers');
		$inline_padding = get_sub_field('inline_padding');
		$block_padding = get_sub_field('block_padding');
		$comp_stack_alignment = get_sub_field('stacked_alignment');
		$hide_on_mobile = get_sub_field('hide_on_mobile');
		$package_classes = '';
		if (false == empty($inline_padding)) {
			switch ($inline_padding) {
				case 1: $package_classes .= ' pi-sm';
				break;
				case 2: $package_classes .= ' pi-med';
				break;
				case 3: $package_classes .= ' pi-lg';
				break;
			}	
		}
		if (false == empty($comp_alignment)) {
			switch ($comp_alignment) {
				case 'left': $package_classes .= ' mie-auto';
				break;
				case 'center': $package_classes .= ' mi-auto fit';
				break;
				case 'right': $package_classes .= ' mis-auto fit';
				break;
			}	
		}
		if (false == empty($comp_stack_alignment)) {
			switch ($comp_stack_alignment) {
				case 'left': $package_classes .= ' stacked-left';
				break;
				case 'center': $package_classes .= ' stacked-center fit';
				break;
				case 'right': $package_classes .= ' stacked-right fit';
				break;
			}	
		}
		if (false == empty($block_padding)) {
			$padding_class = "py-$block_padding";	
			$util_classes .= " $padding_class";
		}

		if ($hide_on_mobile){
			$hide_on_mobile = "hide-on-mobile";
		}
	?>
		<div <?php maybe_anchor($anchor); ?> class="column stack <?php maybe_bg_class($col_background); ?> <?php echo $hide_on_mobile ?>" style="--col-ratio: <?php echo get_sub_field('proportion'); ?>;">
			<div class="package stack <?php echo $package_classes; ?> <?php echo $util_classes; ?>">
					<?php 
						if (have_rows('component_collection')) : 
							while (have_rows('component_collection')) : the_row(); // loop through component flex content
								get_template_part('template-parts/component-templates/page', get_row_layout());
							endwhile; 
						endif;
					?> 
			</div>
		</div>

  <?php endwhile; ?>

</div> <!-- .multi-column -->

<?php endif; ?>