<?php
/**
 * Displays the Accordion List
 * see _faq-columns.scss for css
 * see inc/theme-custom-fields/acf-flex-component-fields/super-list.php for fields
 */

$expandable_collection = $args['items'];
?>

<div class="faq-column">

<?php 
foreach($expandable_collection as $expandable) { 
  if (false == empty($expandable['heading']) && false == empty($expandable['body'])) {
    echo "<h3>" . $expandable['heading'];
    get_template_part('template-parts/svg/expand-icon-plus.svg'); 
    echo "</h3>"; 
    echo $expandable['body']; 
  }
}
?>

</div>