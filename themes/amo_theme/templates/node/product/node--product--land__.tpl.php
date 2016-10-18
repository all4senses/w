<div class="product product-land color-<?php print $color_tid; ?> slide scroll-mobile-to">
  <div class="wrapper">

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

        <div class="R price">
          <div class="R label"><?php print t("Unit price"); ?></div>
          <div class="R unit-price"><?php print render($content['field_product_price']); ?></div>
        </div>

        <div class="image mobile-only">
          <?php print render($content['field_product_image']); ?>
        </div>
        <div class="mobile-only detail"><span><?php print t("Details"); ?></span></div>
      </div>
      
      <div class="image desktop-only">
        <?php print render($content['field_product_image']); ?>
      </div>

      <?php if(!empty($technical_link)) : ?>
        <div class="actions">

          <a class="R technical-sheet" href="<?php print file_create_url($technical_link); ?>">
            <?php print t("Technical sheet"); ?>
          </a>

 
        </div>
      <?php endif; ?>

    </div>

  </div>
</div>