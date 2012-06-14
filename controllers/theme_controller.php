<?php

class ThemeController extends \WpMvc\BaseController
{
  public function index()
  {
    global $themes;

    $blogs = Blog::all();

    foreach ( $blogs as $blog ) {
      var_dump( $blog->option->current_theme );
      $opt_current_theme = $blog->option->current_theme;
    }

    self::render( $this, "index" );
  }
}