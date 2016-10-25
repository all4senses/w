<div class="product-list">

  <div class="R mobile-title mobile-only">
    <h2 class="title"><?php print t('Store'); ?></h2>
    <a href="#" class="scroll-mobile">
      <?php print t("Scroll"); ?>
    </a>
  </div>
 

  <div class="title desktop-only"><?php print t('Online Store'); ?></div>

  <?php 
  $sort_links = array('Shato', 'Murlo', 'Red', 'Orange', 'Black');
  ?>
  <div id="product-filter" class="desktop-only">
    <?php foreach($sort_links as $tid => $sort_link) : ?>
    <span class="prodfiltre-<?php print $tid; ?>">
      <a href="#" data-color="<?php print $tid; ?>">
        <span><span></span></span>
        <?php print $sort_link; ?>
      </a></span>
    <?php endforeach; ?>
  </div>

  <div class="product-list-wrapper scroll-mobile-to">
    <div class="wrapper">
      
      <div class="product-list-content">
        
        <?php print render($products); ?>
      </div>
    </div>
   
  </div>


</div>


</div><?php // close .wrapper-content to move .ajax-link outside ?>

<?php /*
<a href="<?php print $prev_col['link']; ?>"
   data-orientation="left"
   class="ajax-link ajax-link-nav ajax-link-left black-link">
  <?php print $prev_col['label']; ?>
</a>

<a href="<?php print $next_col['link']; ?>"
   data-orientation="right"
   class="ajax-link ajax-link-nav ajax-link-right black-link">
  <?php print $next_col['label']; ?>
</a>
*/ ?>

<div><?php // reopen a div for .wrapper-content ?>