<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$social_media_info = new FieldsBuilder('social_media_info');
$social_media_info
  ->addGroup('social_media')
    ->addGroup('facebook')
      ->addFields($social_link)
    ->endGroup() 
    ->addGroup('twitter')
      ->addFields($social_link)
    ->endGroup() 
    ->addGroup('instagram')
      ->addFields($social_link)
    ->endGroup()
    ->addGroup('snapchat')
      ->addFields($social_link)
    ->endGroup()
    ->addGroup('youtube')
      ->addFields($social_link)
    ->endGroup()
    ->addGroup('tik_tok')
      ->addFields($social_link)
    ->endGroup()
  ->endGroup();