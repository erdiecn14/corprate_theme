<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package real_realty
 */

 
/**
* Stratford PartnersTemplate Tags
*/
 
if ( ! function_exists( 'stratford_partners_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function stratford_partners_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'stratford-partners' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'stratford_partners_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function stratford_partners_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'stratford-partners' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'stratford_partners_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function stratford_partners_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'stratford-partners' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'stratford-partners' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'stratford-partners' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'stratford-partners' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'stratford-partners' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'stratford-partners' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'stratford_partners_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function stratford_partners_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 *  Stratford PartnersTemplate Tags
 */

/**
 * Print different brand colored "buttons" (links that look like buttons)
 */
function button_1($link_array) {
  $_url = esc_url($link_array['url']);
  $_title = esc_html($link_array['title']);
  $_target = esc_attr($link_array['target']);
  echo "<a class='button--1' href='$_url' target='$_target'>$_title</a>";
}
function button_2($link_array) {
  $_url = esc_url($link_array['url']);
  $_title = esc_html($link_array['title']);
  $_target = esc_attr($link_array['target']);
  echo "<a class='button--2' href='$_url' target='$_target'>$_title</a>";
}
function button_3($link_array) {
  $_url = esc_url($link_array['url']);
  $_title = esc_html($link_array['title']);
  $_target = esc_attr($link_array['target']);
  echo "<a class='button--3' href='$_url' target='$_target'>$_title</a>";
}
function button_4($link_array) {
  $_url = esc_url($link_array['url']);
  $_title = esc_html($link_array['title']);
  $_target = esc_attr($link_array['target']);
  echo "<a class='button--4' href='$_url' target='$_target'>$_title</a>";
}
function button_5($link_array) {
  $_url = esc_url($link_array['url']);
  $_title = esc_html($link_array['title']);
  $_target = esc_attr($link_array['target']);
  echo "<a class='button--5' href='$_url' target='$_target'>$_title</a>";
}
function button_w($link_array) {
  $_url = esc_url($link_array['url']);
  $_title = esc_html($link_array['title']);
  $_target = esc_attr($link_array['target']);
  echo "<a class='button--w' href='$_url' target='$_target'>$_title</a>";
}

/**
 * Takes an image ID and prints a srcset <img>, optional change the lazy load attribute 
 */
function srcset_full($image_id, $lazy = true) {
  echo wp_get_attachment_image($image_id,'full',false,['loading' => $lazy]);
}

/**
 * Prints a phone link with the optional phone icon next to it
 */
if (!function_exists('phone_link')) {
  function phone_link( $phone_number, $icon = false, $echo = true ) {
    if ( $icon ) {
      echo "<a href='tel:" . clean_phone($phone_number) . "'>";
      echo "<span class='phone-icon'>" . get_template_part('template-parts/svg/phone.svg') . "</span>";
      echo "<span class='phone-num'>$phone_number</span></a>";
      return true;
    } else {
      $phone_link = "<a href='tel:" . clean_phone($phone_number) . "'><span class='phone-num'>$phone_number</span></a>";
    }
    if ( ! $echo ) {
      return $phone_link;
    }
    echo $phone_link;
  } 
}

/**
 * Prints the Community's phone link with the optional phone icon next to it
 */
if (!function_exists('contact_phone_link')) {
  function contact_phone_link( $icon = false, $echo = true ) {
    $phone = CONTACT['phone'];
    if ( $icon ) {
      echo "<a href='tel:" . clean_phone($phone) . "'>";
      echo "<span class='phone-icon'>" . get_template_part('template-parts/svg/phone.svg') . "</span>";
      echo "<span class='phone-num'>$phone</span></a>";
      return true;
    } else {
      $phone_link = "<a href='tel:" . clean_phone($phone) . "'><span class='phone-num'>$phone</span></a>";
    }
    if ( ! $echo ) {
      return $phone_link;
    }
    echo $phone_link;
  } 
}

/**
 * Prints a Google Maps link to the Community's location with a map pin next to it
 */
function lyst_map_link() {
  $loc_url = CONTACT['map_url'];
  echo "<a href='$loc_url'>";
  get_template_part('template-parts/svg/location.svg');
  echo "<span class='sr-only'>Open our location in Google Maps</span></a>";
}

/**
 * Prints a email link
 */
if (!function_exists('email_link')) {
  function email_link($email, $alternate_text, $echo = true) {
    $email_link = "<a class='email-link' href='mailto:$email'>$email</a>";
    if ($alternate_text) {
      $email_link = "<a class='email-link' href='mailto:$email'>$alternate_text</a>";
    }  
    if ( ! $echo ) {
      return $email_link;
    }
    echo $email_link;
  }
}

/**
 * Prints the email link
 */
if (!function_exists('contact_email_link')) {
  function contact_email_link( $echo = true ) {
    $email = CONTACT['email'];
    $email_link = "<a href='mailto:$email'>$email</a>";
    if ( ! $echo ) {
      return $email_link;
    }
    echo $email_link;
  }
}

/**
 * Prints the community hours
 */
if ( !function_exists('hours_list') ) {
  function hours_list() {
    $hours = get_field('contact_office_hours','option');
		echo $hours;
    return true;
  }
}

if ( !function_exists('el_id') ) {
  function el_id($content) {
    if ( $element['id'] ) {
      $id = $element['id'];
      echo "id='$id'";
    }
  }
}

/**
 * @param string $css_string
 * @return array $css_value_by_prop an array with named indexes of css property shorthand => css class value number
 */
function css_classes_to_prop_val($css_string) {
  $css_classes = explode(" ",$css_string);
  $css_value_by_prop = [];
  foreach( $css_classes as $css_class ) {
    $prop_val = explode("-",$css_class,2);
    $prop = $prop_val[0];
    $val = $prop_val[1]; 
    $css_value_by_prop[$prop] = $val;
  }
  return $css_value_by_prop;
}

/**
 * @param string $layout - required classes that should be passed through untouched (typically for layout)
 * @param string $defaults - string of space delimited default classes, any default classes or layout classes that can be overriden
 * @param string $custom_bg - the optional custom background color class to override the default class
 * @param string $custom_color - the optional custom color class to override the default class
 * @return string prints class list, and prints inline styles if needed (when no class for the color is found) 
 */
if ( ! function_exists('the_css') ) {
  function the_css($layout,$defaults,$custom_bg = false,$custom_color = false) {
    $inline_styles = '';
    $class_vals_by_prop = [];
    if (! empty($defaults)) {
      $class_vals_by_prop = css_classes_to_prop_val($defaults);
    }
    if ( $custom_bg ) {
      $color_num = get_color_num($custom_bg);
      if ( $color_num ) {
        $class_vals_by_prop['bg'] = $color_num;
      } else {
        $class_vals_by_prop['bg'] = '';
        $inline_styles .= "background: $custom_bg;"; 
      }
    }
    if ( $custom_color ) {
      $color_num = get_color_num($custom_color);
      if ( $color_num ) {
        $class_vals_by_prop['color'] = $color_num;
      } else {
        $class_vals_by_prop['color'] = '';
        $inline_styles .= "color: $custom_color;";
      }
    }
    if ( !empty($class_vals_by_prop) || !empty($layout) ) {
      $class_list = 'class="';
      $class_list .= $layout . " ";
      foreach( $class_vals_by_prop as $prop => $val ) {
        if ( $val ) {
          $class_list .= "$prop-$val ";
        } 
      } 
      $class_list = trim($class_list) . '"';
      echo $class_list;
    }
    if( !empty($inline_styles) ) {
      echo 'style="' . $inline_styles . '"';
    }
  }
}

/**
 * Outputs standardized main Text content with a <header>: 
 * - heading set to the appropriate h1 or h2 based on seo toggle value
 * - optional "subhead" (p tag that can be styled differently) 
 * body copy
 * optional CTA
 */
function text_content($content) {
  get_template_part('template-parts/text-content','',['content' => $content]);
}

/**
 * Outputs all the social links entered in Community Options
 */
function social_link_list() {
  get_template_part('template-parts/social-links');
}

/**
 * Returns proper bedroom text based on plural/singular count
 */
function bed_text($bed_count) {
  if ( (float)$bed_count > 1 ) {
    echo "$bed_count Bedrooms";
  } else {
    echo "$bed_count Bedroom";
  }
}

/**
 * Returns proper bathroom text based on plural/singular count
 */
function bath_text($bath_count) {
  if ( (float)$bath_count > 1 ) {
    echo "$bath_count Bathrooms";
  } else {
    echo "$bath_count Bathroom";
  }
}

if (!function_exists('render_media')) {
  function render_media($media_options) {
    get_template_part('template-parts/media-types/media', $media_options['media_type'], 
      ['media' => $media_options] 
    );
  }
}

/**
 * @param $cta_group a cta from the ACF Partial $cta
 */
if (!function_exists('render_cta')) {
  function render_cta($cta_group) {
		if (
			false == empty($cta_group) &&
			is_array($cta_group) &&
			array_key_exists('link_data', $cta_group) &&
			false == empty($cta_group['link_data'])
		) {
			get_template_part('template-parts/cta', '', $cta_group);
		} else {
			return;
		}
  }
}


if (!function_exists('render_address')) {
  function render_address($echo = true) {
		if ($echo) {
			echo LOCATION['primary_address']['address_1'];
			if (false == empty(LOCATION['primary_address']['address_2'])) {
				echo " " . LOCATION['primary_address']['address_2'];
			}
			if (false == empty(LOCATION['primary_address']['city'])) {
				echo "<br /> " . LOCATION['primary_address']['city'];
			}
			if (false == empty(LOCATION['primary_address']['state'])) {
				echo ", " . LOCATION['primary_address']['state'];
			}
			if (false == empty(LOCATION['primary_address']['zip'])) {
				echo " " . LOCATION['primary_address']['zip'];
			}
		} else {
			$address = LOCATION['primary_address']['address_1'];
			if (false == empty(LOCATION['primary_address']['address_2'])) {
				$address .= " " . LOCATION['primary_address']['address_2'];
			}
			if (false == empty(LOCATION['primary_address']['city'])) {
				$address .= ", " . LOCATION['primary_address']['city'];
			}
			if (false == empty(LOCATION['primary_address']['state'])) {
				$address .= ", " . LOCATION['primary_address']['state'];
			}
			if (false == empty(LOCATION['primary_address']['zip'])) {
				$address .= " " . LOCATION['primary_address']['zip'];
			}
			return $address;
		}
  }
}