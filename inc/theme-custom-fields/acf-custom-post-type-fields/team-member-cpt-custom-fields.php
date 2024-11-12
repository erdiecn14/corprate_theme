<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$team_member_fields = new FieldsBuilder('team_member_cpt', [
  'title' => 'Team Member Details',
  'position' => 'acf_after_title'
]);
$team_member_fields
  ->addGroup('team_member_details', ['label' => ''])
    ->addImage('headshot', [
      'label' => 'Headshot',
      'instructions' => '<strong>Optional:</strong> Image will be converted to a circle with blue border.<br> Crop so that top of head is near top of image as needed.',
      'return_format' => 'id',
      'max_width' => '980',
      'max_size' => '250KB',
    ])
    ->addText('first_name', [
      'label' => 'First Name',
      'wrapper' => [
        'width' => '50'
      ],
      'required' => 1,
    ])
    ->addText('last_name', [
      'label' => 'Last Name',
      'wrapper' => [
        'width' => '50'
      ],
      'required' => 1,
    ])
    ->addText('position', [
      'label' => 'Position',
      'instructions' => 'Enter their job title.',
    ])
    ->addWysiwyg('team_member_bio')
  ->endGroup()
  ->setLocation('post_type','==','team_member');
  
add_action('acf/init', function() use ($team_member_fields) {
  acf_add_local_field_group($team_member_fields->build());
});