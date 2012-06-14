<?php global $users; ?>

<?php
  foreach ( $users as $user ) {
    \WpMvc\ViewHelper::render_template( "templates/user", $user );
  }
?>