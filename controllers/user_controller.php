<?php

class UserController extends \WpMvc\BaseController
{
  public function index()
  {
    global $users;
    
    $users = User::all();

    self::render( $this, "index" );
  }

  public function show()
  {
    $user = User::find(1);
    echo $user->attr( "user_email" );
    $user->attr( "user_email", "fredrik.sundstrom@gmail.com" );
    echo $user->attr( "user_email" );
    $user->save();

    self::render( $this, __FUNCTION__ );
  }

  public function edit()
  {
    global $user;

    $users = User::all();

    var_dump( $users );

    die();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      $ID = $_POST['user']['ID'];

      $user = User::find($ID);

      $user->save();
    }

    $user = User::find( $_GET['id'] );

    self::render( $this, "edit" );
  }

  public function new_user()
  {
    global $user;

    $user = User::virgin();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      $insert_id = $user->save();

      echo "<meta http-equiv='refresh' content='0; url=http://blogg.dt.se/wp-admin/tools.php?page=theme_stats_manage&id=" . $insert_id . "' />";
      
      exit;
    }

    self::render( $this, "new_user" );
  }
}
