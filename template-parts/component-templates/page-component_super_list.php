<?php
/**
 * Displays the Super List component
 */
  
$list_type = get_sub_field('list_type');
$list_items = get_sub_field('list_items');

if (false == empty($list_items)) {
  get_template_part('template-parts/component-templates/list', $list_type, ['items' => $list_items]);
}

?>


