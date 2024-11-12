<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$blog_archive_options = new FieldsBuilder('blog_archive_options');
$blog_archive_options
  ->addGroup('blog_archive')
    ->addTrueFalse('show_sidebar',[
      'label' => "Show Sidebar",
      'instructions' => 'Choose whether to display a blog sidebar.<br><a href="/wp-admin/widgets.php">Click Here</a> to edit the sidebar content',
      'ui' => 1,
      'ui_on_text' => 'Visible',
      'ui_off_text' => 'Hidden',
      'default_value' => 1,
      'wrapper' => [
        'width' => '33'
      ],
    ])
    ->addText('post_cta', [
      'label' => 'Blog Card Link Text',
      'instructions' => 'the text for the button on each blog card',
      'default_value' => 'Read More',
      'wrapper' => [
        'width' => '33'
      ],
    ])
    ->addSelect('image_size', [
      'label' => 'Image Size',
      'instructions' => 'choose the blog card cover image size',
      'choices' => [
        'thumbnail' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
        'full' => 'Full Size'
      ],
      'default_value' => 'medium',
      'wrapper' => [
        'width' => '33'
      ],
    ])
    ->addTrueFalse('show_excerpt',[
      'label' => "Show Excerpt",
      'instructions' => 'choose whether to display a blog excerpt on each card',
      'ui' => 1,
      'ui_on_text' => 'Yes',
      'ui_off_text' => 'No',
      'default_value' => 1,
      'wrapper' => [
        'width' => '33'
      ],
    ])
    ->addNumber('excerpt_length',[
      'default_value' => '20',
      'wrapper' => [
        'width' => '33'
      ],
    ])
  ->endGroup();
