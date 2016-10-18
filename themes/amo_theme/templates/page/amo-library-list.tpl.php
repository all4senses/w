<h1 class="title desktop-only"><?php print t('Library'); ?></h1>
<div class="library-list">

  <div class="news-list-content">

    <div class="R mobile-title mobile-only">
      <h2 class="title"><?php print t('Library'); ?></h2>
      <a href="#" class="scroll-mobile black">
        <?php print t("Scroll"); ?>
      </a>
    </div>

    <div class="R scroll-mobile-to mobile-only"></div>
    <?php print render($images); ?>
  </div>

</div>


</div><?php // close .wrapper-content to move .ajax-link outside ?>


<a href="<?php print $prev_col['link']; ?>"
   data-orientation="left"
   class="ajax-link ajax-link-nav ajax-link-left">
  <?php print $prev_col['label']; ?>
</a>

<a href="<?php print $next_col['link']; ?>"
   data-orientation="right"
   class="ajax-link ajax-link-nav ajax-link-right">
  <?php print $next_col['label']; ?>
</a>


<div><?php // reopen a div for .wrapper-content ?>