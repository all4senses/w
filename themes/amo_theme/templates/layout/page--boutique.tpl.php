<div id="page">
    
    
    

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

	<?php
 $output['#prev_col'] = amo_navigation_get_next_type('boutique', TRUE);
  $output['#next_col'] = amo_navigation_get_next_type('boutique');

?>
<a href="<?php print $output['#prev_col']['link']; ?>"
   data-orientation="left"
   class="ajax-link ajax-link-nav ajax-link-left black-link">
  <?php print $output['#prev_col']['label']; ?>
</a>

<a href="<?php print ['#next_col']['link']; ?>"
   data-orientation="right"
   class="ajax-link ajax-link-nav ajax-link-right black-link">
  <?php print ['#next_col']['label']; ?>
</a>

    
    
  <?php /*
  <header id="header">

    <a href="/" id="logo"></a>

    <?php print render($page['header']); ?>

  </header>
  */ ?>
  <div id="content" class="R" role="main">
    <?php

    print render($tabs);

    $style = empty($background_image) ? '' : ' style="background-image: url('.$background_image.');"';
    ?>
    <div class="ajax-wrapper xyz">
      <div class="bg-wrapper"<?php print $style; ?>></div>
      <div class="wrapper wrapper-content">

        <?php print render($page['highlighted']); ?>
        <?php #print $breadcrumb; ?>
        <?php /*print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1 class="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix);*/ ?>
        <?php print $messages; ?>

        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>

        <?php print render($page['content']); ?>

        <?php print $feed_icons; ?>
      </div>

      <?php print render($nav_map); ?>
    </div>


    <?php include './sites/all/themes/amo_theme/templates/layout/menu.tpl.php'; ?>

  </div>


  <?php #print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
