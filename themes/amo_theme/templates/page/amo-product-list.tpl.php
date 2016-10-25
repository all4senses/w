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


<div class="product-list">

  <div class="R mobile-title mobile-only">
    <h2 class="title"><?php print t('Store'); ?></h2>
    <a href="#" class="scroll-mobile">
      <?php print t("Scroll"); ?>
    </a>
  </div>
 

  <div class="title desktop-only"><?php print t('Online Store'); ?></div>

  <div class="product-list-wrapper scroll-mobile-to">
    <div class="wrapper">
      
      <div class="product-list-content">
        
        <?php print render($products); ?>
      </div>
    </div>
   
  </div>


</div>


</div><?php // close .wrapper-content to move .ajax-link outside ?>


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