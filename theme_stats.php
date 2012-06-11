<?php
/*
Plugin Name: Theme Stats
Plugin URI: https://github.com/fredriksundstrom/theme_stats
Description: It shows all the themes and its use statistics.
Version: 1.0.0
Author: Fredrik Sundström
Author URI: https://github.com/fredriksundstrom
License: MIT
*/

/*
Copyright (c) 2012 Fredrik Sundström

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/

add_action('admin_menu', 'theme_stats_add_pages');

function theme_stats_add_pages() {
  add_management_page('Theme Stats', 'Theme Stats', 'Super Admin', 'theme_stats_manage', 'theme_stats_manage_page');
}

function theme_stats_manage_page() {
  $wp_blogs   = get_blogs();
  $wp_themes  = get_themes_as_objects();

  usort($wp_themes, 'cmp_wp_themes');

  add_current_theme_to_blogs( $wp_blogs );
  add_blog_count_to_themes( $wp_blogs, $wp_themes );

  include 'management.php';
}

function get_blogs() {
  global $wpdb;
  global $wp_blogs;

  $wp_blogs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->blogs;" ) );

  return $wp_blogs;
}

function get_themes_as_objects() {
  $wp_themes = get_themes();
  $wp_themes_as_objects = array();

  foreach( $wp_themes as $wp_theme ) {
    $wp_theme["Number of Blogs"] = 0;
    array_push( $wp_themes_as_objects, (object)$wp_theme );
  }

  return $wp_themes_as_objects;
}

function get_blog_current_theme( $blog_id ) {
  return get_blog_option( $blog_id, "current_theme" );
}

function add_current_theme_to_blogs( $wp_blogs ) {
  foreach( $wp_blogs as $wp_blog ) {
    $wp_blog->current_theme = get_blog_current_theme( $wp_blog->blog_id );
  }
}

function add_blog_count_to_themes( $wp_blogs, $wp_themes ) {
  foreach( $wp_themes as $wp_theme ) {
    foreach( $wp_blogs as $wp_blog ) {
      if( $wp_theme->Name == $wp_blog->current_theme )
        $wp_theme->{"Number of Blogs"}++;
    }
  }
}

function cmp_wp_themes( $a, $b ) {
  if( $a->Name ==  $b->Name ) {
    return 0;
  }
  return ($a->Name < $b->Name) ? 1 : -1;
}
