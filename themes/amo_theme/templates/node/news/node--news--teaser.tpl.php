<div class="news teaser">


  <div class="date">
    <?php
    $date = new DateObject();
    $date->setTimestamp($created);
    print date_format_date($date, 'custom', 'd F Y');
    ?>
  </div>

  <h1 class="news-title">
    <?php print $title; ?>
  </h1>

  <div class="text">
    <?php print render($body[0]['summary']); ?>
  </div>

  <a href="<?php print url("node/$nid") ?>" class="ajax-link see" data-orientation="bottom"><?php print t("See"); ?></a>

</div>