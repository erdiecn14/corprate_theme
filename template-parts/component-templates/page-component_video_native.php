<?php
/**
 * Displays the Native Video component
 */

$poster = get_sub_field('poster');
$fallback_image_id = get_sub_field('fallback_image');
$mp4 = get_sub_field('mp4');
$webm = get_sub_field('webm');
$video_meta = wp_get_attachment_metadata($mp4);
$mobile_video_files = get_sub_field('mobile_video');
$mp4vid_small = $mobile_video_files['mp4'];
$webmvid_small = $mobile_video_files['webm'];
$layout = get_sub_field('layout');
$play_type = get_sub_field('play_type');

// remapping all this to get it to work with media-video.php
$media_options = array(
	'video' => array(
		'mp4' => $mp4,
		'webm' => $webm,
		'mobile_video' => $mobile_video_files,
		'layout' => $layout,
		'play_type' => $play_type,
		'fallback_image' => $fallback_image_id,
		'poster' => $poster,
	)
);

get_template_part('template-parts/media-types/media', 'video', array(
	'media' => $media_options
));

?>

