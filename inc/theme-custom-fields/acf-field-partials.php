<?php

use StoutLogic\AcfBuilder\FieldsBuilder;


// Partial for Anchor IDs
$anchor_id = new FieldsBuilder('anchor_id'); // the string passed to FieldsBuilder() is used to namespace the fields
$anchor_id
  ->addText('anchor_id', [  // the string passed to 1st param of addText() is the field name used to access field content in a template
    'label' => 'Anchor Link ID',
		'wrapper'=>[
			'width'=>'20',
		]
  ]);

// Parital for Background Color
// $background_color = new FieldsBuilder('background_color');
// $background_color
// 	->addColorPicker('background_color', [
// 		'label' => 'Background Color',
//     'wrapper' => [
//       'width' => '20'
//     ]
// 	]);
  
define('THEME_COLOR_KEYS', array(
  'color_1' => 'primary',
  'color_2' => 'secondary',
  'color_3' => 'alt 1',
  'color_4' => 'alt 2',
  'color_5' => 'alt 3',
  'color_w' => 'alt 4',
  'color_8' => 'alt 8',
  // 'color_w' => 'white',
));
  
$background_color_buttons = new FieldsBuilder('bg_color_buttons');
$background_color_buttons
  ->addButtonGroup('bg_color_numbers', [
    'label' => 'Background Color',
    'wrapper' => [ 
      'class' => 'admin-bg-color-num-buttons', 
      'width' => '50' 
    ],
    // 'default_value' => 'color_4',
    'allow_null' => 1,
    'return_format' => 'value',
    'choices' => THEME_COLOR_KEYS,
  ]);
  
$component_height = new FieldsBuilder('component_height');
$component_height
  ->addRadio('height_options',[
    'label' => 'Height Options',
    'choices' => [
      'auto' => 'Auto',
      'fill' => 'Fill Screen',
      'aspect_ratio' => 'Set Aspect Ratio',
      'min' => 'Set Minimum',
      'max' => 'Set Maximum',
    ],
    'return_format' => 'value',
    'layout' => 'horizontal',
    'default_value' => 'auto'
  ]);

$block_padding = new FieldsBuilder('block_padding_builder');
$block_padding
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
		'default_value' => 0,
	]);

$display_buffer = new FieldsBuilder('display_buffer_builder');
$display_buffer
	->addTrueFalse('display_buffer', [
		'label' => '',
		'ui' => 1,
		'default_value' => 0,
		'ui_on_text' => 'padded',
		'ui_off_text' => 'flush',
	]);

// Partial for Background Position for Images
$bg_image_position = new FieldsBuilder('bg_position');
$bg_image_position
	->addGroup('background_position', [
		'instructions' => 'Add percentages (ex. 15%) to adjust which part of the image displays.',
	])
		->addText('horizontal', [
      'wrapper' => [
        'width' => '20'
      ]
    ])
		->addText('vertical', [
      'wrapper' => [
        'width' => '20'
      ]
    ])
	->endGroup();

// Partial for CTAs
$cta = new FieldsBuilder('cta');
$cta
	->addGroup('cta', [
		'label' => 'Call to Action',
    'wrapper' => [
      'width' => '30',
    ]
	])
		->addLink('link_data', [
			'label' => 'CTA Link',
			'return_format' => 'array',
		])
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		]);			

// Partial for URLs
$external_url = new FieldsBuilder('external_url');
$external_url
	->addGroup('external_url',[
		'label' => 'External Link',
	])
		->addUrl('url')
		->addText('accessibility_text', [
			'label' => 'Optional for accessibility text',
		]);		

// Partial for Page Link
$page_link = new FieldsBuilder('page_link');
$page_link
	->addGroup('page_link')
		->addPageLink('link')
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		]);				

$utility_classes = new FieldsBuilder('utility_class_list_builder');
$utility_classes
	->addText('utility_classes', [
		'label' => 'CSS Utility Classes',
		'wrapper' => [
			'width' => '30',
		],
	]);
	
	
$block_alignment = new FieldsBuilder('block_alignment_builder');
$block_alignment
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
	]);
		
$base_component_fields = new FieldsBuilder('base_component_fields_builder');
$base_component_fields
	->addFields($background_color_buttons)
	->addFields($utility_classes)
	->addFields($display_buffer);
		
