<?php
/**
 * Template part for displaying the table of contents on a page
 */
$section_list = $args['sections'];
?>

<nav id="toc" class="table-of-contents">
  <header>Contents</header>
  <ul class="content-list">
  <?php 
    foreach($section_list as $section) : 
      $heading = $section['section_header']['heading']; 
      if (false == empty($heading)) :  
        $heading_link = '#' . str_replace(' ', '-', strtolower($heading)); 
  ?>
      <li class="toc-item">
        <a href="<?php echo $heading_link; ?>"><?php echo $heading; ?></a> 
      </li> 
  <?php
      endif;
    endforeach; 
  ?>
  </ul>
</nav>