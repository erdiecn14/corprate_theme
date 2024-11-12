<?php
/**
 * MISC SHORTCODES
 */

 /**
*   "Buttons" - links that look like buttons
*/

function button_w_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--w' href='$link'>$content</a>";
}
add_shortcode('button-w','button_w_shortcode');

function button_1_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--1' href='$link'>$content</a>";
}
add_shortcode('button1','button_1_shortcode');

function button_2_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--2' href='$link'>$content</a>";
}
add_shortcode('button2','button_2_shortcode');

function button_3_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--3' href='$link'>$content</a>";
}
add_shortcode('button3','button_3_shortcode');

function button_4_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--4' href='$link'>$content</a>";
}
add_shortcode('button4','button_4_shortcode');


/**
 * Small Text and Big Text
 */

function lyst_small_text($atts, $content=null) {
  return "<span class='small-text'>$content</span><br/>";
}
add_shortcode('sm','lyst_small_text');

function lyst_large_text($atts, $content=null) {
  return "<span class='large-text'>$content</span><br/>";
}
add_shortcode('lg','lyst_large_text');

/**
 * Turn a gallery into a slick slider
 */
function acf_gallery_to_slick($atts) {
  ob_start();
  $field = $atts['field'];
  $slider_class = get_field('slick_class'); 
  $images = get_field($field);
  $slider_html = "";
  if ($images) { 
    $slider_html .= "<div class='$slider_class'>";
    foreach ($images as $image) {  
      $slider_html .= "<div class='slider-img'>";
      $slider_html .= wp_get_attachment_image( $image['ID'], 'full' ); 
      wp_get_attachment_image( $image['ID'], 'full' ); 
      $slider_html .= "</div>";
    } 
    $slider_html .= "</div>";
  }
  echo $slider_html;
  return ob_get_clean();
}
add_shortcode( 'slick-acf', 'acf_gallery_to_slick' );

/**
 * Main Phone Number Link
 */
function main_phone_link($atts) {
  $phone = CONTACT['primary_phone']; 
  $clean_phone = clean_phone($phone);
  return "<a style='white-space: nowrap;' href='tel:$phone' aria-label='main phone number'>$phone</a>";
}
add_shortcode('main-phone', 'main_phone_link');


/**
 * [team-contact] shortcode for displaying team member names and contact info link
 * TODO complete functionality
 * page author can use shortcode and provide the position, info desired, and format
 * shortcode returns the contact info (info) requested in the format requested
 * example [team-contact position="Family Services Director" info="phone" format="link"]  
 * example [team-contact position="Family Services Director" info="email,phone" format="link"]  
 * example [team-contact position="Family Services Director" info="name" format="text"]  
 */
function team_member_link($atts) {
  $atts = shortcode_atts(
    array(
      'position' => false,
      'info' => array('email'),
      'format' => 'link',      
    ),
    $atts, 'team-member'
  );
  if (false == $atts['position']) {
    return;
  }
  
}
// add_shortcode('team-member', 'team_member_link');

function testimonials_shortcode($atts) {
  $atts = shortcode_atts(
    array(
      'count' => '-1',      
    ),
    $atts, 'testimonials'
  );
  ob_start();
  $args = array(
    'post_type' => 'testimonial',
    'publish_status' => 'published',
    'posts_per_page' => $atts['count'],
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    echo "<ul class='card-list grid-auto'>";
    while ($query->have_posts()) {
      $query->the_post();
      $testimonial_id = get_the_ID();
      $testimonial_content = get_field('testimonial');
      $classification = $testimonial_content['classification'];
      $quote = $testimonial_content['quote'];
      $cta = $testimonial_content['cta'];
      $name = get_the_title();
      $picture = get_the_post_thumbnail($testimonial_id, 'medium', array('class' => 'card__cover-image attachment-full testimonial-avatar'));
      ?>
      <li class='card'>
        <header class='card__header'>
          <h2 class='card__heading'><?php echo $name; ?></h2>
          <?php if (false == empty($classification)) echo "<div style='margin-top: .75rem;'>$classification</div>"; ?>
        </header>
        <?php echo $picture; ?>
        <?php echo $quote; ?>
        <?php if (false == empty($cta['testimonial_cta_link'])) : 
          $url = $cta['testimonial_cta_link']['url'];
          $target = $cta['testimonial_cta_link']['target'] ? esc_attr($cta['testimonial_cta_link']['target']) : '_self';
          $link_text = $cta['testimonial_cta_link']['title'];
          $rel_attr = '';
          if ($target == '_blank') {
            $rel_attr = 'rel="noopener" title="external link opens in a new tab"';
          }
        ?>
          <a 
            class='cta button--1 x-start' 
            href='<?php echo $url; ?>'
            target='<?php echo $target; ?>'
            <?php echo $rel_attr; ?>
          >
            <?php echo $link_text; ?>
          </a>
        <?php endif; ?>
      </li> 
      <?php
    }
    echo "</ul>";
    wp_reset_postdata();
  }
  return ob_get_clean();
}
add_shortcode('testimonials', 'testimonials_shortcode');

function social_links_shortcode($atts) {
  ob_start();
  get_template_part('template-parts/social-links');
  return ob_get_clean();
}
add_shortcode('social-links', 'social_links_shortcode');

function render_address_shortcode($atts) {
	ob_start();
	render_address();
	return ob_get_clean();
}
add_shortcode('address', 'render_address_shortcode');

function render_primary_email_shortcode($atts) {
	ob_start();
	email_link(CONTACT['primary_email'], CONTACT['primary_email']);
	return ob_get_clean();
}
add_shortcode('primary-email', 'render_primary_email_shortcode');

function render_primary_phone_shortcode($atts) {
	ob_start();
	phone_link(CONTACT['primary_phone']);
	return ob_get_clean();
}
add_shortcode('primary-phone', 'render_primary_phone_shortcode');

function render_office_hours_list_shortcode($atts) {
	ob_start();
	echo "<div class='hours-list stack-all'>";
	hours_list();
	echo "</div>";
	
	return ob_get_clean();
}
add_shortcode('hours-list', 'render_office_hours_list_shortcode');

function column_list_shortcode($atts, $content) {
	$atts = shortcode_atts(
    array(
      'num_columns' => '2',      
    ),
    $atts, 'testimonials'
  );
	$stray_closing_p = array('/^<\/p>/i', '/<p>$/i');
  $content = preg_replace($stray_closing_p, '', $content);
	$count = $atts['num_columns'];
	return "<div class='list-$count-col'>$content</div>";
}
add_shortcode('column-list', 'column_list_shortcode');

function office_info_lists_shortcode($atts) {
	ob_start();
	echo "<div class='office-info-lists stack'>";
		echo "<ul>";
			echo "<li>" . render_address(false) . "</li>";
			echo "<li>" . email_link(CONTACT['primary_email'], CONTACT['primary_email'], false) . "</li>";
			echo "<li>" .  phone_link(CONTACT['primary_phone'], false, false) . "</li>";
		echo "</ul>";
		hours_list();
	echo "</div>";
	return ob_get_clean();
}
add_shortcode('office-info-lists', 'office_info_lists_shortcode');