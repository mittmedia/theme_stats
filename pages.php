<?php

require_once( WP_PLUGIN_DIR . "/theme_stats/blogs.php" );
require_once( WP_PLUGIN_DIR . "/theme_stats/themes.php" );

function theme_stats_add_pages() {
  add_management_page( "Theme Stats", "Theme Stats", "Super Admin", "theme_stats_manage", "theme_stats_manage_page" );
}

function theme_stats_manage_page() {
  $wp_blogs   = get_blogs();
  $wp_themes  = get_themes_as_objects();

  usort($wp_themes, "cmp_wp_themes");

  add_current_theme_to_blogs( $wp_blogs );
  add_blog_count_to_themes( $wp_blogs, $wp_themes );

  include( "management.php" );
}