<?php
/**
 * Fields for the Native Form component
 * see template-parts/component-templates/page-component_form_native.php for template file
 * see _forms.scss for CSS 
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
  
$native_form = new FieldsBuilder('component_form_native',['title' => 'Native Form']);
$native_form
  ->addSelect('gform_picker', ['label' => 'Choose a Form']); 