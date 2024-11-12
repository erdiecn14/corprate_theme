<?php
/**
 * Displays the Link List
 * see _link-list.scss for css
 * see inc/theme-custom-fields/acf-flex-component-fields/super-list.php for fields
 */

$item_collection = $args['items'];
?>

<ul class="link-list">

<?php 
foreach($item_collection as $item) : 

  if (false == empty($item['link_item']) || false == empty($item['file_item'])) :

    $link = $item['link_item'];
    $file = $item['file_item'];
    $link_text = '';
    $url = '';
    $target = '_self';
    if ($item['link_type'] == 'page') {    
      $url = $link['url'];
      $link_text = $link['title'];
      $target = $link['target'] ? $link['target'] : '_self';
    } elseif ($item['link_type'] == 'file') {
      $url = $file['url'];
      $link_text = $file['title'];
      $target = '_blank';
    }
    $rel = '';
    if ($target == '_blank') {
      $rel = 'rel="noopener" title="external link opens in a new tab"';
    }
?>

    <?php if (false == empty($url)) : ?>
      <li>
        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" <?php if ($rel) echo $rel; ?>><?php echo $link_text; ?>
          <?php echo get_template_part('template-parts/svg/arrow-right.svg'); ?>
        </a>
      </li> 
    <?php endif; ?>

  <?php endif; // end check to see if link_item doesn't exist ?>

<?php endforeach; ?>

</ul>