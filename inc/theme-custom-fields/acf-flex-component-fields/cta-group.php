<?php
/**
 * Fields for the CTA Group
 * see template-parts/component-templates/page-component_cta_picker.php for template file
 * see _cta.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$cta_group = new FieldsBuilder('component_cta_group',['title' => 'CTA (Call To Action) Group']);
$cta_group
	->addRepeater('cta_group', [
		'label' => 'CTA Group',
		'instructions' => 'For CTA buttons in responsive row',
		'button_label' => 'Add CTA',
	])
		->addGroup('cta_options', [
			'label' => 'Options',
		])
			->addFields($background_color_buttons)
			->addButtonGroup('cta_type', [
				'label' => 'Choose a CTA Type',
				'default_value' => 'custom',
				'return_format' => 'value',
				'wrapper' => [
					'width' => '50',
				],
				'choices' => array(
					'file' => 'File Download',
					'custom' => 'Custom CTA',
				)
			])
			->addButtonGroup('alignment', [
				'label' => 'Button Alignment',
				'wrapper' => [
					'class' => 'column-alignment-buttons',
					'width' => '50'
				],
				'choices' => [
					'left' => 'Left <i class="dashicons dashicons-align-left"></i>',
					'center' => 'Center <i class="dashicons dashicons-align-center"></i>',
					'right' => 'Right <i class="dashicons dashicons-align-right"></i>',
				],
				'default_value' => 'left',
				'layout' => 'horizontal',
			])
			->addFile('file_picker', [
				'label' => 'Upload a File',
				'return_format' => 'array',
				'library' => 'all',
				'mime_types' => '',
			])
				->conditional('cta_type', '==', 'file')
			->addLink('custom_cta_link', [
					'label' => 'Custom CTA Link',
					'return_format' => 'array'
				])
				->conditional('cta_type', '==', 'custom') 
		->endGroup()
	->endRepeater();