<?php
/**
 * @file
 * amo_product.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function amo_product_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: menu-castle.
  $menus['menu-castle'] = array(
    'menu_name' => 'menu-castle',
    'title' => 'Produits Chateau les amoureuses',
    'description' => '',
    'language' => 'und',
    'i18n_mode' => 5,
  );
  // Exported menu: menu-land.
  $menus['menu-land'] = array(
    'menu_name' => 'menu-land',
    'title' => 'Produits Terres des amoureuses',
    'description' => '',
    'language' => 'und',
    'i18n_mode' => 5,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Produits Chateau les amoureuses');
  t('Produits Terres des amoureuses');

  return $menus;
}
