<div class="product teaser"><?php  // dpm($node); ?>
  <?php   
  $path = drupal_get_path('theme', 'amo_theme');
  $link_img = $node->field_product_image['und'][0]['uri'];
  print "<img src=". image_style_url('product-list',  $link_img) . " />"; ?>
  <h1 class="product-title">
    <?php print $title; ?>
  </h1>
  <span class="price-product"><?php print $node->field_product_price['und'][0]['value']; ?></span>
  <div class="text">
    <?php print render($body[0]['summary']); ?>
  </div>

</div>

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