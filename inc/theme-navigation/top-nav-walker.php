<?php

class Stratford_Partners_Top_Nav_Walker extends Walker_Nav_menu {
  
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    $parent_only = false;
    $link_url = $item->url;
    $target_from_gui = $item->target;
    $link_title_attr = '';
    $link_title_from_gui = $item->attr_title;
		if (false === is_array($item->classes)) {
			$item->classes = array($item->classes);
		}
    $is_parent = in_array( 'menu-item-has-children', $item->classes );
    $link_target_attr = '';
    $link_rel_attr = '';
    if ($link_title_from_gui) {
      $link_title_attr = "title='$link_title_from_gui'";
    }
    if ($target_from_gui == "_blank") {
      $link_target_attr = "target='_blank'";
      $link_rel_attr = "rel='noopener'";
      $link_title_attr = "title='link opens in a new tab'";
    }
    if ( $link_url && $link_url == '#' && $is_parent ) {
      // hashed link with children will be turned into a button to open a submenu
      $parent_only = true;
    }
    
    $link_text = $item->title;
    $arrow_right = file_get_contents(get_template_directory() . '/template-parts/svg/chevron_right.svg.php');
    $output .= '<li class="' . implode(" ", $item->classes) . '">';



    // menu item has children but is also a valid link that goes somewhere
    if ( false == $parent_only && true == $is_parent ) {
      // $output .= "<div class='link-and-button'>";
			$output .= "<a href='$link_url' $link_target_attr $link_rel_attr $link_title_attr >";
				$output .= $link_text;
			$output .= "</a>";
			if ($depth == 0) {
				$output .= "<button class='submenu-dropdown-button' aria-expanded='false'>";
			} else {
				$output .= "<button class='nested-submenu-dropdown-button' aria-expanded='false'>";
			}
			$output .= "<span class='dropdown-icon' aria-hidden='true'>$arrow_right</span>";
			$output .= "<span class='button-text'>open submenu for $link_text</span>";
			$output .= '<svg aria-hidden="true" class="expand-icon--plus-minus" viewBox="0 0 10 10" focusable="false" width="24"><rect class="vert" height="8" width="2" y="1" x="4"></rect><rect height="2" width="8" y="4" x="1"></rect></svg>';
			$output .= "</button>";
      // $output .= "</div>";
    }
    
    // menu item has no destination and only serves to open a submenu
    if ( $parent_only ) {
      if ($depth == 0) {
        $output .= "<button class='submenu-dropdown-button' aria-expanded='false'>";
      } else {
        $output .= "<button class='nested-submenu-dropdown-button' aria-expanded='false'>";
      }
        $output .= $link_text;
        if ($depth > 0) {
           // only add down arrow for nested menu buttons without a link
          $output .= $arrow_right; 
          $output .= "<span class='dropdown-icon' aria-hidden='true'>$arrow_right</span>";
        } else {
          $output .= "<span class='dropdown-icon' aria-hidden='true'>$arrow_right</span>";

					// $output .= '<svg aria-hidden="true" class="expand-icon--plus-minus" viewBox="0 0 10 10" focusable="false" width="24"><rect class="vert" height="8" width="1" y="1" x="4.5"></rect><rect height="1" width="8" y="4.5" x="1"></rect></svg>';
				}
      $output .= "</button>";
    }

    if ( false == $is_parent ) { // just a normal link with no children
      $output .= "<a href='$link_url' $link_target_attr $link_rel_attr $link_title_attr >";
        $output .= $link_text;
      $output .= "</a>";
    }
  
}
  
}