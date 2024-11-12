<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$footer_content = new FieldsBuilder('footer');
$footer_content
  ->addGroup('footer_content')
    ->addImage('footer_logo', [
      'label' => 'Footer Logo',
      'return_format' => 'id',
      'max_width' => '1920',
      'max_size' => '250KB',
    ])
    ->addWysiwyg('bottom_copy', [
      'label' => 'Bottom Copy',
      'instructions' => '<strong>Optional:</strong> Additional copy to add if needed',
      'toolbar' => 'full',
    ])
    ->addImage('tm_bg_image', [
      'label' => 'Team Member Background Image',
      'return_format' => 'id',
      'max_width' => '1920',
      'max_size' => '250KB',
    ])
  ->endGroup();
