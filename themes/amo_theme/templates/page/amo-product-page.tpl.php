</div> <?php // close .wrapper-content to move ajax-link outside ?>

<?php $orientation = $type === 'castle' ? 'bottom' : 'top'; ?>

<a href="<?php print $choice_link; ?>"
   data-orientation="top"
   class="mobile-only ajax-link ajax-link-nav ajax-link-top">
</a>

<div id="product-filter" class="desktop-only">
  <?php foreach($sort_links as $tid => $sort_link) : ?>
  <span class="prodfiltre-<?php print $tid; ?>">
    <a href="#" data-color="<?php print $tid; ?>">
      <span><span></span></span>
      <?php print $sort_link; ?>
    </a></span>
  <?php endforeach; ?>
</div>

<div id="products-wrapper" class="slideshow">
  <div class="cursor-hand desktop-only"></div>

  <div class="intro slide desktop-only">
    <div class="wrapper wrapper-content">
      <div class="intro-wrapper">


        <?php if ($type === 'castle'): ?>
          <div class="logo logo-chateau"></div>
          
          <div class="mobile-only mobile-title mobile-title-chateau">
            <div class="logo"></div>
            <a href="#" class="scroll-mobile">
              <?php print t("Scroll"); ?>
            </a>

          </div>

          <div class="paragraph">
            <?php print t('IGP COTEAUX DE L’ARDÈCHE - AOP CÔTES DU RHÔNE'); ?>
          </div>
        <?php endif; ?>

        <?php if ($type === 'land'): ?>
          <div class="logo logo-terre"></div>

          <div class="mobile-only mobile-title mobile-title-terre">
            <div class="logo"></div>
            <a href="#" class="scroll-mobile">
              <?php print t("Scroll"); ?>
            </a>
          </div>

          <div class="paragraph">
			<?php print t('Vin Made in France'); ?>
          </div>
        <?php endif; ?>

        <a href="#" class="button-discover">
          <?php print t('discover our wine'); ?>
        </a>
      </div>
    </div>
  </div>

  



  <div class="R intro-mobile mobile-only">
    <?php if ($type === 'castle'): ?>
      
      <div class="R mobile-title mobile-title-chateau">
        <div class="R logo"></div>
        <a href="#" class="scroll-mobile">
          <?php print t("Scroll"); ?>
        </a>
      </div>

      <div class="R paragraph">
        <?php print t('IGP COTEAUX DE L’ARDÈCHE - AOP CÔTES DU RHÔNE'); ?>
      </div>
    <?php endif; ?>

    <?php if ($type === 'land'): ?>

      <div class="R mobile-title mobile-title-terre">
        <div class="R logo"></div>
        <a href="#" class="scroll-mobile">
          <?php print t("Scroll"); ?>
        </a>
      </div>

      <div class="R paragraph">
		 <?php print t('Vin Made in France'); ?>
      </div>
    <?php endif; ?>
    
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
  





  <?php print render($products); ?>

</div>


<a href="<?php print $choice_link; ?>"
   data-orientation="<?php print $orientation; ?>"
   class="ajax-link ajax-link-back-<?php print $orientation; ?>">
</a>


<div><?php // reopen a div for .wrapper-content ?>

