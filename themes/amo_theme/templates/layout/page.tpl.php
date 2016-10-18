<div id="page">
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
    <div class="ajax-wrapper">
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
