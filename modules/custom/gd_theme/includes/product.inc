<?php

/**
 * Implements hook_preprocess().
 */
function gd_theme_preprocess_node_product(&$variables) {
  $variables['technical_link'] = '';
  $variables['pdf_link'] = '';
  
  $node = $variables['node'];

  $wrapper = entity_metadata_wrapper('node', $node);
  $type = $wrapper->field_product_type->value();

  $variables['view_mode'] = $type;

  $variables['color_tid'] = '';
  if($type == 'land') {
    if(!empty($variables['field_product_color'][LANGUAGE_NONE][0]['tid'])) {
      $variables['color_tid'] = $variables['field_product_color'][LANGUAGE_NONE][0]['tid'];
    }
    else if(!empty($variables['field_product_color'][0]['tid'])) {
      $variables['color_tid'] = $variables['field_product_color'][0]['tid'];
    }
  }
  else {
    if(!empty($variables['field_product_chateau_type'][LANGUAGE_NONE][0]['tid'])) {
      $variables['color_tid'] = $variables['field_product_chateau_type'][LANGUAGE_NONE][0]['tid'];
    }
    else if(!empty($variables['field_product_chateau_type'][0]['tid'])) {
      $variables['color_tid'] = $variables['field_product_chateau_type'][0]['tid'];
    }
  }


  if(!empty($variables['field_product_technical'])) {
    $file = reset($variables['field_product_technical']);
    $variables['technical_link'] = file_create_url($file['uri']);
  }

  if(!empty($variables['field_product_pdf'])) {
    $file = reset($variables['field_product_pdf']);
    $variables['pdf_link'] = file_create_url($file['uri']);
  }

 /* $prev_link = amo_navigation_get_next($type, $variables['nid'], TRUE, TRUE);
  if(!empty($prev_link)) {
    $prev_link = explode('/', $prev_link['link_path']);
    $prev_link = end($prev_link);
    $prev_link = url('our-wine/' . $type . '/' . $prev_link);
  }
  $variables['prev_product_link'] = $prev_link;

  $next_link = amo_navigation_get_next($type, $variables['nid'], TRUE);
  if(!empty($next_link)) {
    $next_link = explode('/', $next_link['link_path']);
    $next_link = end($next_link);
    $next_link = url('our-wine/' . $type . '/' . $next_link);
  }
  $variables['next_product_link'] = $next_link;*/
}