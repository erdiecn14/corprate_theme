<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$banner = new FieldsBuilder('banner_options');
$banner
  ->addGroup('banner_options')
    ->addRadio('banner_locations', [
      'label' => 'Where Should the Banner Display?',
      'choices' => [
        'home' => 'Home Page Only',
        'pages' => 'Every Page',
        'total' => 'Every Page and Post',
        'select_pages' => 'Select Pages',
      ],
      'return_format' => 'value',
      'layout' => 'horizontal',
      'default_value' => 'home'
    ])
    ->addWysiwyg('message')
    ->addPostObject('banner_post_list', [
      'label' => 'Pages to Show Banner',
      'instructions' => 'Choose pages where the banner should display',
      'post_type' => 'page',
      'multiple' => 1,
      'return_format' => 'id',
      'ui' => 1,
    ])
      ->conditional('banner_locations', '==', 'select_pages')
  ->endGroup();

