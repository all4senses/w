<div class="page-news">

  <div class="title desktop-only"><?php print t('Our news'); ?></div>
  
  <div class="R mobile-title mobile-only">
    <h2 class="title"><?php print t('Our news'); ?></h2>
    <a href="#" class="scroll-mobile">
      <?php print t("Scroll"); ?>
    </a>
  </div>

  <div class="menu-spirit menu-news desktop-only">
    <ul class="menu">
      <?php

      $orientation = 'top';
      foreach($filter as $link) :

        if($link['active']) $orientation = 'bottom';
        ?>
        <li class="<?php print $link['active'] ? ' is-active' : '';?>">
          <a href="<?php print $link['link']; ?>" class="ajax-link" data-orientation="<?php print $orientation; ?>">
            <?php print $link['label']; ?>
          </a>
        </li>
      <?php endforeach;

      // Custom link to social page ?>
      <li class="">
        <a href="<?php print url("actualites/social"); ?>" class="ajax-link" data-orientation="bottom">
          <?php print t("Social network"); ?>
        </a>
      </li>
    </ul>
  </div>

  <div class="R news full scroll-mobile-to">

    <a class="ajax-link close" data-orientation="top" href="<?php print url('actualites') ?>"></a>

    <div class="slideshow news-slideshow">
      <?php print render($images); ?>
    </div>
    <div class="news-content right">
      <h1 class="news-title"><?php print $title; ?></h1>

      <div class="R date">
        <?php
        $date = new DateObject();
        $date->setTimestamp($created);
        print date_format_date($date, 'custom', 'd F Y');
        ?>
      </div>

      <div class="R body">
        <?php print render($content['body']); ?>
      </div>

      <div class="R article-link">
        <?php print render($content['field_news_link']); ?>
      </div>
    </div>

  </div>
</div>
