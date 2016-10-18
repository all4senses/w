<?php

/**
 * Implements hook_preprocess().
 */
function gd_theme_preprocess_node_spirit(&$variables) {
  $variables['margin'] = 0;
  if(!empty($variables['field_spirit_margin'][0]['value'])) {
    $variables['margin'] = $variables['field_spirit_margin'][0]['value'];
  }

  if($variables['view_mode'] == "full") {
    $menu_spirit = menu_tree('menu-spirit');

    // Unset the first element of the menu
    // $main = array_shift($menu_spirit);
    $main = reset($menu_spirit);

    if(current_path() == "l-esprit") {
      foreach($menu_spirit as $key => $value) {
        $menu_spirit[$key]['#attributes']['class'][] = 'active';
        break;
      }
    }

    $orientation = 'top';
    foreach($menu_spirit as $key => $value) {
      if(is_numeric($key)) {
        $menu_spirit[$key]['#attributes']['class'][] = 'ajax-link';
        if('node/'.$variables['nid'] == $value['#original_link']['link_path']) {
          $orientation = 'bottom';
          continue;
        }
        $menu_spirit[$key]['#attributes']['data-orientation'] = $orientation;
      }
    }

    // Set the menu of the colon
    $variables['menu_spirit'] = $menu_spirit;

    $variables['image_uri'] = '';
    if(!empty($variables['field_spirit_image'][0])) {
      $variables['image_uri'] = file_create_url($variables['field_spirit_image'][0]['uri']);
    }

    // Get the next col link
    $variables['next_col_link'] = amo_navigation_get_next_type('spirit');

    // Get the previous spirit link
    $prev_menu_link = amo_navigation_get_next('spirit', $variables['nid'], TRUE, TRUE);
    $variables['prev_spirit_link'] = '';
    if(!empty($prev_menu_link)) {
      $variables['prev_spirit_link'] = url(drupal_get_path_alias($prev_menu_link['link_path']), array('alias' => TRUE));
    }

    // Get the next spirit link
    $next_menu_link = amo_navigation_get_next('spirit', $variables['nid'], TRUE, FALSE);
    $variables['next_spirit_link'] = '';
    if(!empty($next_menu_link)) {
      $variables['next_spirit_link'] = url(drupal_get_path_alias($next_menu_link['link_path']), array('alias' => TRUE));
    }

    // Precise if it is the main page of the col
    $variables['main'] = FALSE;
    $main = explode('/', $main['#original_link']['link_path']);
    if($variables['nid'] == end($main)) {
      $variables['main'] = TRUE;

      $variables['other_spirits'] = array();
      $other_spirits = array();
      foreach($menu_spirit as $link) {
        if(isset($link['#original_link']['link_path'])) {
          $nid = explode('/', $link['#original_link']['link_path']);
          $nid = end($nid);
          if(is_numeric($nid)) {
            $other_spirits[] = $nid;
          }
        }
      }

      array_shift($other_spirits);
      $other_spirits = node_load_multiple($other_spirits);
      if(!empty($other_spirits)) {
        $other_spirits = entity_view('node', $other_spirits ,'mobile');
        $variables['other_spirits'] = $other_spirits;
      }

    }
  }
  elseif($variables['view_mode'] == "wine_store") {
    // Get the prev col link
    $variables['prev_col_link'] = amo_navigation_get_next_type('wine_store', TRUE);
    // Get the next col link
    $variables['next_col_link'] = amo_navigation_get_next_type('wine_store');
  }

  $variables['background_image'] = '';
  if(isset($variables['field_mobile_image'][0]['uri'])) {
    $variables['background_image'] = file_create_url($variables['field_mobile_image'][0]['uri']);
  }
}