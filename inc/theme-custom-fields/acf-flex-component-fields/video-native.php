<?php
/**
 * Fields for the Native Video component
 * see template-parts/component-templates/page-component_video_native.php for template file
 * see _video.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$native_video = new FieldsBuilder('component_video_native',['title' => 'Native Video']);
$native_video
	->addRadio('play_type',[
		'label' => 'Play Type',
		'instructions' => 'note: autoplay cannot have audio.',
		'choices' => ['autoplay' => 'Autoplay', 'manual' => 'User Must Click'],
		'return_format' => 'value' 
	])
	->addImage('fallback_image', [
		'label' => 'Fallback Image',
		'instructions' => 'Choose an image to display if the video cannot load',
		'return_format' => 'id',
		'max_size' => '400KB',
		'max_width' => '1920',
	])
  ->addImage('poster', [
    'label' => 'Loading Image',
    'instructions' => 'Choose an image to display while the video is loading.<br/>This can be a screenshot of the first video frame.',
    'return_format' => 'id',
    'max_size' => '400KB',
    'max_width' => '1920',
  ])
  ->addFile('mp4',[
    'return_format' => 'id',
    'mime_types' => '.mp4',
  ])
  ->addFile('webm',[
    'return_format' => 'id',
    'mime_types' => '.webm',
  ])
	->addGroup('mobile_video')
		->addFile('mp4', [
			'return_format' => 'id',
			'mime_types' => '.mp4'
		])
		->addFile('webm', [
			'return_format' => 'id',
			'mime_types' => '.webm'
		])
	->endGroup();
  