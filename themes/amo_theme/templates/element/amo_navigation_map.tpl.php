<div class="nav-map">

  <?php $line_nb = 0; ?>
  <?php foreach($lines as $cols) : ?>

    <div class="line line-<?php print $line_nb; ?>">

      <?php for($col_nb = 0 ; $col_nb <= $cols_max ; $col_nb++) : ?>

        <div class="col col-<?php print $col_nb; ?>">

          <?php if(isset($cols[$col_nb])) : ?>

            <?php $link = $cols[$col_nb]['link']; ?>
            <a class="ajax-link<?php print $link['active'] ? ' active' : ''?>" href="<?php print $link['url']; ?>"
            data-orientation="<?php print $link['orientation'] ?>"></a>

          <?php endif; ?>

        </div>

      <?php endfor; ?>

    </div>
    <?php $line_nb++; ?>

  <?php endforeach; ?>

</div>