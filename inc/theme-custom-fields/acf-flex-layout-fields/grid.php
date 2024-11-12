<?php
/**
 * Fields for a Grid Layout in a section
 * uses grid layout primitive
 * see template-parts/layout-templates/page-layout_grid.php for template file
 * see _grid.scss for CSS
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$grid = new FieldsBuilder('layout_grid', ['title' => 'Grid Layout']);
$grid
  ->addFields($background_color_buttons)
  ->addText('item_min_width', [
    'label' => 'Grid Item Min Width',
    'instructions' => 'enter a CSS size for the minimum width of items before the grid adds more rows',
    'wrapper' => [
      'width' => '20'
    ]
  ])
  ->addRange('gap', [
    'label' => 'Gap',
    'instructions' => 'choose a gap size from 0 to 14',
    'wrapper' => [
      'width' => '30'
    ],
    'default_value' => 7,
    'min' => 0,
    'max' => 15,
    'step' => 1, 
  ])
  ->addText('heading', [
    'label' => '<span style="font-size: 1.25rem;">Grid Heading</span>',
    'instructions' => '<strong>Optional:</strong> add an heading to span full width above the grid.'
  ])
  ->addFields($page_component_collection); // components flex content