<?php
/**
 * Fields for the Super List component
 * see template-parts/component-templates/page-component_super_list.php for template file
 * see also:
 * template-parts/component-templates/list-bullet.php
 *   (uses default li styles)
 * template-parts/component-templates/list-card.php
 *   _card-list.scss
 * template-parts/component-templates/list-column.php
 *   _column-list.scss
 * template-parts/component-templates/list-defined.php
 *   _defined-item-list.scss
 * template-parts/component-templates/list-expandable.php
 *   _faq-columns.scss
 * template-parts/component-templates/list-icon.php
 *   _icon-list.scss
 * template-parts/component-templates/list-link.php
 *   _link-list.scss
 * template-parts/component-templates/list-process.php
 *   _process-list.scss
 * template-parts/component-templates/list-stat.php
 *   _stat-list.scss
 * 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$super_list = new FieldsBuilder('component_super_list',['title' => 'Super List']);
$super_list
  ->addFields($background_color_buttons)
  ->addButtonGroup('list_type', [
    'label' => 'List Style',
    'return_format' => 'value',
    'choices' => [
      'bullet' => 'Bullet<br><i class="dashicons dashicons-editor-ul"></i>',
      'expandable' => 'Expandable Items<br><i class="dashicons dashicons-plus-alt"></i>',
      'defined' => 'Definitions<br><i class="dashicons dashicons-excerpt-view"></i>',
      'stat' => 'Stats<br><i class="dashicons dashicons-chart-bar"></i>',
      'link' => 'Links<br><i class="dashicons dashicons-admin-links"></i>',
      'process' => 'Process Steps<br><i class="dashicons dashicons-editor-ol"></i>',
      'card' => 'Cards<br><i class="dashicons dashicons-grid-view"></i>',
      'contact' => 'Contact Card<br>< i class="dashicons dashicons-businessperson"></i>'
    ],
    'default_value' => 'bullet',
  ])
  ->addRepeater('list_items', ['layout' => 'block'])
    ->addImage('cover_image',[
      'label' => 'Cover Image or Icon',
      'wrapper' => [
        'width' => '40'
      ],
      'return_format' => 'id',
      'max_size' => '400KB',
      'max_width' => '1920',
    ])
      ->conditional('list_type','==','card','==','contact')
        ->or('list_type','==','icon')
    ->addText('heading', [
      'label' => 'Heading',
      'instructions' => '<strong>Optional</strong> for bullet, column, link, and contact lists.',
      'wrapper' => [
        'width' => '60'
      ],
    ]) 
      ->conditional('list_type', '!=', 'link')
    ->addWysiwyg('body', [
      'label' => 'Body Content',
    ])
      ->conditional('list_type', '!=', 'link')
      ->and('list_type','!=','icon')
    ->addButtonGroup('link_type', [
      'label' => 'Link Type',
      'return_format' => 'value',
      'default_value' => 'page',
      'wrapper' => [
        'width' => '20',
      ],
      'choices' => array( 
        'page' => 'Page',
        'file' => 'File',
      )
    ])
      ->conditional('list_type', '==', 'link')
        ->or('list_type','==','card')
        ->or('list_type','==','icon')
    ->addLink('link_item', [
      'label' => '',
      'wrapper' => [
        'width' => '80'
      ],
    ])
      ->conditional('link_type', '==', 'page')
    ->addFile('file_item', [
      'label' => '',
      'return_format' => 'array',
      'library' => 'all',
      'mime_types' => '',
      'wrapper' => [
        'width' => '80'
      ],
    ])
      ->conditional('link_type', '==', 'file')
    ->addText('cta_text_override', [
      'label' => 'CTA Text Override',
      'instructions' => 'The default CTA is "Read More." You can override the text here.',
      'wrapper' => [
        'width' => '100'
      ],
    ])
      ->conditional('list_type','==','card','==','contact')
  ->endRepeater();