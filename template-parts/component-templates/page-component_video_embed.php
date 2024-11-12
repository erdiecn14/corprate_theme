<?php
/**
 * Renders the Embedded Video component
 */
$video = get_sub_field('embed_video');
$aspect = get_sub_field('video_aspect_ratio');
?>
<div 
  class="video-embed" 
<?php if (false == empty($aspect)) : ?>
  style="aspect-ratio: <?php echo $aspect; ?>;" 
<?php endif; ?>
>
  <?php echo $video; ?>
</div>