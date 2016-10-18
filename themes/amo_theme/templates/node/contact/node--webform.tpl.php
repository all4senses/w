<div class="R mobile-title mobile-only">
  <h2 class="title"><?php print render($title); ?></h2>
  <a href="#" class="scroll-mobile">
    <?php print t("Scroll"); ?>
  </a>
</div>


<div class="contact-page">

  <h2 class="title desktop-only"><?php print render($title); ?></h2>
  
  <div id="gmap" class="right"></div>
  
  <div class="R coordinates mobile-only">
    <p>
      Château Les Amoureuses SCEA<br>
      Chemin de Vinsas<br>
      F-07700 BOURG-ST-ANDEOL<br>
    </p>
    <p>
      T. +33 (0)4 75 54 51 85<br>
      F. +33 (0)4 75 54 66 38
    </p>
    <!-- <p>contact@terresdesamoureuses.wine</p> -->
  </div>

  <div class="wrapper-form left scroll-mobile-to">
    
    <div class="R title-form mobile-only">
      <?php print t("Send <br> a message"); ?>
    </div>

    <?php print render($content['webform']); ?>

    <div class="R coordinates desktop-only">
      <p>
        Château Les Amoureuses SCEA<br>
        Chemin de Vinsas<br>
        F-07700 BOURG-ST-ANDEOL<br>
      </p>
      <p>
        T. +33 (0)4 75 54 51 85<br>
        F. +33 (0)4 75 54 66 38
      </p>
      <!-- <p>contact@terresdesamoureuses.wine</p> -->
    </div>

  </div>

  

</div>

</div> <?php // close .wrapper-content to move ajax-link outside ?>


<a href="<?php print $prev_col_link['link']; ?>" data-orientation="left" class="ajax-link ajax-link-nav ajax-link-left"><?php print $prev_col_link['label']; ?></a>


<div><?php // reopen a div for .wrapper-content ?>