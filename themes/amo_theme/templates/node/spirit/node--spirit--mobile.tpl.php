<div class="spirit-mobile scroll-mobile-to" data-bg="<?php print $background_image; ?>">
  
  <div class="R image">
    <div class="R title-domain">
      <?php print $title; ?>
    </div>
  </div>
  
  
  <div class="R body">
    <div class="mask"></div>
    <?php print render($content['body']); ?>

    <a href="#" class="button read-more">
      <?php print t('Read more') ?>
    </a>
  </div>
</div>