<?php
/**
 * @file
 * amo_news.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function amo_news_taxonomy_default_vocabularies() {
  return array(
    'news_category' => array(
      'name' => 'Catégorie actualité',
      'machine_name' => 'news_category',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
      'language' => 'und',
      'i18n_mode' => 0,
    ),
  );
}
