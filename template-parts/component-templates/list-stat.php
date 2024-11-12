<?php
/**
 * Displays the Stat List
 * see _stat-list.scss for css
 * see inc/theme-custom-fields/acf-flex-component-fields/super-list.php for fields
 */

 $stat_collection = $args['items'];

?>

<ul class="stat-list">

<?php foreach($stat_collection as $stat) :?>
 
 

    <li>
      <figure class="stat-card">
        <?php echo "<header class='stat-datapoint'>" . $stat['heading'] . "</header>"; ?>      
        <figcaption class="stat-details">
          <?php echo $stat['body']; ?>
        </figcaption>
      </figure>
    </li>


  
<?php endforeach; ?>

</ul>