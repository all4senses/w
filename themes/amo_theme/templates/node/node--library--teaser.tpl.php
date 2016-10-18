<div class="library library-teaser">

  <?php $image_url = !empty($content['field_library_image'][0]['#item']['uri']) ? $content['field_library_image'][0]['#item']['uri'] : ''; ?>
  <?php $image_url = file_create_url($image_url); ?>


  <a class="img gallery" href="<?php print $image_url; ?>"><?php print render($content['field_library_image']); ?></a>

  <div class="title"><?php print $title; ?></div>
  <div class="desc"><?php print render($content['field_library_description']); ?></div>
</div>