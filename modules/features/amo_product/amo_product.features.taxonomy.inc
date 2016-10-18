<?php
/**
 * @file
 * amo_product.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function amo_product_taxonomy_default_vocabularies() {
  return array(
    'color' => array(
      'name' => 'Color',
      'machine_name' => 'color',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
      'language' => 'und',
      'i18n_mode' => 1,
    ),
    'type_chateau' => array(
      'name' => 'Type chateau',
      'machine_name' => 'type_chateau',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
      'language' => 'und',
      'i18n_mode' => 0,
    ),
  );
}
