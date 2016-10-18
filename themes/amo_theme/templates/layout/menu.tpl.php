    <a id="menu-open" href="#">MENU</a>

    <div id="side-menu">
      <a class="close"></a>

      <div class="R menu-link homepage">
        <a class="R main-col ajax-link" data-orientation="right" href="<?php print url(''); ?>"><?php print t("Home"); ?></a>
      </div>

      <div class="R menu-link domain">
        <a class="R main-col ajax-link" data-orientation="right" href="<?php print url('l-esprit'); ?>"><?php print t("The Domain"); ?></a>
        <div class="R sub-menu"><?php print render($menu_spirit); ?></div>
      </div>

      <div class="R menu-link wine">
        <a class="R main-col ajax-link" data-orientation="right" href="<?php print url('vins'); ?>"><?php print t("Our Wines"); ?></a>
        <div class="R sub-menu">
          <a class="R ajax-link" data-orientation="right" href="<?php print url('vins/chateau-les-amoureuses'); ?>" data-orientation="right"><?php print t("CHATEAU LES AMOUREUSES"); ?></a>
          <a class="R ajax-link" data-orientation="right" href="<?php print url('vins/terres-des-amoureuses'); ?>" data-orientation="right"><?php print t("TERRES DES AMOUREUSES"); ?></a>
        </div>

      </div>

      <div class="R menu-link wine-store">
        <a class="R main-col ajax-link" data-orientation="right" href="<?php print url('wine-boutique'); ?>"><?php print t("The Tasting Cellar"); ?></a>
      </div>

      <div class="R menu-link news">
        <a class="R main-col ajax-link" data-orientation="right" href="<?php print url('actualites'); ?>"><?php print t("Our News"); ?></a>
      </div>
	  
      <div class="R menu-link news">
        <a class="R main-col ajax-link" data-orientation="right" href="<?php print url('boutique'); ?>"><?php print t("Store"); ?></a>
      </div>	  

      <div class="R menu-link photo">
        <a class="R main-col ajax-link" data-orientation="right" href="<?php print url('phototheque'); ?>"><?php print t("Photothèque"); ?></a>
      </div>


      <div class="R social-links">
        <a href="https://www.facebook.com/lesamoureuses07" class="fb"></a>
        <a href="https://twitter.com/LesAmoureuses07" class="tw"></a>
        <a href="https://www.instagram.com/les_amoureuses07/" class="in"></a>
        <a href="https://www.youtube.com/channel/UChyqDd0Gs4hUwfEP1eVmnxg" class="yt"></a>
      </div>

      <a href="/contact" class="R ajax-link contact menu-link" data-orientation="right">
        Contact
      </a>

      <div class="R menu-legal">
        <a href="<?php print url('node/29'); ?>" class="ajax-link" data-orientation="right">
          Mentions légales
        </a>
        <a href="<?php print url('node/30'); ?>" class="ajax-link credit" data-orientation="right">
          Crédits
        </a>
        <span class="copyright desktop-only">©2016 Les amoureuses</span>
      </div>

      <div class="R legal">
        <?php print t('Alcohol abuse is bad for your health, please consume in moderation'); ?>
      </div>

    </div>
