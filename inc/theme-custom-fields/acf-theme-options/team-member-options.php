<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$team_member_options = new FieldsBuilder('team_member_options');
$team_member_options
  ->addGroup('team_member_options')
    ->addImage('tm_bg_image', [
      'label' => 'Team Member Background Image',
      'return_format' => 'id',
      'max_width' => '1920',
      'max_size' => '250KB',
    ])
  ->endGroup();