<?php
/**
 * Fields for the custom Google Map component (relies on shortcode)
 * see template-parts/component-templates/page-component_google_map.php for template file
 * see _google-maps.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$google_map = new FieldsBuilder('component_google_map',['title' => 'Custom Google Map']);
$google_map
  ->addText('google_map', [
    'label' => 'Enter a Google Map Shortcode',
  ]); 
  