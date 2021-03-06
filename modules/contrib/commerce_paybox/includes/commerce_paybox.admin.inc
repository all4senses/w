<?php

/**
 * @file
 * Admin page callbacks for the Commerce Paybox module.
 */

/**
 * Builds and returns the Paybox settings form.
 *
 * @see commerce_paybox_settings_validate()
 *
 * @ingroup forms
 */
function commerce_paybox_settings($form, &$form_state) {
  $rule_commerce_payment_paybox = rules_config_load('commerce_payment_paybox_offsite');

  $cgi_module_path = variable_get('commerce_paybox_cgi_module_path', '');
  $hmac_key = variable_get('commerce_paybox_hmac_key', '');
  $hmac_alg = variable_get('commerce_paybox_hmac_alg', 'SHA512');
  if ($rule_commerce_payment_paybox->active) {
    $bin_path = DRUPAL_ROOT . '/' . $cgi_module_path;
    if (is_file($bin_path) && !is_executable($bin_path)) {
      $message = t('File "@path" is not executable. Please, check permissions on this file.', array('@path' => $cgi_module_path));
      drupal_set_message($message, 'error');
    }
  }
  else {
    $form['notice'] = array(
      '#type' => 'item',
      '#title' => t('Notice'),
      '#markup' => t('None of this settings will be used unless you activate the "Paybox System" payment method.'),
    );
  }

  // Paybox key.
  $form['commerce_paybox_hmac_key'] = array(
    '#type' => 'textfield',
    '#size' => '128',
    '#title' => t('Paybox private key'),
    '#description' => t("Private key generated on paybox's admin interface"),
    '#default_value' => $hmac_key,
  );

  // Paybox key's algorithm.
  $form['commerce_paybox_hmac_alg'] = array(
    '#type' => 'select',
    '#title' => t('Algorithm to use with HMAC method'),
    '#description' => t('Select algorithm from allowed list (SHA512 by default)'),
    '#options' => array(
      'SHA512' => 'SHA512',
      'SHA256' => 'SHA256',
      'SHA384' => 'SHA384',
      'RIPEMD160' => 'RIPEMD160',
      'SHA224' => 'SHA224',
      'MDC2' => 'MDC2',
    ),
    '#default' => $hmac_alg,
  );

  // Path to the CGI module.
  $form['commerce_paybox_cgi_module_path'] = array(
    '#type' => 'textfield',
    '#title' => t('Path to the Paybox System CGI module (if not using HMAC key, which is recommended)'),
    '#description' => t('Path to the Paybox CGI module, relative to the drupal root filesystem (ex : sites/all/libraries/paybox/module_debian64bits_noyau2-6-18_libc2-3-6.cgi).'),
    '#default_value' => $cgi_module_path,
  );

  // Path to the public key file.
  $form['commerce_paybox_pubkey_path'] = array(
    '#type' => 'textfield',
    '#required' => $rule_commerce_payment_paybox->active,
    '#title' => t('Path to the Paybox System public key file'),
    '#description' => t('Path to the Paybox public key file, relative to the drupal root filesystem (ex : sites/all/libraries/paybox/pubkey.pem).'),
    '#default_value' => variable_get('commerce_paybox_pubkey_path', ''),
  );

  $paybox_servers = variable_get('commerce_paybox_paybox_servers', array());
  $form['commerce_paybox_paybox_servers'] = array(
    '#type' => 'textarea',
    '#required' => $rule_commerce_payment_paybox->active,
    '#title' => t('Paybox IP addresses'),
    '#description' => t('Paybox payment servers IP addresses (one per line)'),
    '#default_value' => implode("\n", $paybox_servers),
  );

  return system_settings_form($form);
}

/**
 * Validates the Paybox settings form.
 */
function commerce_paybox_settings_validate($form, &$form_state) {
  $form_state['values']['commerce_paybox_cgi_module_path'] = trim($form_state['values']['commerce_paybox_cgi_module_path'], '/');

  $hmac_key = $form_state['values']['commerce_paybox_hmac_key'];
  if ($hmac_key == '') {
    $cgi_module_path = $form_state['values']['commerce_paybox_cgi_module_path'];
    if (!is_file(DRUPAL_ROOT . '/' . $cgi_module_path)) {
      $message = t('No HMAC key defined, which is the preferred method for paybox');
      form_set_error('commerce_paybox_hmac_key', $message);
      $message = t('File "@path" could not be found on the server.', array('@path' => $cgi_module_path));
      form_set_error('commerce_paybox_cgi_module_path', $message);
    }
  }

  $pubkey_path = $form_state['values']['commerce_paybox_pubkey_path'];
  if (!is_file(DRUPAL_ROOT . '/' . $pubkey_path)) {
    $message = t('File "@path" could not be found on the server.', array('@path' => $pubkey_path));
    form_set_error('commerce_paybox_pubkey_path', $message);
  }

  $form_state['values']['commerce_paybox_paybox_servers'] = array_map('trim', explode("\n", $form_state['values']['commerce_paybox_paybox_servers']));
}
