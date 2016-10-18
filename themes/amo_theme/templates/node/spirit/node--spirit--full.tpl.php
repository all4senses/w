<div class="desktop-only spirit<?php print $main ? ' spirit-main' : ''; ?>">
  <div class="wrapper">

    <h3 class="title-domain" style="margin-bottom:<?php print $margin / 10; ?>rem">
      <?php print t("The domain"); ?>
    </h3>

    <div class="R title">
      <?php print $title; ?>
    </div>

    <div class="R body">
      <?php print render($content['body']); ?>
    </div>

    <div class="menu menu-spirit">
      <?php print render($menu_spirit); ?>
    </div>
  </div>

</div>



<?php // all spirit page for mobile ?>
<div id="all-spirit-page" class="R mobile-only">
  
  <?php // first we display the first (current) spirit page in mobile format ?>
  <div class="spirit-mobile headline" data-bg="<?php print $background_image; ?>">
    
    <div class="R image">
      <h3 class="title-domain">
        <?php print t("The domain"); ?>
      </h3>
      <a href="#" class="scroll-mobile">
        <?php print t("Scroll"); ?>
      </a>
    </div>

    <div class="R body">
      <div class="mask"></div>
      <?php print render($content['body']); ?>

      <a href="#" class="button read-more">
        <?php print t('Read more') ?>
      </a>
    </div>
    
  </div>
  
  <?php // then we load all remaining spirit pages 
    if(!empty($other_spirits)) print render($other_spirits);
  ?>
</div>



</div> <?php // close .wrapper-content to move ajax-link outside ?>


<a href="<?php print $next_col_link['link']; ?>" data-orientation="right" class="ajax-link ajax-link-nav ajax-link-right"><?php print $next_col_link['label']; ?></a>

<?php if(!empty($prev_spirit_link)) : ?>
  <a href="<?php print $prev_spirit_link; ?>" data-orientation="top" class="ajax-link ajax-link-prev"></a>
<?php endif; ?>
<?php if(!empty($next_spirit_link)) : ?>
  <a href="<?php print $next_spirit_link; ?>" data-orientation="bottom" class="ajax-link ajax-link-next"></a>
<?php endif; ?>


<div><?php // reopen a div for .wrapper-content ?>