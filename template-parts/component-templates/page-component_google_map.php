<?php
/**
 * Renders the Google Map component via shortcode
 */

$map_shortcode = get_sub_field('google_map');
echo "<div class='map-wrapper'>";
echo do_shortcode($map_shortcode);
echo "</div>";