// Partial for Hero Section Content
$hero_content = new FieldsBuilder('hero_content');
$hero_content
	->addGroup('hero_content')
		->addImage('bg_image', [
			'label' => 'Background Image',
			'return_format' => "id",
      'max_size' => '400KB',
      'max_width' => '1920', 
		])
		->addFields($bg_image_position)
		->addText('text_overlay')
	->endGroup();

  
  // Partial for Hero Media Options
$media_options = new FieldsBuilder('media_options');
$media_options
	->addGroup('media_options', [
		'wrapper' => [
			'width' => '50'
		]
	])
		->addRadio('media_type')
			->addChoices('image', 'embed', 'video')
    ->addGroup('background_image')
      ->conditional('media_type', '==', 'image')
      ->addImage('image_id', [
        'label' => 'Background Image',
        'return_format' => "id",
        'max_size' => '400KB', 
        'max_width' => '1920',
      ])
      ->addFields($bg_image_position)
    ->endGroup()
    ->addOembed('embed_video')
      ->conditional('media_type', '==', 'embed')
    ->addGroup('video')
      ->conditional('media_type', '==', 'video')
      ->addRadio('layout',[
        'label' => 'Video Layout',
        'instructions' => 'Choose whether it is an autoplay background video or a normal video player with a play button',
        'choices' => ['background' => 'Background Video', 'inline' => 'Video Player'],
        'return_format' => 'value' 
      ])
			->addRadio('play_type',[
				'label' => 'Play Type',
				'instructions' => 'note: autoplay cannot have audio.',
				'choices' => ['autoplay' => 'Autoplay', 'manual' => 'User Must Click'],
				'return_format' => 'value' 
			])
      ->addImage('fallback_image', [
        'label' => 'Fallback Image',
        'instructions' => 'Choose an image to display if the video cannot load',
        'return_format' => 'id',
        'max_size' => '400KB',
        'max_width' => '1920',
      ])
      ->addImage('poster', [
        'label' => 'Loading Image',
        'instructions' => 'Choose an image to display while the video is loading.<br/>This can be a screenshot of the first video frame.',
        'return_format' => 'id',
        'max_size' => '400KB',
        'max_width' => '1920',
      ])
      ->addFile('mp4',[
        'return_format' => 'id',
        'mime_types' => '.mp4',
      ])
      ->addFile('webm',[
        'return_format' => 'id',
        'mime_types' => '.webm',
      ])
      ->addGroup('mobile_video')
        ->addFile('mp4', [
          'return_format' => 'id',
          'mime_types' => '.mp4'
        ])
        ->addFile('webm', [
          'return_format' => 'id',
          'mime_types' => '.webm'
        ])
      ->endGroup()
    ->endGroup()
	->endGroup();

// Partial for Card Grid
$card_grid = new FieldsBuilder('card_grid');
$card_grid
	->addGroup('card_grid')
		->addRepeater('card')
			->addImage('icon', [
				'return_format' => 'id',
        'max_size' => '400KB',
        'max_width' => '1920',
				'wrapper' => [ 'width' => '30', ]
			])
			->addWysiwyg('wysiwyg', [
				'label' => 'Body Content',
			])
			->addFields($cta)
		->endRepeater()
	->endGroup();
  
$address = new FieldsBuilder('address');
$address
  ->addText('address_1')
  ->addText('address_2')
  ->addText('city', [
      'label' => 'City',
      'wrapper' => [
        'width' => '40',
      ],
    ])
  ->addText('state', [
      'label' => 'State',
      'wrapper' => [
        'width' => '20'
      ]
    ])
  ->addText('zip', [
    'label' => 'Zip',
    'wrapper' => [
      'width' => '40'
    ]
  ]);

$social_link = new FieldsBuilder('social_icon');
$social_link
  ->addUrl('profile_link', ['wrapper' => ['width'=>'75']])
  ->addImage('icon', [
    'label' => 'Icon',
    'instructions' => '<strong>Optional:</strong> choose an icon to represent the social media account',
    'return_format' => 'id',
    'max_size' => '200KB',
    'max_width' => '980',
    'wrapper' => ['width' => '25']
  ]);
  
$featured_testimonials = new FieldsBuilder('featured_testimonial_picker');
$featured_testimonials
  ->addGroup('featured_testimonial_options', [
    'label' => 'Featured Testimonials'
  ])
    ->addPostObject('testimonial_collection', [
      'label' => 'Testimonials',
      'instructions' => 'Pick testimonials to feature in the section',
      'required' => 0,
      'post_type' => ['testimonial'],
      'multiple' => 1,
      'return_format' => 'object',
      'ui' => 1,
    ])
  ->endGroup();