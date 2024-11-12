<?php
/**
 * Displays the Copy Frame Layout
 * see inc/theme-custom-fields/acf-flex-layout-fields/copy-frame.php for fields setup
 */

$background = get_sub_field('bg_color_numbers');
?>

<div class="copy-frame-wrapper full-bleed container <?php maybe_bg_class($background); ?>">
  <div class="copy-frame bg-w">
      <?php 
        if (have_rows('component_collection')) : 
          while (have_rows('component_collection')) : the_row(); // loop through component flex content
            get_template_part('template-parts/component-templates/page', get_row_layout());
          endwhile; 
        endif;
      ?> 
  </div>
</div> <!-- .copy-frame-wrapper -->
