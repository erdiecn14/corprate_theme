<?php
/**
 * Renders the CTA Group 
 * keeps CTAs in their own container for more fine tuned layout
 */

$cta_collection = get_sub_field('cta_group');
if ($cta_collection) :
?>

<div class="cta-group columns">

	<?php
	foreach ($cta_collection as $cta) : 
		if (array_key_exists('cta_options', $cta) && false == empty($cta['cta_options'])) :

			$cta_options = $cta['cta_options'];
			$background = $cta_options['bg_color_numbers'];
			$button_class = '';
			if (false == empty($background)) {
				$button_class = str_replace('color_', 'button--', $background);
			} 
			$alignment = $cta_options['alignment'] ?? 'left';
			$cta_type = $cta_options['cta_type'];
			$alignment_class = '';
			if ($alignment == 'center') {
				$alignment_class = 'x-center';
			} elseif ($alignment == 'right') {
				$alignment_class = 'x-end';
			} 
			$link_text = '';
			$url = '';
			$rel = '';
			$target = '_self';

			if ($cta_type == 'custom') {
				$link = $cta_options['custom_cta_link'];
				$link_text = $link['title'];
				$url = esc_url($link['url']);
				$target = $link['target'] ? esc_attr($link['target']) : '_self';
			}
			if ($cta_type == 'file') {
				$link = $cta_options['file_picker'];
				$link_text = $link['title'];
				$url = esc_url($link['url']);
				$target = $link['target'] ? esc_attr($link['target']) : '_self';
			}
			if ($target == '_blank') {
				$rel = 'rel="noopener" title="external link opens in a new tab"';
			}

			if (false == empty($cta_options['button_text'])) {
				$link_text = $cta_options['button_text'];
			}

			?>

			<a 
				class='cta <?php echo $button_class; echo " $alignment_class"; ?>' 
				href='<?php echo $url; ?>' 
				target='<?php echo $target; ?>' 
				<?php echo $rel; ?>
			><?php echo $link_text; ?></a>

		<?php endif; // end check if cta_options empty ?>
	<?php endforeach; // end cta repeater loop ?>
	
</div> <!-- .cta-group -->
	
<?php endif; // end check if cta_collection empty ?>