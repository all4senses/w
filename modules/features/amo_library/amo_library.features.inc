<?php
/**
 * @file
 * amo_library.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function amo_library_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_image_default_styles().
 */
function amo_library_image_default_styles() {
  $styles = array();

  // Exported image style: phototeque.
  $styles['phototeque'] = array(
    'label' => 'phototeque',
    'effects' => array(
      1 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 408,
          'height' => 291,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function amo_library_node_info() {
  $items = array(
    'library' => array(
      'name' => t('Photo photothèque'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
