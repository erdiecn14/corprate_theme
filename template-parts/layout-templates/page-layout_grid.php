<?php
/**
 * Displays the Grid Layout
 * see inc/theme-custom-fields/acf-flex-layout-fields/grid.php for fields setup
 */

$background = get_sub_field('bg_color_numbers');
$grid_heading = get_sub_field('heading');
$gap = get_sub_field('gap');
$item_min_width = get_sub_field('item_min_width');
$gap_prop = get_size_prop($gap);
$grid_gutter_css = "--grid-gutter: var($gap_prop);";
?>

<div class="grid-layout <?php maybe_bg_class($background); ?>" style="<?php echo $grid_gutter_css; ?>">

  <?php maybe_heading($grid_heading, 'h3'); ?> 

  <div class="grid-auto">

      <?php 
        if (have_rows('component_collection')) : 
          while (have_rows('component_collection')) : the_row(); // loop through component flex content
            get_template_part('template-parts/component-templates/page', get_row_layout());
          endwhile; 
        endif;
      ?> 

  </div>

</div> 
