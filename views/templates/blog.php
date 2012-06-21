<?php $blog = $template_object; ?>

<tr>
  <td class='row-title'><?php echo $blog->options->current_theme->option_value; ?></td>
  <td class='desc'><?php echo $blog->options->blogname->option_value; ?></td>
  <td class='num-blogs' style='text-align: right'><?php echo $blog->options->admin_email->option_value; ?></td>
</tr>
