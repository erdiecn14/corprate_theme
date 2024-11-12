<?php

if ( !function_exists('get_inline_svg')) {
  function get_inline_svg( $img_id ) {
    $actual_id = $img_id;
    // in case accidentally pass img array
    if ( is_array( $img_id) ) {
      $actual_id = $img_id['ID'];
    }
    // get the file path of the image using its ID
    $img_file_path = get_attached_file($actual_id);
    // return the actual contents of the file
    return file_get_contents($img_file_path);
  }
}

/**
 * Turn the contents of a Textarea field into an HTML list
 *   each line in the textarea becomes a list item
 */
if ( !function_exists('text_to_li') ) {
  function text_to_li( $textarea, $list_type = "ul" ) {
    $bullets = '<li>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</li>\n<li>"),trim($textarea,"\n\r")).'</li>';
    if ( $list_type == "ul" ) {
      $bullets = "<ul>" . $bullets . "</ul>";
    }
    if ( $list_type == "ol" ) {
      $bullets = "<ol>" . $bullets . "</ol>";
    }
    if (($list_type == "none") || ($list_type == "li")) {
      $bullets = $bullets;
    }
    return $bullets;
  }
}

/**
 * Returns a phone number string with just numbers
 */
function clean_phone($phone_num) {
  return preg_replace("/[^0-9]/", "", $phone_num);
}

/**
 * Takes a color (hex from ACF color picker), and returns the color number corresponding
 * to the color number suffix for the sass color variable, or false if not a predefined color var 
 * 
 * @param string $color
 * @return bool|string
 */
function get_color_num($color) {
  $color_index = array_search(strtolower($color),THEME_COLORS);
  if ($color_index === false ) {
    return false;
  } else {
    return strval($color_index + 1);
  }
}

/**
 * Takes a text string and returns it with hyphen in place of spaces to use in an HTML attribute
 */
if (! function_exists('text_to_attr') ) {
  function text_to_attr($text) {
    return strtolower( str_replace(' ','-',trim($text)) );
  }
}

/**
 * Takes a PHP array and turns it into a string matching JS array syntax for use in echoing
 * as part of a <script>
 */
function array_to_js($arr) {
  $arr_str = "[";
  foreach ( $arr as $index => $val ) {
    if ( $index == 0 ) {
      $arr_str .= "'$val'";
    } else {
      $arr_str .= ",'$val'";
    }
  }
  $arr_str .= "]";
  echo $arr_str;
}

if (!function_exists('maybe_anchor')) {
  function maybe_anchor($anchor_text) {
    if ($anchor_text) {
      $anchor_id = str_replace(' ', '-', trim(strtolower($anchor_text)));
      echo "id='$anchor_id'";
    }  
  }
}

if (!function_exists('maybe_heading')) {
  function maybe_heading($heading_text, $h_lvl, $heading_alignment = 'left') {
    $alignment_class = 'heading-left';
    if ($heading_alignment == 'center') {
      $alignment_class = 'heading-center';
    } elseif ($heading_alignment == 'right') {
      $alignment_class = 'heading-right';
    }
    if (false == empty($heading_text)) {
      echo "<$h_lvl class='$alignment_class'>$heading_text</$h_lvl>";
    } 
  }
}

if (!function_exists('maybe_bg_class')) {
  function maybe_bg_class($bg_choice) {
    if ($bg_choice) {
      $bg_class = str_replace('color_', 'bg-', $bg_choice);
      echo $bg_class;
    }
  }
}

function get_size_prop($space_step) {
  $padding_css_custom_prop = '';
  switch($space_step) {
    case 0: 
       $padding_css_custom_prop = '--PAD-ZERO';
       break;    
    case 1: 
       $padding_css_custom_prop = '--PAD-7';
       break;
    case 2: 
       $padding_css_custom_prop = '--PAD-6';
       break;
    case 3: 
       $padding_css_custom_prop = '--PAD-5';
       break;
    case 4: 
       $padding_css_custom_prop = '--PAD-4';
       break;
    case 5: 
       $padding_css_custom_prop = '--PAD-3';
       break;
    case 6: 
       $padding_css_custom_prop = '--PAD-2';
       break;
    case 7: 
       $padding_css_custom_prop = '--PAD-1';
       break;
    case 8: 
       $padding_css_custom_prop = '--PAD0';
       break;
    case 9: 
       $padding_css_custom_prop = '--PAD1';
       break;
    case 10: 
       $padding_css_custom_prop = '--PAD2';
       break;
    case 11: 
       $padding_css_custom_prop = '--PAD3';
       break;
    case 12: 
       $padding_css_custom_prop = '--PAD4';
       break;
    case 13: 
       $padding_css_custom_prop = '--PAD5';
       break;
    case 14: 
       $padding_css_custom_prop = '--PAD6';
       break;
    case 15: 
       $padding_css_custom_prop = '--PAD7';
       break;
    default:
       $padding_css_custom_prop = '--PAD0';
  }
  return $padding_css_custom_prop;
}