<?php
/**
 * Fields for the Spreadsheet Component
 * see template-parts/component-templates/page-component_spreadsheet.php for template file
 * see _spreadsheet.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$spreadsheet = new FieldsBuilder('component_spreadsheet',['title' => 'Spreadsheet']);
$spreadsheet
    ->addRepeater('spreadsheet_info')
        ->addText('year_acquired')
        ->addText('units')
        ->addText('market')
        ->addText('state')
        ->addText('year_built')
        ->addText('purchase_price')
    ->endRepeater();    
    