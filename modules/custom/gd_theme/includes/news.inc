<?php

/**
 * Implements hook_preprocess().
 */
function gd_theme_preprocess_node_news(&$variables) {
  $variables['field_background_image'][0]['#item']['uri'] = file_create_url(drupal_get_path('theme', 'amo') . '/dist/img/bg/news-bg.jpg');

  $variables['images'] = array();

  if(isset($variables['field_news_image'][LANGUAGE_NONE])) {
    $images = $variables['field_news_image'][LANGUAGE_NONE];
  }
  else {
    $images = $variables['field_news_image'];
  }
  foreach($images as $image) {
    $variables['images'][] = array(
      '#theme' => 'image_style',
      '#path' => $image['uri'],
      '#style_name' => 'medium',
      '#alt' => $image['alt'],
      '#title' => $image['title'],
      '#attributes' => array(
        'class' => array('slide'),
      )
    );
  }

  $taxo = taxonomy_vocabulary_machine_name_load('news_category');
  $taxo = taxonomy_get_tree($taxo->vid);

  $filter_menu = array(
    -1 => array(
      'link' => url('news'),
      'label' => t("All"),
      'active' => FALSE,
    )
  );

  foreach($taxo as $term) {
    $filter_menu[$term->tid] = array(
      'link' => url('news/site/' . $term->tid),
      'label' => $term->name,
      'active' => FALSE,
    );
  }

  $variables['filter'] = $filter_menu;
}