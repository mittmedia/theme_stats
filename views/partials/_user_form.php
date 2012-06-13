<?php
  global $user;

  $form_content = array(
    'ID' => 'text',
    'user_email' => 'text',
    'user_nicename' => 'textarea'
  );

  $form_content .= \WpMvc\FormHelper::render_form( $user, $form_content );
?>