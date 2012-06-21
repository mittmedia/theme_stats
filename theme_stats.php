<?php
/*
Plugin Name: Theme Stats
Plugin URI: https://github.com/fredriksundstrom/theme_stats
Description: It shows all the themes and its use statistics.
Version: 1.0.0
Author: Fredrik Sundström and Magnus Engström
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

require_once( "wp_mvc-1.0.0/init.php" );

$app = new \WpMvc\Application();

$app->init( 'ThemeStats', WP_PLUGIN_DIR . '/theme_stats' );

// WP: Add pages
add_action( "admin_menu", "theme_stats_add_pages" );
function theme_stats_add_pages()
{
  add_management_page( "Theme Stats", "Theme Stats", "Super Admin", "theme_stats_manage", "theme_stats_manage_page" );
}

function theme_stats_manage_page()
{
  global $app;

  $app->theme_controller->index();
}
