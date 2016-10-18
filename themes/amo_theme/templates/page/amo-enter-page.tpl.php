<?php

?>
</div>
<div id="video-bg">
  <video loop autoplay>
    <source src="/sites/all/themes/amo_theme/dist/bg.mp4">
  </video>
</div>
<div class="wrapper wrapper-content">

  <div class="form">
    <div class="logos">
      <a href="<?php print url('vins/terres-des-amoureuses'); ?>"><div class="logo logo-terre"></div></a>
      <a href="<?php print url('vins/chateau-les-amoureuses'); ?>"><div class="logo logo-chateau"></div></a>
    </div>

    <?php echo render($form); ?>

  </div>

</div>

<div class="evin"><?php print t('Alcohol abuse is bad for your health, please consume in moderation.'); ?></div>

<a href="<?php print 'l-esprit'; ?>" data-orientation="right" class="ajax-link ajax-link-nav ajax-link-right"><?php print t('The domain'); ?></a>


<div>