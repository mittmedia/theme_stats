<?php

function render_theme_stats_list( $wp_themes ) {
  $html = "";

  $html .= "<table class='widefat' cellspacing='0'>";

  $html .= <<<html

<thead>
  <tr>
    <th class='row-title' style='width: 250px;'>Name</th>
    <th class='desc'>Description</th>
    <th class='num-blogs' style='width: 125px; text-align: right'>Number of Blogs</th>
  </tr>
</thead>

html;

  $html .= "<tbody>";

  foreach ( $wp_themes as $wp_theme ) {
    $html .= render_theme_stats_list_item( $wp_theme );
  }

  $html .= "</tbody><table>";

  return $html;
}

function render_theme_stats_list_item( $wp_theme ) {
  $html = "";

  $html .= <<<html

<tr>
  <td class='row-title'>{$wp_theme->Name}</td>
  <td class='desc'>{$wp_theme->Description}</td>
  <td class='num-blogs' style='text-align: right'>{$wp_theme->{"Number of Blogs"}}</td>
</tr>

html;

  return $html;
}

?>

<div class="wrap">
  <div id="icon-tools" class="icon32"><!-- --></div>
  <h2>Theme Stats</h2>
  <p><?php _e( "The list contains the currently available themes and the use statistics for each." ); ?></p>
  <?php echo render_theme_stats_list( $wp_themes ); ?>
</div>