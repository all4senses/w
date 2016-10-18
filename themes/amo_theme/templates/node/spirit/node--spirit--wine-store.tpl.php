<div class="desktop-only spirit wine-store">
  <div class="wrapper">

    <h3 class="R title-domain" style="margin-bottom:<?php print $margin / 10; ?>rem">
      <?php print $title; ?>
    </h3>

    <div class="R body">
      <?php print render($content['body']); ?>
    </div>

  </div>

</div>



<?php // we display the page in mobile format ?>
<div class="spirit-mobile headline mobile-only" data-bg="<?php print $background_image; ?>">
  
  <div class="R image">
    <h3 class="title-domain">
      <?php print $title; ?>
    </h3>
    <a href="#" class="scroll-mobile">
      <?php print t("Scroll"); ?>
    </a>
  </div>

  <div class="R body scroll-mobile-to">
    <div class="mask"></div>
    <?php print render($content['body']); ?>

    <a href="#" class="button read-more">
      <?php print t('Read more') ?>
    </a>
  </div>
  
</div>







</div> <?php // close .wrapper-content to move ajax-link outside ?>

<a href="<?php print $prev_col_link['link']; ?>" data-orientation="left" class="ajax-link ajax-link-nav ajax-link-left"><?php print $prev_col_link['label']; ?></a>
<a href="<?php print $next_col_link['link']; ?>" data-orientation="right" class="ajax-link ajax-link-nav ajax-link-right"><?php print $next_col_link['label']; ?></a>


<div><?php // reopen a div for .wrapper-content ?>