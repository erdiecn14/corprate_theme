<?php

class Stratford_Partners_Footer_Nav_Walker extends Walker_Nav_menu {
  
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    // $parent_only = in_array( 'parent-only', $item->classes );
    $parent_only = false;
    $link = $item->url;
    $is_parent = in_array( 'menu-item-has-children', $item->classes );
    if ( $link && $link == '#' ) {
      $parent_only = true;
    }
    $title = $item->title;
    
    $output .= '<li class="' . implode(" ", $item->classes) . '">';
    
    if ( $is_parent ) {
      $output .= "<h2>";
    }
    
    if ( false == $parent_only ) {
      $output .= '<a href="' . $link . '">';
    }
    
    $output .= $title;
    
    if ( false == $parent_only ) {
      $output .= '</a>';
    }
    
    if ( true == $is_parent ) {
      $output .= '</h2>';
    }
    
  }
	
	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M535.847-480 364.924-650.924q-8.308-8.307-8.5-18.384-.193-10.076 8.5-18.768 8.692-8.693 18.576-8.693t18.915 9.031l185.43 185.431q4.616 5.015 6.923 10.546 2.308 5.53 2.308 11.961t-2.308 11.961q-2.307 5.531-6.923 10.146l-185.43 185.431q-8.646 8.646-18.223 8.338-9.576-.307-18.268-9-8.693-8.692-8.693-18.576t8.693-18.576L535.847-480Z"/></svg>';
		$output .= "</li>{$n}";
	}
  
}