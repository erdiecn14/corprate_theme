<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$home_page_layouts = new FieldsBuilder('home_page', ['position' => 'acf_after_title']);
$home_page_layouts
  ->addGroup('home_page')
    ->addGroup('hero')
      ->addFields($anchor_id)
      ->addFields($background_color_buttons)
      ->addText('overlay_text')
      ->addFields($component_height)
      ->addFields($media_options)
    ->endGroup()
    ->addGroup('intro_section')
      ->addFields($anchor_id)
      ->addFields($background_color_buttons)
      ->addWysiwyg('body_copy', [         
        'wrapper' => [
          'width' => '70'
        ]
      ])
      ->addFields($cta)
      ->addImage('pattern', [
        'label' => 'Background Pattern',
        'return_format' => 'id',
        'max_size' => '400KB',
        'max_width' => '1920',
        'wrapper' => [
          'width' => '50'
        ]
      ])
      ->addImage('picture', [
        'label' => 'Image',
        'return_format' => 'id',        
        'max_size' => '400KB',
        'max_width' => '1920',
        'wrapper' => [
          'width' => '50'
        ]
      ])
    ->endGroup()
    ->addGroup('approach_section')
      ->addFields($anchor_id)
      ->addFields($background_color_buttons)
      ->addWysiwyg('body_copy', [         
        'wrapper' => [
          'width' => '70'
        ]
      ])
      ->addFields($cta)
      ->addImage('picture', [
        'label' => 'Image',
        'return_format' => 'id',
        'max_size' => '400KB',
        'max_width' => '1920',
      ])
    ->endGroup()
    ->addGroup('testimonial_section')
      ->addFields($anchor_id)
      ->addFields($background_color_buttons)
      ->addFields($featured_testimonials)
      ->addWysiwyg('body_copy', [
        'wrapper' => [
          'width' => '70'
        ]
      ])
      ->addFields($cta)
    ->endGroup()
  ->endGroup()
  ->setLocation('page_type','==','front_page');

add_action('acf/init', function() use ($home_page_layouts) {
  acf_add_local_field_group($home_page_layouts->build());
});

