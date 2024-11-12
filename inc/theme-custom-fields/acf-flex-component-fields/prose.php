<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$prose = new FieldsBuilder('component_prose',['title' => 'Copy Block']);
$prose
  ->addFields($base_component_fields)
  ->addButtonGroup('block_alignment', [
    'wrapper' => [
      'width' => '50'
    ],
    'choices' => [
      'left' => 'Left <i class="dashicons dashicons-align-left"></i>',
      'center' => 'Center <i class="dashicons dashicons-align-center"></i>',
      'right' => 'Right <i class="dashicons dashicons-align-right"></i>',
    ],
    'default_value' => 'left'
  ])
  ->addGroup('prose_options', ['label' => ''])
    ->addWysiwyg('body', [
      'label' => 'Body Content',
      'toolbar' => 'full',
    ])
  ->endGroup();