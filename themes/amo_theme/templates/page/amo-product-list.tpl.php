
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
  
  <div id="product-filter-boutique-2" class="desktop-only filter-block" style="display: none;">
    <?php foreach($filter_links as $tid => $filter_link) : ?>
    <span class="prodfiltre-<?php print $tid; ?>">
      <a href="#" data-color="<?php print ($filter_link['vocabulary'] == 'color' ? $tid : ''); ?>" data-chateau="<?php print ($filter_link['vocabulary'] == 'type_chateau' ? $tid : ''); ?>">
        <span><span></span></span>
        <?php print $filter_link['term_name']; ?>
      </a></span>
    <?php endforeach; ?>
  </div>
  
  
  <ul id="product-filter-boutique" class="desktop-only filter-block" style="line-height: 7rem;">
    <a href="#" class="toggle-filter opened"><?php echo t('FILTER PAR'); ?></a>  
    <li class="filter-select-toggle">
      <ul>
        <?php foreach($filter_links as $tid => $filter_link) : ?>
        <li class="item prodfiltre-<?php print $tid; ?>" style="float: left; list-style-type: none; height: initial;">
          <a href="#" class="toggle-products" data-color="<?php print ($filter_link['vocabulary'] == 'color' ? $tid : ''); ?>" data-chateau="<?php print ($filter_link['vocabulary'] == 'type_chateau' ? $tid : ''); ?>">
            <span><span></span></span>
            <?php print $filter_link['term_name']; ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </li>
  </ul>
  
  
  <?php /*
  
  <div class="R intro-mobile mobile-only">
   
    <div class="product-filters-wrapper">
      <select class="product-filters" data-placeholder="<?php print t('FILTER BY:') ?>">
        <?php foreach($sort_links as $tid => $sort_link) : ?>
          <option value="">
            <?php print t('FILTER BY:') ?>
          </option>
          <option value="<?php print $tid; ?>" class="prodfiltre-<?php print $tid; ?>">
            <?php print $sort_link; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

  </div>
  
  */ ?>
  
  
  
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



<?php
		global $user;
		$uid = $user->uid;
		$quantity = 0;
		if ($order = commerce_cart_order_load($uid)) {
			$order_wrapper = entity_metadata_wrapper('commerce_order', $order);
			foreach ($order_wrapper->commerce_line_items as $delta => $line_item_wrapper) {
				if (in_array($line_item_wrapper->type->value(), commerce_product_line_item_types())) {
					$quantity += $line_item_wrapper->quantity->value();    
				}
			} 
		}
		if (empty($_SESSION['hostip_data'])) {$_SESSION['hostip_data'] = hostip_get_iptocountry_info();}
		if (trim($_SESSION['hostip_data']['countrycode']) != "DD"): 
	?>
      <div class="cart-summary-wrapper cf">
          <div class="cart-summary-left">
            <p><?php print ($quantity == 0 ? t('Vous avez <strong><span class="qty">0</span> article</strong> dans votre panier') : t('Vous avez <strong><span class="qty">'.$quantity.'</span> articles</strong> dans votre panier')); ?></p>
            <p><a href="#"><?php print t('Visitez La Boutique En Ligne'); ?></a></p>
            <p><a href="/cart"><?php print t('Finalisez Votre Commande'); ?></a></p>          
          </div>
          <div class="cart-summary-right">
            <a href="#" class="mon-panier"><img src="/sites/all/themes/amo_theme/dist/img/picto/mon_panier.png"></a>
          </div>
      </div>
	<?php endif; ?>


<?php /**/ ?>
<a href="<?php print $prev_col['link']; ?>"
   data-orientation="left"
   class="ajax-link ajax-link-nav ajax-link-left black-link amo-product-list">
  <?php print $prev_col['label']; ?>
</a>

<a href="<?php print $next_col['link']; ?>"
   data-orientation="right"
   class="ajax-link ajax-link-nav ajax-link-right black-link amo-product-list">
  <?php print $next_col['label']; ?>
</a>


<div><?php // reopen a div for .wrapper-content ?>