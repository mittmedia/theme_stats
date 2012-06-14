<?php global $blogs; ?>

<div class="wrap">
  <div id="icon-tools" class="icon32"><!-- --></div>
  <h2>Theme Stats</h2>
  <p><?php _e( "The list contains the currently available themes and the use statistics for each." ); ?></p>
  <table class='widefat' cellspacing='0'>
    <thead>
      <tr>
        <th class='row-title' style='width: 250px;'>Name</th>
        <th class='desc'>Description</th>
        <th class='num-blogs' style='width: 125px; text-align: right'>Number of Blogs</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ( $blogs as $blog ) {
          \WpMvc\ViewHelper::render_template( 'templates/blog', $blog );
        }
      ?>
    </tbody>
  </table>
</div>
