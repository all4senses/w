<div class="news-list">

  <div class="R mobile-title mobile-only">
    <h2 class="title"><?php print t('Our news'); ?></h2>
    <a href="#" class="scroll-mobile">
      <?php print t("Scroll"); ?>
    </a>
  </div>

  

  <div class="title desktop-only"><?php print t('Our news'); ?></div>

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

  <div class="news-list-wrapper scroll-mobile-to">
    <div class="wrapper">
      
      <div class="news-filters-wrapper mobile-only">
        <select class="news-filters" data-placeholder="<?php print t('FILTER BY:') ?>">
          <?php foreach($filter as $link) : ?>
            <option value="">
              <?php print t('FILTER BY:') ?>
            </option>
            <option value="<?php print $link['link']; ?>">
              <?php print $link['label']; ?>
            </option>
          <?php endforeach; ?>
          <option value="<?php print url("news/social"); ?>">
            <?php print t("Social network"); ?>
          </option>
        </select>
      </div>
      <div class="news-list-content">
        
        <?php print render($news); ?>
      </div>
    </div>

    
  </div>
  
  <div class="R social-follow">
    <a href="https://www.facebook.com/lesamoureuses07" class="fb" target="_blank">
      <span class="R follow"><?php print t('Follow us on') ?></span>
      <span class="R name">Facebook</span>
    </a>
    <a href="https://twitter.com/LesAmoureuses07" class="tw" target="_blank">
      <span class="R follow"><?php print t('Follow us on') ?></span>
      <span class="R name">Twitter</span>
    </a>
    <a href="https://www.instagram.com/les_amoureuses07/" class="in" target="_blank">
      <span class="R follow"><?php print t('Follow us on') ?></span>
      <span class="R name">Instagram</span>
    </a>
    <a href="https://www.youtube.com/channel/UChyqDd0Gs4hUwfEP1eVmnxg" class="yt" target="_blank">
      <span class="R follow"><?php print t('Follow us on') ?></span>
      <span class="R name">Youtube</span>
    </a>
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