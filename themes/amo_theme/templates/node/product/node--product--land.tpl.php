<div class="product product-land color-<?php print $color_tid; ?> slide scroll-mobile-to">
  <div class="wrapper">
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
    <div class="R product-wrapper left">
      <div class="product-content right">
        <h2 class="product-title">
          <?php print $title; ?>
        </h2>
        <h3 class="product-subtitle desktop-only">
          <?php print render($content['field_product_subtitle']); ?>
        </h3>
        <div class="product-body">
          <?php print render($content['body']); ?>
        </div>
		<?php			
		if (empty($_SESSION['hostip_data'])) {$_SESSION['hostip_data'] = hostip_get_iptocountry_info();}
		if (trim($_SESSION['hostip_data']['countrycode']) != "DD"): 
		?>		
        <div class="R price">
          <div class="R label"><?php print t("Unit price"); ?></div>
          <div class="R unit-price"><?php print render($content['field_product_price']); ?></div>
        </div>
		<?php endif; ?>
        <div class="image mobile-only">
          <?php print render($content['field_product_image']); ?>
        </div>
        <div class="mobile-only detail"><span><?php print t("Details"); ?></span></div>
      </div>
      <div class="image desktop-only">
        <?php print render($content['field_product_image']); ?>
      </div>
        <div class="actions">
            <?php if(!empty($technical_link)) : ?>
              <a class="R technical-sheet" href="<?php print file_create_url($technical_link); ?>">
                <?php print t("Technical sheet"); ?>
              </a>
            <?php endif; ?>
			<?php			
		         if (empty($_SESSION['hostip_data'])) {$_SESSION['hostip_data'] = hostip_get_iptocountry_info();}
		         if (trim($_SESSION['hostip_data']['countrycode']) != "DD"): 
		       ?>
            <div class="add-to-cart-wrapper">
            <a class="R add-to-cart" href="#">
                <?php print t("Add to Cart"); ?>
            </a>
            <div class="add-to-cart-form-wrapper">
			<?php
				$nv = node_view($node, 'full', NULL);
				if(isset($nv['field_product_product'])){
					$out = '';
					foreach($nv['field_product_product']['#items'] as $item) {
						$qty = 1;
						$form_idp= commerce_cart_add_to_cart_form_id(array($item['product_id']));  
						$productp = commerce_product_load($item['product_id']);
						if(property_exists($productp,'field_min_qty')){$qty = $productp->field_min_qty['und'][0]['value'];}
						$line_itemp = commerce_product_line_item_new($productp, $qty);  
						$line_itemp->data['context']['product_ids'] = array($item['product_id']);
						$formp = drupal_get_form($form_idp, $line_itemp, TRUE, array());
						$qty_field = array(
							'#type' => 'hidden',
							'#value' => $qty,
							'#parents' => array
								(
									'0' => 'qty_step',
								),
							'#input' => '1',
							'#process' => array(
									'0' => 'ajax_process_form',
								),
							'#theme' => 'hidden',
							'#defaults_loaded' => '1',
							'#tree' => '',
							'#array_parents' => array(
									'0' => 'qty_step',
								),
							'#weight' => '0.008',
							'#processed' => '1',
							'#required' => '',
							'#attributes' => array(
								),
							'#title_display' => 'before',
							'#name' => 'qty_step',
							'#sorted' => '1'
						);
						$formp['qty_step'] = $qty_field;
						$price = '';
						if(isset($productp->commerce_price['und'][0]['original'])){
							$price = $productp->commerce_price['und'][0]['original']['amount']/100;
						}
						else {
							$price = $productp->commerce_price['und'][0]['amount']/100;
						}
						$out .= '<div class="add_to_cart_button_item">'.$productp->title.' ('. $price .' &euro;) X '  ;
						$out .= drupal_render($formp);   
						$out .= '</div>';
					}
					print $out;
				}
			?>
			</div>
            </div>
			<?php endif; ?>
        </div>
    </div>
  </div>
</div>
<style>
    .cart-summary-wrapper {
    background-color: #fff;
    color: #000;
    left: -321px;
    padding: 0 0 0 40px;
    position: absolute;
    text-align: center;
    top: 30px;
    width: 392px;
    z-index: 2147483647;
    border: solid 1px #fff;
    }
    .cart-summary-wrapper p {
        font-size: 1.4rem;
    }
    .cart-summary-wrapper .cart-summary-left a,
    .cart-summary-wrapper .cart-summary-left a:hover,
    .cart-summary-wrapper .cart-summary-left a:active {
        background-color: #000;
    color: #fff;
    display: block;
    font-size: 1.3rem;
    font-weight: bold;
    margin: 10px auto 0 auto;
    padding: 5px 0 6px;
    text-transform: uppercase;
    width: 100%;
    }
    .cart-summary-wrapper .cart-summary-left {
        float: left;
        width: 80%;
        padding: 15px 40px 0 0;
        display: none;
    }
    .cart-summary-wrapper .cart-summary-right {
        float: right;
    }
    .add-to-cart-form-wrapper { position: absolute;bottom: 0;right: 0;width: 500px; background-color: #fff;}
    .add-to-cart-form-wrapper .form-item-qty {     float: left;
    margin: 0;
    width: auto; }
    .add-to-cart-form-wrapper .form-item-qty label { width:  auto; color: #000; font-weight: bold;}
    .add-to-cart-form-wrapper .form-item-qty .form-text {
        float: left;
        height: 35px;
        padding: 0;
        text-align: center;
        width: 35px;
        color: #000;
        border: 1px solid #000;
    }
    .add-to-cart-form-wrapper .form-submit { float: left;
    font-size: 1.2rem;
    height: 30px;
    line-height: 1.2rem;
    margin: 0;
    padding: 0 10px;
    background-color: #000;
    border: none;
    }
    .add-to-cart-form-wrapper .form-submit:hover {
    background-color: #000;
    color:  #fff;
    }
.cf:before,
.cf:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}
.cf:after {
    clear: both;
}
</style>
<?php 

