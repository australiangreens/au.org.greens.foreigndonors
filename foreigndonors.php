<?php

require_once 'foreigndonors.civix.php';
use CRM_Foreigndonors_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function foreigndonors_civicrm_config(&$config) {
  _foreigndonors_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function foreigndonors_civicrm_xmlMenu(&$files) {
  _foreigndonors_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function foreigndonors_civicrm_install() {
  _foreigndonors_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function foreigndonors_civicrm_postInstall() {
  _foreigndonors_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function foreigndonors_civicrm_uninstall() {
  _foreigndonors_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function foreigndonors_civicrm_enable() {
  _foreigndonors_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function foreigndonors_civicrm_disable() {
  _foreigndonors_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function foreigndonors_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _foreigndonors_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function foreigndonors_civicrm_managed(&$entities) {
  _foreigndonors_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function foreigndonors_civicrm_caseTypes(&$caseTypes) {
  _foreigndonors_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function foreigndonors_civicrm_angularModules(&$angularModules) {
  _foreigndonors_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function foreigndonors_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _foreigndonors_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function foreigndonors_civicrm_entityTypes(&$entityTypes) {
  _foreigndonors_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function foreigndonors_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function foreigndonors_civicrm_navigationMenu(&$menu) {
  _foreigndonors_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _foreigndonors_civix_navigationMenu($menu);
} // */

function foreigndonors_civicrm_alterEntitySettingsFolders(&$folders) {
  static $configured = FALSE;
  if ($configured) {
    return;
  }
  $configured = TRUE;

  $extRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR;
  $extDir = $extRoot . 'settings';
  if (!in_array($extDir, $folders)) {
    $folders[] = $extDir;
  }
}

function foreigndonors_civicrm_buildForm($formName, &$form) {
  if ($formName == 'CRM_Contribute_Form_Contribution_Main' || $formName == 'CRM_Event_Form_Registration_Register') {
    // If the form doesn't have the setting ticked, we don't need to do anything
    if ($formName == 'CRM_Contribute_Form_Contribution_Main' && ! _foreigndonors_checkEnabled($form, 'contribution_page')) {
        return;
    }
    if ($formName == 'CRM_Event_Form_Registration_Register' && ! _foreigndonors_checkEnabled($form, 'event')) {
        return;
    }
    drupal_set_message('The check is enabled for this form');

    // Add the checkbox to the public form
    $form->add('advcheckbox', 'foreigndonor', ts('I affirm I am not a foreign donor'));
    $form->addRule('foreigndonor', ts('You must affirm that you are not a foreign donor'), 'required');
    $templatePath = realpath(dirname(__FILE__) . '/templates');
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "{$templatePath}/foreigndonors.tpl",
    ));
    return;
  }
}

function foreigndonors_civicrm_post($op, $objectName, $id, &$params) {
  if ($objectName == 'Contribution' && $op == 'create') {
    // Check if the related form (event or contribution) has the foreign donor check enabled
    watchdog('foreigndonors', 'contrib payload: %payload', array('%payload' => print_r($params, TRUE)), WATCHDOG_NOTICE);
    $result = civicrm_api3('Contribution', 'get', array(
      'return' => ['contribution_page_id'],
      'id' => $id,
    ));
    watchdog('foreigndonors', 'API call: %id --> %result', array('%id' => $id, '%result' => print_r($result, TRUE)), WATCHDOG_NOTICE);
  }
}

function _foreigndonors_checkEnabled($form, $type) {
  $formId = $form->get('id');
  $result = civicrm_api3('entity_setting', 'get', array(
    'entity_id' => $formId,
    'entity_type' => $type,
    'key' => 'au.org.greens.foreigndonors',
    'name' => 'foreign_donors_check',
  ));
  if (!empty($result['values'][$formId]['foreign_donors_check'])) {
    return 1;
  } else {
    return 0;
  }
}

function _foreigndonors_get_customFieldId() {
  $result = civicrm_api3('CustomField', 'get', array(
    'return' => 'id',
    'name' => 'Foreign_Donor_declaration_recorded',
  ));

  if (!empty($result['values']['id'])) {
    return $result['values']['id'];
  } else {
    return 0;
  }
}
