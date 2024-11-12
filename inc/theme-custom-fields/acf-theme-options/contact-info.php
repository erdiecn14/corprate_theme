<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$contact_info = new FieldsBuilder('contact_info');
$contact_info
  ->addGroup('contact')
    ->addText('primary_phone')
    ->addEmail('primary_email')
		->addWysiwyg('office_hours')
  ->endGroup();
