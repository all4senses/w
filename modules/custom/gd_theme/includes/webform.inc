<?php

/**
 * Implements hook_preprocess().
 */
function gd_theme_preprocess_node_webform(&$variables) {
  // Get the prev col link
  $variables['prev_col_link'] = amo_navigation_get_next_type('contact', TRUE);
}