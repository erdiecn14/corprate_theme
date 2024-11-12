<?php
/**
 * Fields for the Framed Image component
 * see template-parts/component-templates/page-component_framed_image.php for template file
 * see _image-frame.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$framed_image = new FieldsBuilder('component_framed_image',['title' => 'Framed Image']);
$framed_image
  ->addButtonGroup('frame_color_numbers', [
    'label' => 'Frame Color',
    'wrapper' => [ 'class' => 'admin-bg-color-num-buttons', 'width' => '100' ],
    'allow_null' => 1,
    'return_format' => 'value',
    'choices' => THEME_COLOR_KEYS,
  ])
  ->addGroup('image_options', [
    'instructions' => 'Additional options for sizing the frame and positioning the image in the frame.'
    ])
    ->addText('image_aspect_ratio', [
      'label' => 'Frame Aspect Ratio Override',
      'wrapper' => [
        'width' => '25'
      ]
    ])
    ->addText('horizontal', [
      'label' => 'Image Horizontal Crop Position',
      'wrapper' => [
        'width' => '25'
      ]
    ])
    ->addText('vertical', [
      'label' => 'Image Vertical Crop Position',
      'wrapper' => [
        'width' => '25'
      ]
    ])
    ->addText('max_width', [
      'label' => 'Max Image Width',
      'wrapper' => [
        'width' => '25'
      ]
    ])
  ->endGroup()
  ->addImage('picture', [
    'label' => 'Choose an Image',
    'return_format' => 'id',
    'max_width' => '1920',
    'max_size' => '400KB', 
  ]); 
  