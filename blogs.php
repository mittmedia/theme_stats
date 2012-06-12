<?php

function get_blogs() {
  global $wpdb;
  global $wp_blogs;

  $wp_blogs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->blogs;" ) );

  return $wp_blogs;
}

function get_blog_current_theme( $blog_id ) {
  return get_blog_option( $blog_id, "current_theme" );
}

function add_current_theme_to_blogs( $wp_blogs ) {
  foreach( $wp_blogs as $wp_blog ) {
    $wp_blog->current_theme = get_blog_current_theme( $wp_blog->blog_id );
  }
}