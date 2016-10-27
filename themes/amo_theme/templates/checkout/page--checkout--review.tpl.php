
<div id="page">
  <div id="content" class="R" role="main">
    <?php print render($tabs); ?>
    <div class="ajax-wrapper1">
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
		<div class="border-checkout"></div>		
        <?php print render($page['content']); ?>

        <?php print $feed_icons; ?>
      </div>

      <?php print render($nav_map); ?>
	  
	    <div class="page-cart-bottom">
		     <a href="#"><img src="http://<?php print $_SERVER['HTTP_HOST']; ?>/sites/all/themes/amo_theme/dist/img/layout/contact-service-client.jpg"></a>
		     <img src="http://<?php print $_SERVER['HTTP_HOST']; ?>/sites/all/themes/amo_theme/dist/img/layout/mode-paiements.jpg">
   	    </div>
	  
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
