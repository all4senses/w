<?php
/**
 * @file
 * amo_ct_spirit.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function amo_ct_spirit_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: menu-spirit.
  $menus['menu-spirit'] = array(
    'menu_name' => 'menu-spirit',
    'title' => 'Spirit',
    'description' => '',
    'language' => 'und',
    'i18n_mode' => 5,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Spirit');

  return $menus;
}
