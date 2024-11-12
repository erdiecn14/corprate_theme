<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$hero = new FieldsBuilder('component_hero', ['title' => 'Hero']);
$hero
	->addFields($base_component_fields)
  // ->addFields($component_height)
  ->addFields($media_options)
  ->addWysiwyg('overlay_text', [
		'wrapper' => [
			'width' => '50',
		],
	])
  ->addText('vertical_text') 		
  ->addFields($cta);