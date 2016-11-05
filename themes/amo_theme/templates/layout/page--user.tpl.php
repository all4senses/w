<div id="page" class="page--user">
  <?php /*
  <header id="header">

    <a href="/" id="logo"></a>

    <?php print render($page['header']); ?>

  </header>
  */ ?>
  <div id="content" class="R" role="main">
    <?php

//    print render($tabs);

      $background_image = file_create_url(drupal_get_path('theme', 'amo') . '/dist/img/bg/bg-white.jpg');
      $style = empty($background_image) ? '' : ' style="background-image: url('.$background_image.'); opacity:1;"';

    ?>
    <div class="ajax-wrapper">
      <div class="bg-wrapper"<?php print $style; ?>></div>
      <div class="wrapper wrapper-content">
        <div class="R mobile-title mobile-only">
          <h2 class="title"><?php print t('Store'); ?></h2>
          <a href="#" class="scroll-mobile">
            <?php print t("Scroll"); ?>
          </a>
        </div>


        <div class="title desktop-only"><?php print t('Online Store'); ?></div>

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
        <?php print render($tabs); ?>

        <?php print render($page['content']); ?>

        <?php print $feed_icons; ?>
      </div>

    <?php
      $output['#prev_col'] = amo_navigation_get_next_type('boutique', TRUE);
      $output['#next_col'] = amo_navigation_get_next_type('boutique');
    ?>
      <a href="<?php print $output['#prev_col']['link']; ?>"
         data-orientation="left"
         class="ajax-link ajax-link-nav ajax-link-left black-link">
        <?php print $output['#prev_col']['label']; ?>
      </a>

      <a href="<?php print $output['#next_col']['link']; ?>"
         data-orientation="right"
         class="ajax-link ajax-link-nav ajax-link-right black-link">
        <?php print $output['#next_col']['label']; ?>
      </a>
      <div class="page-cart-bottom">
        <a href="#"><img src="http://<?php print $_SERVER['HTTP_HOST']; ?>/sites/all/themes/amo_theme/dist/img/layout/contact-service-client.jpg"></a>
        <a href="#"><img src="http://<?php print $_SERVER['HTTP_HOST']; ?>/sites/all/themes/amo_theme/dist/img/layout/mode-paiements.jpg"></a>
      </div>

    <?php print render($nav_map); ?>
    </div>


    <?php include './sites/all/themes/amo_theme/templates/layout/menu.tpl.php'; ?>

  </div>


  <?php #print render($page['footer']); ?>

</div>
<?php print render($page['bottom']); ?>
