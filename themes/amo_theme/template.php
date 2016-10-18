<?php

function amo_form_element_label(&$variables) {
  $element = $variables['element'];
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // If title and required marker are both empty, output no label.
  if ((!isset($element['#title']) || $element['#title'] === '') && empty($element['#required'])) {
    return '';
  }

  // If the element is required, a required marker is appended to the label.
  $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';

  $title = filter_xss_admin($element['#title']);

  $attributes = array();
  // Style the label as class option to display inline with the element.
  if ($element['#title_display'] == 'after') {
    $attributes['class'] = 'option';
  }
  // Show label only to screen readers to avoid disruption in visual flows.
  elseif ($element['#title_display'] == 'invisible') {
    $attributes['class'] = 'element-invisible';
  }

  if (!empty($element['#id'])) {
    $attributes['for'] = $element['#id'];
  }

  $label_prefix = !empty($element['#label_prefix']) ? $element['#label_prefix'] : '';
  $label_suffix = !empty($element['#label_suffix']) ? $element['#label_suffix'] : '';

  // The leading whitespace helps visually separate fields from inline labels.
  return ' <label' . drupal_attributes($attributes) . '>' . $t('!label_prefix !title !required !label_suffix', array('!label_prefix' => $label_prefix, '!title' => $title, '!required' => $required, '!label_suffix' => $label_suffix)) . "</label>\n";
}


/**
* Implements hook_html_head_alter().
* Hide Drupal from bot
*/
function amo_html_head_alter(&$head_elements) {

  if (isset($head_elements['metatag_generator_0'])) {
    unset($head_elements['metatag_generator_0']);
  }
  if (isset($head_elements['system_meta_generator'])) {
    unset($head_elements['system_meta_generator']);
  }
}
