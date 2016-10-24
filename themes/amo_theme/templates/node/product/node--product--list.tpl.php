<div class="product teaser" id="nid-<?php echo $node->nid; ?>">
  <?php   dpm($node); ?>
  <?php   
  $path = drupal_get_path('theme', 'amo_theme');
  $link_img = $node->field_product_image['und'][0]['uri'];
  print "<img src=". image_style_url('product-list',  $link_img) . " />"; ?>
  <h1 class="product-title">
    <?php print $title; ?>
  </h1>
  <span class="price-product"><?php print $node->field_product_price['und'][0]['value']; ?></span>
 
  
  <div class="product-teaser-hover">
    <h1 class="product-title">
      <?php 
        //print $title; 
        print l($title, 'node/' . $node->nid); 
      ?>
    </h1>
    <span class="price-product"><?php print $node->field_product_price['und'][0]['value']; ?></span>
    <div class="text">
      <?php print render($body['und'][0]['summary']); ?>
    </div>
    
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
                    $out .= '<div class="add_to_cart_button_item">'.drupal_render($formp);   // renders add to cart for product id of 7
                    $out .= $productp->title.' ('. $price .' &euro;) X '  ;
                    $out .= '</div>';
                  }
                  print $out;
                }
            ?>
        </div>
    </div>
    
    
  </div>
</div>

<!--
<style>

 .product-list .title {
  color:#000;
  float: left;
  margin: 5.5vh 0 5rem 0;
  font-weight: 200;
  font-size: 10rem;

  
 }
 
 .product-title {
   font-size: 1.8rem;
   display:block;
   padding:0.5rem 0;
 }
 
 .product.teaser .price-product{	 
   font-size: 1.8rem;
   display:block;
 } 
 
 .product.teaser
{
display: inline-block;
  width: 31rem;
  height: 45rem;
  text-align:center;
  margin-right: 3rem;
  padding-right: 1.8rem;
  padding-bottom: 2.8rem;
  padding-left: 1.8rem;
  padding-top: 2rem;
  
}

.product-list .product-list-wrapper .product-list-content
{
  width: 100%;
  position: relative;
  margin:0 auto;
} 

.product-list
{
  height: 100vh;
}
 
 .black-link:hover, .black-link
{
  color: #000 !important;
  text-shadow:none;
} 
 
.page-boutique #menu-open
{
  color:#000;	
}	

.page-boutique .nav-map .col a
{
  background-color: #000;
}
 
.page-boutique .nav-map .col a.active, .page-boutique .nav-map .col a:hover
{
  background-color: #bd1787;
} 
 
</style>
-->