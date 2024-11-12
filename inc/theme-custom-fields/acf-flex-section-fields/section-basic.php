<?php
/**
 * Fields for a basic Section on a page
 * see template-parts/section-templates/page-section_basic.php for template file
 */

use StoutLogic\AcfBuilder\FieldsBuilder;
 
$section_basic = new FieldsBuilder('section_basic', ['title' => 'Page Section']);
$section_basic
  // ->addFields($anchor_id)  
  ->addFields($background_color_buttons)
	->addFields($anchor_id)
	->addFields($utility_classes)
	->addRange('block_padding', [
		'label' => 'Vertical Padding',
		'wrapper' => [
			'width' => '50'
		],
		'min' => 0,
		'max' => 7,
		'step' => 1,
		'append' => 'steps',
		'prepend' => 'space',
		'default_value' => 2,
	])
  ->addButtonGroup('section_type', [
    'label' => 'Section Type',
    'default_value' => 'basic',
    'return_format' => 'value',
    'choices' => array(
      'basic' => 'Standard',
      'full-width' => 'Full Width Internal',
	  'image' => 'Background Image',
		),
		'wrapper' => [
			'width' => '30',
		],
  ])
	->addImage('background_image', [
		'label' => 'Background Image',
		'return_format' => "id",	
		'max_size' => '400KB',
		'max_width' => '1920',
	])
		->conditional('section_type', '==', 'image')
	->addTrueFalse('overlap_next', [
		'label' => 'Overlap Next Section',
		'wrapper' => [
			'width' => '50',
		],
		'ui' => 1,
		'ui_on_text' => 'overlapped',
		'ui_off_text' => 'normal',
		'default_value' => 0,
	])
	->addRange('overlap_amount', [
		'label' => 'Overlap Amount',
		'wrapper' => [
			'width' => '50'
		],
		'min' => 0,
		'max' => 5,
		'step' => 1,
		'append' => 'steps',
		'prepend' => 'space',
		'default_value' => 0,
	])
		->conditional('overlap_next','==','1')
  ->addText('heading', [
    'label' => '<span style="font-size: 1.25rem;">Section Heading</span>',
    'instructions' => '<strong>Optional:</strong> add a heading to span the full width of the section.',
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
  ->addFields($page_layout_collection);
