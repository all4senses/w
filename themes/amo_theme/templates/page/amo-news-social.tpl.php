<div class="page-social">

  <div class="R mobile-title mobile-only">
    <h2 class="title"><?php print t('Our news'); ?></h2>
    <a href="#" class="scroll-mobile">
      <?php print t("Scroll"); ?>
    </a>
  </div>

  <div class="title desktop-only"><?php print t('Our news'); ?></div>

  <div class="menu-spirit menu-news desktop-only">
    <ul class="menu">
      <?php foreach($filter as $link) : ?>
        <li>
          <a href="<?php print $link['link']; ?>" class="ajax-link" data-orientation="top">
            <?php print $link['label']; ?>
          </a>
        </li>
      <?php endforeach; ?>

      <?php // Custom link to social page ?>
      <li class="is-active">
        <a href="<?php print url("news/social"); ?>" class="ajax-link" data-orientation="bottom">
          <?php print t("Social network"); ?>
        </a>
      </li>
    </ul>
  </div>


  <div class="news-list-wrapper">
    <div class="wrapper scroll-mobile-to">

      <div class="news-filters-wrapper  mobile-only">
        <select class="news-filters" data-placeholder="<?php print t('FILTER BY:') ?>">
          <?php foreach($filter as $link) : ?>
            <option value="">
              <?php print t('FILTER BY:') ?>
            </option>
            <option value="<?php print $link['link']; ?>">
              <?php print $link['label']; ?>
            </option>
          <?php endforeach; ?>
          <option selected value="<?php print url("news/social"); ?>">
            <?php print t("Social network"); ?>
          </option>
        </select>
      </div>

      <script src="//assets.juicer.io/embed.js"></script>
      <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css">

      <ul class="juicer-feed" data-feed-id="lesamoureuses"></ul>
      <?php /* data-after="updatePosts()"?>
      <script>
        function updatePosts() {
          var $ = jQuery;

          $('.juicer-feed li, .juicer-feed li *').off('mousedown')

          $('.juicer-feed li').on('mousedown', function(){
            var e = $(this);

            e.find('.j-meta nav a').click()
            window.open(e.find('.j-meta nav a').attr('href'))

          }).find('.j-meta nav a').on('click',function(){

            // return false;
          });
        }
      </script>
      <?php */ ?>
    </div>
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