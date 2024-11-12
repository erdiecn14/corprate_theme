<?php
/**
 * Renders the sidebar nav with static lists that are always visible
 */
 
$heading_sr_text = $args['heading_sr_text'];
$heading_text = $args['heading_text']; 
$description = $args['description'];
$tax_name = $args['tax_name'];
?>

<nav class="taxonomy-links stack tax-static-nav">
  <header class="tax-nav-header">
    <h2 class="tax-heading-text">
      <span class="sr-only"><?php echo $heading_sr_text; ?></span><?php echo $heading_text; ?>
    </h2>
  </header>
  <!-- <p class="tax-description"><?php echo $description; ?></p> -->
  <ul class="tax-list stack">
    <?php
    $term_collection = get_terms(array('taxonomy' => $tax_name, 'hide_empty' => false));         
    foreach($term_collection as $term) {
      $term_link = get_term_link($term);
      if (is_wp_error($term_link)) {
        continue;
      } else {
        $term_link = esc_url($term_link);
      }
      echo "<li class='cat-item'><a href='$term_link'>{$term->name}</a></li>";
    }
    ?>
  </ul>
</nav>