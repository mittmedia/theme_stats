<?php

function get_themes_as_objects() {
  $wp_themes = get_themes();
  $wp_themes_as_objects = array();

  foreach( $wp_themes as $wp_theme ) {
    $wp_theme["Number of Blogs"] = 0;
    array_push( $wp_themes_as_objects, (object)$wp_theme );
  }

  return $wp_themes_as_objects;
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
