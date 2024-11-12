<?php

function cptui_register_my_cpts_team_member() {

	/**
	 * Post Type: Team Members.
	 */

	$labels = [
		"name" => __( "Team Members", "corp-site" ),
		"singular_name" => __( "Team Member", "corp-site" ),
		"menu_name" => __( "Team Members", "corp-site" ),
		"featured_image" => __( "Headshot", "corp-site" ),
		"set_featured_image" => __( "Set Headshot", "corp-site" ),
		"remove_featured_image" => __( "Remove Headshot", "corp-site" ),
	];

	$args = [
		"label" => __( "Team Members", "corp-site" ),
		"labels" => $labels,
		"description" => "Team Members",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "team-member-directory", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 6,
		"menu_icon" => "dashicons-groups",
		"supports" => [ "title", "custom-fields", "revisions", "post-formats" ],
		"show_in_graphql" => false,
	];

	register_post_type( "team_member", $args );
}

add_action( 'init', 'cptui_register_my_cpts_team_member' );
