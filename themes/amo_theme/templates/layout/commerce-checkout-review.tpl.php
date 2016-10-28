<div id="page" class="layout----commerce-checkout-review.tpl.php">
  <div id="content" class="R" role="main">
    <?php print render($tabs); ?>
    <div class="ajax-wrapper">
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
        
        <h1><?php print t('Online Store'); ?></h1>
        <ul id="step-checkout">
		   <li>Panier</li>
		   <li>Adresse</li>
		   <li class="active">Résumé</li>
		   <li>Paiement</li>		   
		</ul>
        <?php print render($page['content']); ?>

        <?php print $feed_icons; ?>
      </div>

      <?php print render($nav_map); ?>
    </div>

    <?php include './sites/all/themes/amo_theme/templates/layout/menu.tpl.php'; ?>

  </div>


  <?php #print render($page['footer']); ?>

</div>


<a href="/actualites"
   data-orientation="left"
   class="ajax-link ajax-link-nav ajax-link-left black-link">
  actualites
</a>

<a href="/phototheque"
   data-orientation="right"
   class="ajax-link ajax-link-nav ajax-link-right black-link">
  phototheque
</a>


<?php print render($page['bottom']); ?>

<style>

    body.page-cart {
        background-color:  #fff;
    }
	
.view-commerce-cart-form
{
  margin-top: 2rem;
}	
	
	#step-checkout {
		list-style:none;
		width:100%;
		padding:0;
		margin:0;
		left:0;
        border-bottom:solid 1px #000;		
	}
	
	#step-checkout li{
		
		padding:15px 35px;	
        border:solid 1px #000;
        float:left;
        text-transform:uppercase;
        font-size:2.1rem;
        background:#000;
        color:#fff;	
        margin:0 15px;		
	}	
	
	#step-checkout li.active{	
        background:#fff;
        color:#000;	
        border-bottom:0;		
	}		
	
	
	 .black-link:hover, .black-link
{
  color: #000 !important;
  text-shadow:none;
} 
 
.page-cart #menu-open
{
  color:#000;	
}
	
	
	
	
</style>