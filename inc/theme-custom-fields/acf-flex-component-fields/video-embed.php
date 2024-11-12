<?php
/**
 * Fields for the Embed Video component
 * see template-parts/component-templates/page-component_video_embed.php for template file
 * see _video.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$video_embed = new FieldsBuilder('component_video_embed', ['title' => 'Embedded Video']);
$video_embed
  ->addText('video_aspect_ratio', [
    'label' => 'Video Aspect Ratio',
    'instructions' => '<strong>Optional:</strong> Add and aspect ratio to override the video size',
  ])
  ->addOembed('embed_video', [
    'label' => 'Embedded Video'
  ]);
  