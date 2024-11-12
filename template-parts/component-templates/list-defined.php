<?php
/**
 * Displays the Defined Item List
 * see _defined-item-list.scss for css
 * see inc/theme-custom-fields/acf-flex-component-fields/super-list.php for fields
 */

 $item_collection = $args['items'];
 $color_num = 1;
?>

<ul class="defined-item-list">

<?php foreach($item_collection as $item) : ?>
 
  <?php 
    if (false == empty($item['heading']) && false == empty($item['body'])) : 
  ?>

    <li>
      <figure class="defined-item" data-item-color="<?php echo $color_num; ?>">
        <?php echo "<h3 class='defined-item__heading'>" . $item['heading'] . "</h3>"; ?>      
        <figcaption class="definition">
          <?php echo $item['body']; ?>
        </figcaption>
      </figure>
    </li>

    <?php 
      if ($color_num === 7) {
        $color_num = 1;
      } else {
        $color_num++;
      }
    ?>
    
  <?php endif; ?>
 
<?php endforeach; ?>

</ul>