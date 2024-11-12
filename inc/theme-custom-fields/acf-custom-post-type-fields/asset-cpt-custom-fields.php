<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$asset_fields = new FieldsBuilder('asset_cpt', [
  'title' => 'Asset Details',
  'position' => 'acf_after_title'
]);
$asset_fields
  ->addGroup('asset_details', ['label' => ''])
  ->addImage('asset_image', [
    'label' => 'Asset Image',
    'return_format' => 'id',
    'max_width' => '980',
    'max_size' => '400KB',
  ])
  ->addWysiwyg('asset_info')
  ->endGroup()
  ->setLocation('post_type', '==', 'asset');

add_action('acf/init', function () use ($asset_fields) {
  acf_add_local_field_group($asset_fields->build());
});
