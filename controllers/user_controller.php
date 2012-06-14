<?php

class UserController extends \WpMvc\BaseController
{
  public function index()
  {
    global $users;
    
    $users = User::all();

    self::render( $this, "index" );
  }

  public function edit()
  {
    global $user;

    $user = User::find( $_GET['id'] );

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      $user->takes_post( $_POST['user'] );

      $user->save();
    }

    self::render( $this, "edit" );
  }

  public function new_user()
  {
    global $user;

    $user = User::virgin();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      $user->takes_post( $_POST['user'] );

      $insert_id = $user->save();

      echo "Sparad!";

      //echo "<meta http-equiv='refresh' content='0; url=http://blogg.dt.se/wp-admin/tools.php?page=theme_stats_manage&id=" . $insert_id . "' />";
      
      exit;
    }

    self::render( $this, "new_user" );
  }
}
