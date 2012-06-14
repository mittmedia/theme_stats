<?php

class ThemeController extends \WpMvc\BaseController
{
  public function index()
  {
    global $themes;

    $blog = Blog::find(10);
    $opt_admin_email = $blog->option->admin_email;
    $opt_admin_email->option_value = 'fredrik@example.com';
    $opt_admin_email->save();

    echo '<pre>';
    //var_dump( $blog->option( 'admin_email' ) );
    var_dump( $opt_admin_email->option_value );
    echo '</pre>';

    die;

    echo $option_admin_email->option_value;
    echo '<br/>';

    $option_admin_email->option_value = 'fredrik' . mt_rand( 50, 100 ) . '@example.com';

    $option_admin_email->save();

    echo $option_admin_email->option_value;

    //$blog->option[5]->option_value = "fredrik.sundstrom@gmail.com";

    //echo $blog->option[5]->option_value;

    //$blog->option[5]->save();

    //$blog->options[0]->save() );

    //$current_theme = $blog->option( 'current_theme' );

    //$current_theme->save();

    //$themes = UserMeta::all();

    self::render( $this, "index" );
  }
}