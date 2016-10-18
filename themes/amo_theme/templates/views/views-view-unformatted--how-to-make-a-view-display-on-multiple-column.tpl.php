<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="row-wrapper">
<?php $total_rows = count($rows); ?>
<?php $num_cols = 3; // How much cols do u want ? ?>
<?php $gap = ceil($total_rows / $num_cols);?>
<?php $i = 0; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php if ($i == 0): ?>
    <div class="rows-col">
  <?php elseif ($i%$gap == 0): ?>
    </div>
    <div class="rows-col">
  <?php endif; ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
  <?php $i++; ?>
<?php endforeach; ?>
  </div>
</div>