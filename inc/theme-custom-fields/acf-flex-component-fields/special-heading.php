<?php
/**
 * Fields for the Special Heading
 * see template-parts/component-templates/page-component_special_heading.php for template file
 * see _special_heading.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$special_heading = new FieldsBuilder('component_special_heading',['title' => 'Special Heading with Arrow']);
$special_heading
    ->addFields($base_component_fields)
    ->addText('heading_text')
    ->addText('optional_text');