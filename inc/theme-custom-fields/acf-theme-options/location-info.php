<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$location_info = new FieldsBuilder('location');
$location_info
  ->addGroup('location')
    ->addGroup('primary_address')
      ->addFields($address) 
    ->endGroup()
    ->addUrl('map_link')
  ->endGroup();
