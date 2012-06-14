<?php

class DmuController extends \WpMvc\BaseController
{
  public function index()
  {
    global $users;

    $users = User::all();

    $dmu_user = DmuUser::find(1);

    $dmu_user->name = "Magnus Engström";
    $dmu_user->is_mittmedia_employee = true;

    $dmu_user->save();

    echo '<pre>';
    var_dump( $dmu_user );
    echo '</pre>';

    self::render( $this, "index" );
  }
}