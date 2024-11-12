<?php
/**
 * Template part for displaying the bread crumbs demo
 */
?>

<nav class="breadcrumbs">
  <ul class="breadcrumbs-page-list">
    <li>
      <a href="#">Parent Parent Page</a>
    </li>
    <li>
      <a href="#">Parent Page</a>
    </li>
    <li>
      <?php echo get_the_title(); ?> 
    </li>
  </ul>
</nav>