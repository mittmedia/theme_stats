<?php global $users; ?>

<div class="wrap" id="profile-page">
  <div id="icon-users" class="icon32"><br></div>
  <h2><?php _e( 'Users' ); ?></h2>

  <?php
    foreach ( $users as $user ) {
      global $user;

      \WpMvc\ViewHelper::render_template( "templates/user" );
    }
  ?>
  
</div>