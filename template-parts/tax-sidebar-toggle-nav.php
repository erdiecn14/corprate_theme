<?php
/**
 * Renders the sidebar nav with lists that can toggle open/close
 */
 
$heading_sr_text = $args['heading_sr_text'];
$heading_text = $args['heading_text']; 
$description = $args['description'];
$tax_name = $args['tax_name'];
?>

<nav class="taxonomy-links tax-toggle-nav">
  <header class="tax-nav-header">
    <h2 class="tax-heading-text">
      <button class="tax-heading-button-text tax-toggle" aria-expanded="false">
        <span class="sr-only"><?php echo $heading_sr_text; ?></span><?php echo $heading_text; ?>
        <svg class="expand-icon--plus-minus" viewBox="0 0 10 10" aria-hidden="true" focusable="false">
          <rect class="vert" height="8" width="2" y="1" x="4" />
          <rect height="2" width="8" y="4" x="1" />
        </svg>
      </button>
    </h2>
  </header>
  
  <!-- <p class="tax-description" hidden><?php echo $description; ?></p> -->
  <ul class="tax-list stack" hidden>
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