<?php

function amo_ct_spirit_admin_wine_store_form($form, &$form_state) {
  $default_fr = variable_get('amo_wine_store_fr', '');
  $default_en = variable_get('amo_wine_store_en', '');

  $query = db_select('node', 'n');
  $query->addField('n', 'nid');
  $query->addField('n', 'title');
  $query->condition('n.type', 'spirit');
  $options = $query->execute()->fetchAllKeyed(0,1);

  $form['fr'] = array(
    '#type' => 'select',
    '#title' => t("Page wine boutique pour la version française"),
    '#options' => $options,
    '#default_value' => $default_fr,
  );

  $form['en'] = array(
    '#type' => 'select',
    '#title' => t("Page wine boutique pour la version anglaise"),
    '#options' => $options,
    '#default_value' => $default_en,
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Save',
  );

  return $form;
}

function amo_ct_spirit_admin_wine_store_form_submit($form, &$form_state) {
  variable_set('amo_wine_store_fr', $form_state['values']['fr']);
  variable_set('amo_wine_store_en', $form_state['values']['en']);
}