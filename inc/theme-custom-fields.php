<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Add Partials
 */
require get_template_directory() . '/inc/theme-custom-fields/acf-field-partials.php';

/**
 *-------------------------------------------------------------------------------- 
 * --- FLEXIBLE CONTENT FIELDS ---
 *  - Section
 *  -- Layout
 *  ---- Component
 *-------------------------------------------------------------------------------- 
 */

/**
 * ======== COMPONENTS ======== 
 */

/**
 * Required flex component partials
 */
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/hero.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/prose.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/super-list.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/video-native.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/video-embed.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/framed-image.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/google-map.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/form-native.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/cta-picker.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/cta-group.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/snippet.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/special-heading.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-component-fields/spreadsheet.php';

/**
 * Components flex content field for adding Components to a Layout
 */
$page_component_collection = new FieldsBuilder('page_component_collection');
$page_component_collection
  ->addFlexibleContent('component_collection', [
    'label' => 'Components',
    'wrapper' => [
      'class' => 'components',
    ],
    'button_label' => 'Add Component',
  ])
    ->addLayout($hero)
    ->addLayout($prose)
    ->addLayout($framed_image)
    ->addLayout($super_list)
    ->addLayout($native_video)
    ->addLayout($video_embed)
    ->addLayout($google_map)
    ->addLayout($native_form)
    ->addLayout($cta_picker)
		->addLayout($cta_group)
		->addLayout($snippet)
    ->addLayout($special_heading)
    ->addLayout($spreadsheet);
    
/**
 * ======== LAYOUTS ======== 
 */

/**
 * Required flex layout partials
 */
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layout-fields/columns.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layout-fields/copy-frame.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layout-fields/grid.php';

/**
 * Layouts flex content field for adding Layouts to a Section
 *  - Component flex content is nested within a layout
 */
$page_layout_collection = new FieldsBuilder('page_layout_collection');
$page_layout_collection
  ->addFlexibleContent('layout_collection', [
    'label' => 'Layouts',
    'wrapper' => [
      'class' => 'layouts',
    ],
    'button_label' => 'Add Layout',
  ])
    ->addLayout($columns);
    // ->addLayout($copy_frame)
    // ->addLayout($grid);

/**
 * ======== SECTIONS ======== 
 */

/**
* Required flex section partials
*/
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-section-fields/section-basic.php';

/**
 * Sections flex content field for adding Sections to a page
 *  - Layouts flex content is nested within a section
 */
$page_section_collection = new FieldsBuilder('page_section_collection', [
  'position' => 'acf_after_title',
]);
$page_section_collection
  ->addFlexibleContent('section_collection', [
    'label' => 'Sections',
    'wrapper' => [
      'class' => 'sections',
    ],
    'button_label' => 'Add Section',
  ])
    ->addLayout($section_basic)
  ->setLocation('post_type', '==', 'page');
  
add_action('acf/init', function() use ($page_section_collection) {
  acf_add_local_field_group($page_section_collection->build());
});

/**
 *-------------------------------------------------------------------------------- 
 * --- GLOBAL THEME OPTIONS ---
 *-------------------------------------------------------------------------------- 
 */

/**
 * Required Options Page Partials
 */
require get_template_directory() . '/inc/theme-custom-fields/acf-theme-options/location-info.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-theme-options/contact-info.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-theme-options/social-media-info.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-theme-options/branding.php';
// require get_template_directory() . '/inc/theme-custom-fields/acf-theme-options/banner.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-theme-options/blog-archive.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-theme-options/team-member-options.php';


/**
 * Options Page Field
 */
 $theme_settings = new FieldsBuilder('theme_settings');
 $theme_settings
    ->addTab('Contact Info')
      ->addFields($contact_info)
    ->addTab('Location')
      ->addFields($location_info)
    ->addTab('Social Media')
      ->addFields($social_media_info)
    ->addTab('Footer')
      ->addFields($footer_content)
    // ->addTab('Banner')
    //   ->addFields($banner)
    ->addTab('Blog')
      ->addFields($blog_archive_options)
    ->addTab('Team Member Page Options')
      ->addFields($team_member_options)      
      
    ->setLocation('options_page', '==', 'theme-settings');

add_action('acf/init', function() use ($theme_settings) {
  acf_add_local_field_group($theme_settings->build());
});

/**
 * Page Features (options in sidebar on every page)
 */
$page_features = new FieldsBuilder('page_features', ['position' => 'side']);
$page_features 
  ->addGroup('feature_options')
  ->endGroup()
  ->setLocation('post_type', '==', 'page');

add_action('acf/init', function() use ($page_features) {
  acf_add_local_field_group($page_features->build());
});

/**
 * Blog Post Features (options in sidebar on every blog post)
 */
$blog_post_features = new FieldsBuilder('blog_post_features', ['position' => 'acf_after_title']);
$blog_post_features 
  ->addGroup('feature_options', ['label' => ''])
    ->addTrueFalse('show_post_title', [
      'label' => 'Display Post Title',
      'instructions' => 'Turn off if you want to use write custom Heading 1 in the blog post',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => 'Visible',
      'ui_off_text' => 'Hidden',
      'wrapper' => [
        'width' => '33'
      ]
    ])    
    ->addTrueFalse('show_featured_image', [
      'label' => 'Display Featured Image',
      'instructions' => 'Turn off if you only want to use the featured image on the listing page',
      'default_value' => 1,
      'ui' => 1,
      'ui_on_text' => 'Visible',
      'ui_off_text' => 'Hidden',
      'wrapper' => [
        'width' => '33'
      ]
    ])
  ->endGroup()
  ->setLocation('post_type', '==', 'post');

add_action('acf/init', function() use ($blog_post_features) {
  acf_add_local_field_group($blog_post_features->build());
});

/**
 *-------------------------------------------------------------------------------- 
 * --- PAGE TEMPLATE SPECIFIC FIELDS ---
 *-------------------------------------------------------------------------------- 
 */
// $page_fields_dir = '/inc/theme-custom-fields/acf-page-fields/';
// require get_template_directory() . $page_fields_dir . 'home-page-fields.php';

/**
 *-------------------------------------------------------------------------------- 
 * --- CUSTOM POST TYPE SPECIFIC FIELDS ---
 *-------------------------------------------------------------------------------- 
 */
$cpt_fields_dir = '/inc/theme-custom-fields/acf-custom-post-type-fields/';
require get_template_directory() . $cpt_fields_dir . 'team-member-cpt-custom-fields.php';
require get_template_directory() . $cpt_fields_dir . 'asset-cpt-custom-fields.php';