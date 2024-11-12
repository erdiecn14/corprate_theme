<?php
/**
 * Fields for a Copy-Frame Layout in a section
 * -- Note this is similar to the Copy-Frame Section but has 2 differences
 * ---- it is nested within a Section, good use case is text you want to stand out among other text in the same Section
 * ---- since it's a Layout, it can't have nested Layouts, only Components. 
 * -------- The Copy-Frame Section can have multiple layouts within the framed container 
 * see template-parts/layout-templates/page-layout_copy_frame.php for template file
 * see _copy-frame.scss for CSS
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$copy_frame = new FieldsBuilder('layout_copy_frame', ['title' => 'Framed Content']);
$copy_frame
  ->addFields($background_color_buttons)
  ->addFields($page_component_collection); // components flex content