<?php
/**
 * Displays the Process List
 * see _process-list.scss for css
 * see inc/theme-custom-fields/acf-flex-component-fields/super-list.php for fields
 */

 $step_collection = $args['items'];
?>

<ol class="process-list">

<?php foreach($step_collection as $step) : ?>
 
  <?php if (false == empty($step['heading']) || false == empty($step['body'])) : ?>

    <li>
      <div>
        <?php if (false == empty($step['heading'])) : ?>
          <h3><?php echo $step['heading']; ?></h3>
        <?php endif; ?>
        <?php 
        if (false == empty($step['body'])) : 
          echo $step['body']; 
        endif; 
        ?>
      </div>
    </li>

  <?php endif; ?>
  
<?php endforeach; ?>

</ol>