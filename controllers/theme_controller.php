<?php

namespace ThemeStats
{
  class ThemeController extends \WpMvc\BaseController
  {
    public function index()
    {
      global $blogs;

      $blogs = Blog::all();

      self::render( $this, "index" );
    }
  }
}
