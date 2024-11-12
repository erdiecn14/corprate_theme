<?php
/**
 * Fields for a multi-column Layout in a section
 * uses col-stacker layout primitive
 * see template-parts/layout-templates/page-layout_columns.php for template file
 * see _multi-columns.scss for CSS
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$columns = new FieldsBuilder('layout_columns', ['title' => 'Ajustable Columns']);
$columns
  ->addFields($background_color_buttons)
	->addFields($utility_classes)
	->addText('heading', [
    'label' => '<span style="font-size: 1.25rem;">Column Heading</span>',
    'instructions' => '<strong>Optional:</strong> add a heading that will span the full width above all columns',
		'wrapper' => [
			'width' => '70',
		],
  ])
	->addButtonGroup('heading_alignment', [
    'wrapper' => [
      'width' => '30'
    ],
    'choices' => [
      'left' => 'Left <i class="dashicons dashicons-editor-alignleft"></i>',
      'center' => 'Center <i class="dashicons dashicons-editor-aligncenter"></i>',
      'right' => 'Right <i class="dashicons dashicons-editor-alignright"></i>',
    ]
  ])
	->addText('x_gap', [
		'label' => 'Gutter',
		'wrapper' => [
			'width' => '15%'
		],
	])
	->addText('y_gap', [
		'label' => 'Stacked Gap',
		'wrapper' => [
			'width' => '15%'
		],
	])
  ->addButtonGroup('direction', [
    'label' => 'Column Flow Direction',
    'wrapper' => [
      'width' => '30',
      'class' => 'column-direction-buttons',
    ],
    'choices' => [ 'normal', 'reverse' ],
    'default_value' => 'normal',
    'layout' => 'horizontal',
  ])
  ->addButtonGroup('alignment', [
    'label' => 'Column Alignment',
    'wrapper' => [
      'width' => '30',
      'class' => 'column-alignment-buttons',
    ],
    'choices' => [
			'none' => 'None <i class="dashicons dashicons-editor-expand"></i>',
      'center' => 'Center <i class="dashicons dashicons-align-wide"></i>',
      'top' => 'Top <i class="dashicons dashicons-align-full-width"></i>',
      'bottom' => 'Bottom <i class="dashicons dashicons-arrow-down-alt"></i>',
    ],
    'default_value' => 'center',
    'layout' => 'horizontal',
  ])
	// --- the actual columns ---
  ->addRepeater('columns', [
    'label' => 'Content Columns',
    'instructions' => 'Add additional columns if you want components to display side by side on large devices<br>A single column will be full width.',
    'wrapper' => [
      'class' => 'component-columns',
    ],
    'min' => 1,
    'max' => 3,
    'layout' => 'block',
    'button_label' => 'Add Column',
  ])
		->addFields($background_color_buttons)
		->addFields($anchor_id)
    ->addNumber('proportion', [
      'label' => 'Proportion',
      'step' => '0.1',
      'default_value' => 1,
			'wrapper' => [
				'width' => '15%'
			],
    ])
		->addFields($utility_classes)
		->addFields($block_padding)
		->addRange('inline_padding', [
			'label' => 'Sides Padding',
			'wrapper' => [
				'width' => '50'
			],
			'min' => 0,
			'max' => 3,
			'step' => 1,
			'append' => 'steps',
			'prepend' => 'space',
			'default_value' => 0,
		])
		->addButtonGroup('alignment', [
      'label' => 'Component Alignment',
      'wrapper' => [
        'class' => 'column-alignment-buttons',
        'width' => '50'
      ],
      'choices' => [
        'left' => 'Left <i class="dashicons dashicons-align-left"></i>',
        'center' => 'Center <i class="dashicons dashicons-align-center"></i>',
        'right' => 'Right <i class="dashicons dashicons-align-right"></i>',
      ],
      'default_value' => 'left',
      'layout' => 'horizontal',
    ])
		->addButtonGroup('stacked_alignment', [
      'label' => 'Stacked Alignment',
      'wrapper' => [
        'class' => 'column-alignment-buttons',
        'width' => '50'
      ],
      'choices' => [
        'left' => 'Left <i class="dashicons dashicons-align-left"></i>',
        'center' => 'Center <i class="dashicons dashicons-align-center"></i>',
        'right' => 'Right <i class="dashicons dashicons-align-right"></i>',
      ],
      'default_value' => 'left',
      'layout' => 'horizontal',
    ])
    ->addTrueFalse('hide_on_mobile')
    ->addFields($page_component_collection) // components flex content
  ->endRepeater();