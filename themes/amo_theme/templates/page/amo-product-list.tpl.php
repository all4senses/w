<div class="product-list">

  <div class="R mobile-title mobile-only">
    <h2 class="title"><?php print t('Store'); ?></h2>
    <a href="#" class="scroll-mobile">
      <?php print t("Scroll"); ?>
    </a>
  </div>
 

  <div class="title desktop-only"><?php print t('Online Store'); ?></div>

  <?php 
  
  $filter_links = array();
  $type_chateau = array('castle' => 'Chateau les amoureuses', 'land' => 'Terres des amoureuses');
  foreach($type_chateau as $tid => $name) {
    $filter_links[$tid] = array('vocabulary' => 'type_chateau', 'term_name' => $name);
  }
  $vocabs = array(/*'type_chateau',*/ 'color');
  foreach ($vocabs as $vocab_name) {
    $vocab = taxonomy_vocabulary_machine_name_load($vocab_name);
    if(!empty($vocab)) {
      $terms = taxonomy_get_tree($vocab->vid);
      foreach($terms as $term) {
        $filter_links[$term->tid] = array('vocabulary' => $vocab_name, 'term_name' => $term->name);
      }
    }
  }
  
  ?>
  
  <div id="product-filter-boutique" class="desktop-only">
    <?php foreach($filter_links as $tid => $filter_link) : ?>
    <span class="prodfiltre-<?php print $tid; ?>">
      <a href="#" data-color="<?php print ($filter_link['vocabulary'] == 'color' ? $tid : ''); ?>" data-chateau="<?php print ($filter_link['vocabulary'] == 'type_chateau' ? $tid : ''); ?>">
        <span><span></span></span>
        <?php print $filter_link['term_name']; ?>
      </a></span>
    <?php endforeach; ?>
  </div>
  
  <?php /*
  <div id="product-filter-boutique" class="desktop-only">
    <?php foreach($filter_links as $tid => $filter_link) : ?>
    <span class="prodfiltre-<?php print $tid; ?>">
      <a href="#" data-color="<?php print $tid; ?>">
        <span><span></span></span>
        <?php print $filter_link; ?>
      </a></span>
    <?php endforeach; ?>
  </div>
  */ ?>

  <div class="product-list-wrapper scroll-mobile-to">
    <div class="wrapper">
      
      <div class="product-list-content">
        
        <?php print render($products); ?>
      </div>
    </div>
   
  </div>


</div>


</div><?php // close .wrapper-content to move .ajax-link outside ?>

<?php /**/ ?>
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


<div><?php // reopen a div for .wrapper-content ?>