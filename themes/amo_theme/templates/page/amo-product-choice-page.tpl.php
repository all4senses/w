</div> <?php // close .wrapper-content to move outside ?>

<div class="product-choice main">

  <div class="left half col col-castle">

    <a href="<?php print $castle_link; ?>"
       data-orientation="top"
       class="ajax-link ajax-link-prev">
    </a>

  </div>

  <div class="right half col col-land">

    <a href="<?php print $land_link; ?>"
       data-orientation="bottom"
       class="ajax-link ajax-link-next">
    </a>

  </div>

</div>


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