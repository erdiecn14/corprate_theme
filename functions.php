<?php

/**
 * Stratford Partnersfunctions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package real_realty
 */

if (!defined('STRATFORD_PARTNERS_VERSION')) {
  // Replace the version number of the theme on each release.
  define('STRATFORD_PARTNERS_VERSION', '1.0.0');
}

if (!function_exists('lyst_log')) {
  function lyst_log($log)
  {
    if (is_array($log) || is_object($log)) {
      error_log(print_r($log, true));
    } else {
      error_log($log);
    }
  }
}

if (!function_exists('stratford_partners_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function stratford_partners_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on , use a find and replace
		 * to change 'stratford-partners' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('stratford-partners', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support('title-tag');

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'menu-1' => esc_html__('Top Menu', 'stratford-partners'),
        'menu-2' => esc_html__('Quick Links', 'stratford-partners'),
        'menu-3' => esc_html__('Footer Menu', 'stratford-partners'),
        'menu-4' => esc_html__('Footer Legal', 'stratford-partners'),
      )
    );

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters(
        'stratford_partners_custom_background_args',
        array(
          'default-color' => 'ffffff',
          'default-image' => '',
        )
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
      )
    );
  }
endif;
add_action('after_setup_theme', 'stratford_partners_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stratford_partners_content_width()
{
  $GLOBALS['content_width'] = apply_filters('stratford_partners_content_width', 640);
}
add_action('after_setup_theme', 'stratford_partners_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stratford_partners_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'stratford-partners'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'stratford-partners'),
      // 'before_widget' => '<div id="%1$s" class="widget %2$s">',
      // 'after_widget'  => '</div>',
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'stratford_partners_widgets_init');

/**
 *-------------------------------------------------------------------------------- 
 * --- CUSTOM POST TYPES ---
 *-------------------------------------------------------------------------------- 
 */


require get_template_directory() . '/inc/custom-post-types/team-member-post-type.php';
require get_template_directory() . '/inc/custom-post-types/asset-post-type.php';


/***********************************************************************************/

/**
 *-------------------------------------------------------------------------------- 
 * --- ADVANCED CUSTOM FIELDS ---
 *-------------------------------------------------------------------------------- 
 */

// Load Composer’s autoloader
// NOTE: Don't forget to run composer install when starting project or the site will crash
require_once(__DIR__ . '/vendor/autoload.php');


/* Allow shortcodes in ACF textarea fields */
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');

/* Create Options Pages */

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'   => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

/**
 * Customize ACF Color Picker
 */
$stratford_partners_theme_colors = ['#17161C', '#E37749', '#F9F7F3', "#D1D3D4", "#000000", "#ffffff", '#28292D', '#F4F4F2'];
$color_index = 0;
define('THEME_COLORS', $stratford_partners_theme_colors);

function lyst_custom_acf_color_picker()
{ ?>
  <script type="text/javascript">
    (function($) {
      acf.add_filter('color_picker_args', function(args, $field) {
        args.palettes = <?php array_to_js(THEME_COLORS); ?>;
        return args;
      });
    })(jQuery);
  </script>
<?php
}
add_action('acf/input/admin_footer', 'lyst_custom_acf_color_picker');

/**
 * Populate ACF select field options with Gravity Forms forms
 * Field Name must be gform_picker
 * Field Type must be select
 * https://www.advancedcustomfields.com/resources/acf-load_field/
 */
function acf_populate_gf_forms_ids($field)
{
  if (class_exists('GFFormsModel')) {
    $choices = [];

    foreach (\GFFormsModel::get_forms() as $form) {
      $choices[$form->id] = $form->title;
    }

    $field['choices'] = $choices;
  }

  return $field;
}
add_filter('acf/load_field/name=gform_picker', 'acf_populate_gf_forms_ids');


/***********************************************************************************/


/**
 *-------------------------------------------------------------------------------- 
 * --- MISC CONTENT FILTERS ---
 *-------------------------------------------------------------------------------- 
 */

/**
 * Filter YouTube oembed url to add rel=0 so it doesn't show rando videos
 * also adds the url param to allow the Youtube iframe api
 */
function no_youtube_randos($html, $url, $args)
{
  if (strpos($html, 'youtube') !== false || strpos($html, 'youtu.be') !== false) {
    $args = [
      'rel' => 0,
      'showinfo' => 0,
      'modestbranding' => 1,
      'enablejsapi' => 1
    ];
    $params = '?feature=oembed&';
    foreach ($args as $arg => $val) {
      $params .= "$arg=$val&";
    }
    $html = str_replace('?feature=oembed', $params, $html);
  }
  return $html;
}
add_filter('oembed_result', 'no_youtube_randos', 10, 3);

function stratford_partners_custom_excerpt_length($length)
{
  $blog_archive_options = get_field('blog_archive', 'option');
  $excerpt_length = $blog_archive_options['excerpt_length'];
  return $excerpt_length;
}
add_filter('excerpt_length', 'stratford_partners_custom_excerpt_length', 999);

/**
 * Alter the query for the Team Member Archives 
 * - show all posts
 * - sort alphabetically by title
 */
add_action('pre_get_posts', 'show_all_staff_directory');
function show_all_staff_directory($query)
{
  if (!is_admin() && $query->is_main_query() && is_post_type_archive('team_member')) {
    $query->set('posts_per_page', '-1');
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
  if (!is_admin() && $query->is_main_query() && is_tax('location')) {
    $query->set('posts_per_page', '-1');
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
  if (!is_admin() && $query->is_main_query() && is_tax('function')) {
    $query->set('posts_per_page', '-1');
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
}

/**
 * Gravity Form Advanced Post Creation Add-On can add values to custom fields but not the same
 * way ACF works. You can't use get_field to get group fields. 
 * Adding this filter to add data the ACF way
 */
add_action('gform_advancedpostcreation_post_after_creation_4', 'complete_team_member_creation', 10, 4);
function complete_team_member_creation($post_id, $feed, $entry, $form)
{
  $entry_key_by_acf_field_name = array();
  foreach ($feed['postMetaFields'] as $meta_field) {
    $entry_key_by_acf_field_name[$meta_field['key']] = $meta_field['value'];
  }
  $entry_email_key = $entry_key_by_acf_field_name['team_member_details_email'];
  $entry_position_key = $entry_key_by_acf_field_name['team_member_details_position'];
  $entry_first_name_key = $entry_key_by_acf_field_name['team_member_details_first_name'];
  $entry_last_name_key = $entry_key_by_acf_field_name['team_member_details_last_name'];
  $entry_nickname_key = $entry_key_by_acf_field_name['team_member_details_Nickname'];
  update_field(
    'team_member_details',
    array(
      'email' => $entry[$entry_email_key],
      'position' => $entry[$entry_position_key],
      'first_name' => $entry[$entry_first_name_key],
      'last_name' => $entry[$entry_last_name_key],
      'nickname' => $entry[$entry_nickname_key],
    ),
    $post_id
  );
}



/**
 *-------------------------------------------------------------------------------- 
 * --- Menu Filters ---
 *-------------------------------------------------------------------------------- 
 */

// Change all menu Apply Now links to the url for Apply Now in the Community Settings.
// NOTE: the link title attribute must be "application portal"
function menu_apply_now_change($menu_objects, $args)
{
  $apply_now_url = get_field('leasing_portal_link', 'option');
  if (!empty($apply_now_url)) {
    foreach ($menu_objects as $menu_item) {
      if ($menu_item->attr_title == 'application portal') {
        $menu_item->url = $apply_now_url;
      }
    }
  }
  return $menu_objects;
}
// add_filter('wp_nav_menu_objects','menu_apply_now_change', 10, 2);


/**
 *-------------------------------------------------------------------------------- 
 * --- ENQUEUE SCRIPTS & STYLES ---
 * Note: Sass will bundle Magnific Popup and Slick slider CSS with the theme CSS
 * Webpack will bundle Slick JS and Magnific Popup JS with the theme JS
 *-------------------------------------------------------------------------------- 
 */
function stratford_partners_scripts()
{
  wp_enqueue_style('stratford-partners-style', get_stylesheet_directory_uri() . '/public/css/main.min.css', array(), filemtime(get_stylesheet_directory() . '/public/css/main.min.css'));
  wp_style_add_data('stratford-partners-style', 'rtl', 'replace');

  // consolidated JS file (via webpack)
  wp_register_script(
    'stratford-partners-main-js',
    get_template_directory_uri() . '/public/js/stratford-partners-main.min.js',
    array('jquery'),
    filemtime(get_template_directory() . '/public/js/stratford-partners-main.min.js'),
    true
  );
  wp_enqueue_script('stratford-partners-main-js');
}
add_action('wp_enqueue_scripts', 'stratford_partners_scripts');

function stratford_partners_admin_scripts()
{
  wp_enqueue_style('stratford-partners-admin-style', get_template_directory_uri() . '/admin/admin-styles.css');
  wp_enqueue_style('typekit', '//use.typekit.net/ztt4kwt.css', array(), '1.0.0');
  wp_enqueue_script(
    'theme-admin-scripts',
    get_template_directory_uri() . '/admin/admin-scripts.js',
    array('jquery'),
    false,
    true
  );
}
add_action('admin_enqueue_scripts', 'stratford_partners_admin_scripts', 20);

/***********************************************************************************/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * MISC HELPER FUNCTIONS 
 *********************************************************************************/
require get_template_directory() . '/inc/theme-helper-functions.php';

/**
 *  MISC Shortcodes
 *********************************************************************************/
require get_template_directory() . '/inc/theme-shortcodes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Nav Walkers
 */
require get_template_directory() . '/inc/theme-navigation/top-nav-walker.php';
require get_template_directory() . '/inc/theme-navigation/footer-nav-walker.php';

/**
 * Lyst ACF Layouts
 */
require get_template_directory() . '/inc/theme-custom-fields.php';

/**
 *-------------------------------------------------------------------------------- 
 * --- COMMUNITY CONSTANTS ---
 *-------------------------------------------------------------------------------- 
 */

define('CONTACT', get_field('contact', 'option'));
define('SOCIAL_MEDIA', get_field('social_media', 'option'));
define('LOCATION', get_field('location', 'option'));
/***********************************************************************************/


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 *-------------------------------------------------------------------------------- 
 *     ---- FORMS FUNCTIONALITY ----
 *-------------------------------------------------------------------------------- 
 */

add_filter('gform_confirmation_anchor', '__return_true');

/**
 * Populate Checkboxes with taxonomy values
 */
// add_filter('gform_field_choices', 'add_team_member_location_choices', 10, 2);
add_filter('gform_pre_render_4', 'add_team_member_location_choices');
add_filter('gform_pre_validation_4', 'add_team_member_location_choices');
add_filter('gform_pre_submission_filter_4', 'add_team_member_location_choices');
add_filter('gform_admin_pre_render_4', 'add_team_member_location_choices');
function add_team_member_location_choices($form)
{
  foreach ($form['fields'] as &$field) {
    if ($field->label != 'Location') {
      continue;
    }
    $team_locations = get_terms(array(
      'taxonomy' =>  'location',
      'hide_empty' => false,
    ));
    $choices = [];
    $inputs = [];
    $input_id = 1;
    foreach ($team_locations as $location) {
      //per Gravity Forms docs: skipping index that are multiples of 10 (multiples of 10 create problems as the input IDs)
      if ($input_id % 10 == 0) {
        $input_id++;
      }
      $choices[] = array('text' => $location->name, 'value' => $location->name);
      $inputs[] = array('label' => $location->name, 'id' => "{$field->id}.{$input_id}");
      $input_id++;
    }
    $field->choices = $choices;
    $field->inputs = $inputs;
  }
  return $form;
}

add_filter('gform_pre_render_4', 'add_team_member_function_choices');
add_filter('gform_pre_validation_4', 'add_team_member_function_choices');
add_filter('gform_pre_submission_filter_4', 'add_team_member_function_choices');
add_filter('gform_admin_pre_render_4', 'add_team_member_function_choices');
function add_team_member_function_choices($form)
{
  foreach ($form['fields'] as &$field) {
    if ($field->label != 'Function') {
      continue;
    }
    $team_functions = get_terms(array(
      'taxonomy' =>  'function',
      'hide_empty' => false,
    ));
    $choices = [];
    foreach ($team_functions as $function) {
      $choices[] = array('text' => $function->name, 'value' => $function->name);
    }
    $field->choices = $choices;
  }
  return $form;
}

/**
 *      FIRES THE FORM SUBMISSION EVENT FOR GTM
 */
add_filter('gform_confirmation', 'fire_form_submit_tracking', 10, 4);
function fire_form_submit_tracking($confirmation, $form, $entry, $ajax)
{
  if (is_array($confirmation)) {
    return $confirmation;
  } else {
    return $confirmation .= "<script>(function(){ window.dataLayer ? window.dataLayer.push({'event':'formConfirmed'}) : false; })();</script>";
  }
}
