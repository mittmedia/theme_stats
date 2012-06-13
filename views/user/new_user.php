<?php global $user; ?>

<div class="wrap" id="profile-page">
  <div id="icon-users" class="icon32"><br></div>
  <h2><?php _e( 'New User' ); ?></h2>

  <?php \WpMvc\ViewHelper::render_partial( "partials/user_form" ); ?>
  
</div>