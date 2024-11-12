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
?>

<?php if ($fallback_image_id) : ?>
<div class="fallback-image" role="presentation">
  <?php echo wp_get_attachment_image($fallback_image_id, 'full'); ?>
</div>
<?php endif; // end check for fallback image ?>

<?php if (false == empty($mp4) || false == empty($webm)) : ?>

<div class="video-wrapper">

	<?php if ( $layout == 'background' ) : ?>

	<div class="video-control-button-container" style="display: none;">
		<button class="video-control-button" aria-label="pause">
			<?php get_template_part('template-parts/svg/play.svg'); ?>
			<?php get_template_part('template-parts/svg/pause.svg'); ?>
		</button>
	</div>
	
	<?php else : ?>

  <video
    controls
    class="stratford-partners-video"
    loop
    playsinline
    width="<?php echo $video_meta['width']; ?>"
    height="<?php echo $video_meta['height']; ?>"
  <?php if (false == empty($poster)) : ?>
    poster="<?php echo wp_get_attachment_image_url($poster, 'full'); ?>"
  <?php endif; ?>
  >

  <?php if (false == empty($webm)) : ?>
    <source type="video/webm" src="<?php echo wp_get_attachment_url($webm); ?>">
  <?php endif; ?>

  <?php if (false == empty($mp4)) : ?>
    <source type="video/mp4" src="<?php echo wp_get_attachment_url($mp4); ?>">
  <?php endif; ?>

    Your browser does not support HTML5 video 
  </video>

	<?php endif; // end check layout type ?>

</div> <!-- .video-wrapper -->

<?php endif; // end check if has video files ?>