<?php
/**
 * Renders the video media
 */
$video = $args['media']['video'];
$mp4vid = $video['mp4'];
$webmvid = $video['webm'];
$mp4vid_small = $video['mobile_video']['mp4'];
$webmvid_small = $video['mobile_video']['webm'];
$layout = $video['layout'];
$play_type = $video['play_type'];
$fallback_image = $video['fallback_image'];
$poster = $video['poster'];
$video_meta = ['width' => '', 'height' => ''];
if (false == empty($mp4vid)) {
    $video_meta = wp_get_attachment_metadata($mp4vid);
}
$small_video_meta = [ 'width' => '', 'height' => ''];
if (false == empty($mp4vid_small)) {
  $small_video_meta = wp_get_attachment_metadata($mp4vid_small);
}
?>

<div class="video-component">
    <?php if ($fallback_image) : ?>
    <div class="fallback-image" role="presentation">
        <?php echo wp_get_attachment_image($fallback_image, 'full'); ?>
    </div>
    <?php endif; ?>

    <?php if ( $play_type == 'autoplay' ) : ?>

    <div class="video-control-button-container" style="display: none;">
        <button class="video-control-button" aria-label="pause">
            <?php get_template_part('template-parts/svg/play.svg'); ?>
            <?php get_template_part('template-parts/svg/pause.svg'); ?>
        </button>
    </div>

    <video 
        class="autoplay-video lazy-video"
        style="height: 0; background-image: url(<?php echo wp_get_attachment_image_url($poster, 'full'); ?>); background-size: cover; background-position: center;"
        width="<?php echo $video_meta['width']; ?>"
        height="<?php echo $video_meta['height']; ?>"
        data-small-width="<?php echo $small_video_meta['width']; ?>"
        data-small-height="<?php echo $small_video_meta['height']; ?>"
        role="presentation"
        autoplay loop muted playsinline 
    >

    <?php else: ?>
        
    <div class="video-control-button-container">
        <button class="video-control-button" aria-label="play">
            <?php get_template_part('template-parts/svg/play.svg'); ?>
            <?php get_template_part('template-parts/svg/pause.svg'); ?>
        </button>
    </div>

    <video 
        class="userplay-video lazy-video"
        style="height: 0; background-image: url(<?php echo wp_get_attachment_image_url($poster, 'full'); ?>); background-size: cover; background-position: center;"
        width="<?php echo $video_meta['width']; ?>"
        height="<?php echo $video_meta['height']; ?>"
        loop playsinline 
        <?php if ($poster) : ?>
        poster="<?php echo wp_get_attachment_image_url($poster, 'full'); ?>"
        <?php endif; ?>
    >

    <?php endif; ?>

        <source 
            type="video/webm"
            data-src="<?php echo wp_get_attachment_url($webmvid); ?>" 
            <?php if (false == empty($webmvid_small)) : ?>
            data-src-small="<?php echo wp_get_attachment_url($webmvid_small); ?>"
            <?php endif; ?>
        >
        <source 
            type="video/mp4"
            data-src="<?php echo wp_get_attachment_url($mp4vid); ?>" 
            <?php if (false == empty($mp4vid_small)) : ?>
            data-src-small="<?php echo wp_get_attachment_url($mp4vid_small); ?>"
            <?php endif; ?>
        >
        Your browser does not support HTML5 video
    </video>
</div> <!-- .video-component -->