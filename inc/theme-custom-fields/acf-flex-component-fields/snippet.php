<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$snippet = new FieldsBuilder('component_snippet',['title' => 'Embed Snippet']);
$snippet
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
	->addTextarea('code_snippet', [
		'label' => 'Code Snippet',
		'new_lines' => '',
	]);