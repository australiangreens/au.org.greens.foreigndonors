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
    $formId = $form->get('id');

    // Get domain ID
    // Necessary to modify text for QLD domain
    // and add prohibited checkbox for NSW and ACT domains
    $domainId = CRM_Core_Config::domainID();

    // If the form doesn't have the setting ticked, we don't need to do anything
    if ($formName == 'CRM_Contribute_Form_Contribution_Main' && !_foreigndonors_checkEnabled($formId, 'contribution_page')) {
      return;
    }
    if ($formName == 'CRM_Event_Form_Registration_Register' && !_foreigndonors_checkEnabled($formId, 'event_fee')) {
      return;
    }
    if ($formName == 'CRM_Event_Form_Registration_Register' && !$form->_values['event']['is_monetary']) {
      return;
    }

    $form->assign('domainId', $domainId);
    $form->assign('foreignPageId', $formId);

    // As a safeguard against people completing NSW contrib forms through the wrong domain
    // We're going to get the financial type of the page/event and if it starts with 'NSW'
    // we know to inject the prohibited donor checkbox, regardless of domain
    $finType = [];
    if ($formName == 'CRM_Contribute_Form_Contribution_Main') {
      $finType = \Civi\Api4\ContributionPage::get(FALSE)
        ->addSelect('financial_type_id:label')
        ->addWhere('id', '=', $formId)
        ->setLimit(1)
        ->execute();
    }
    else {
      $finType = \Civi\Api4\Event::get(FALSE)
        ->addSelect('financial_type_id:label')
        ->addWhere('id', '=', $formId)
        ->setLimit(1)
        ->execute();
    }

    $isNSW = substr($finType[0]['financial_type_id:label'], 0, 3) === 'NSW';
    $isACT = substr($finType[0]['financial_type_id:label'], 0, 3) === 'ACT';

    // Add the checkbox to the public form
    // Have to use different language for Queensland
    // Inject a prohibited donor checkbox for NSW and ACT
    if ($domainId == 7 && !$isNSW && !$isACT) {
      $label = "I am an Australian Citizen or Permanent Resident, and not a QLD prohibited donor";
      $form->add('Checkbox', 'foreigndonor', ts('I am an Australian Citizen or Permanent Resident, and not a QLD prohibited donor'));
      $form->addRule('foreigndonor', ts('You must affirm you are not a prohibited donor as per State and Federal legislation'), 'required', NULL, 'client');
    }
    elseif ($domainId == 8 || $isNSW ) {
      $form->assign('addNSWProhibitedDonor', TRUE);
      $label = "I am an Australian Citizen or Permanent Resident and am not a foreign donor";
      $form->add('Checkbox', 'foreigndonor', ts('I am an Australian Citizen or Permanent Resident and am not a foreign donor'));
      $form->addRule('foreigndonor', ts('You must affirm you are an Australian Citizen or Permanent Resident'), 'required', NULL, 'client');
      $form->add('Checkbox', 'prohibiteddonor', ts('I am not a prohibited donor as per NSW electoral legislation'));
      $form->addRule('prohibiteddonor', ts('You must affirm you are not a prohibited donor as per NSW electoral legislation'), 'required', NULL, 'client');
    }
    elseif ($domainId == 9 || $isACT ) {
      $form->assign('addACTProhibitedDonor', TRUE);
      $label = "I am an Australian Citizen or Permanent Resident and am not a foreign donor";
      $form->add('Checkbox', 'foreigndonor', ts('I am an Australian Citizen or Permanent Resident and am not a foreign donor'));
      $form->addRule('foreigndonor', ts('You must affirm you are an Australian Citizen or Permanent Resident'), 'required', NULL, 'client');
      $form->add('Checkbox', 'prohibiteddonor', ts('I am not a prohibited donor as per ACT electoral legislation'));
      $form->addRule('prohibiteddonor', ts('You must affirm you are not a prohibited donor as per ACT electoral legislation'), 'required', NULL, 'client');
    }
    else {
      $form->assign('addProhibitedDonor', FALSE);
      $label = "I am an Australian Citizen or Permanent Resident";
      $form->add('Checkbox', 'foreigndonor', ts('I am an Australian Citizen or Permanent Resident'));
      $form->addRule('foreigndonor', ts('You must affirm you are an Australian Citizen or Permanent Resident'), 'required', NULL, 'client');
    }
    $templatePath = realpath(dirname(__FILE__) . '/templates');
    if ($formName == 'CRM_Event_Form_Registration_Register') {
      CRM_Core_Resources::singleton()->addScriptFile('au.org.greens.foreigndonors', 'js/event-form.js');
    }
    else {
      CRM_Core_Resources::singleton()->addScriptFIle('au.org.greens.foreigndonors', 'js/contrib-form.js');
    }
    CRM_Core_Resources::singleton()->addVars('foreigndonors', ['label' => $label, 'domainId' => $domainId, 'boostrapjs' => E::url('js/bootstrap.min.js')]);
    CRM_Core_Resources::singleton()->addScriptFile('au.org.greens.foreigndonors', 'js/help_text.js');
    CRM_Core_Region::instance('form-bottom')->add(array(
      'template' => "{$templatePath}/foreigndonors.tpl",
    ));
    return;
  }
}

function foreigndonors_civicrm_postCommit($op, $objectName, $id, &$params) {
  $entity_id = $id;
  $check_enabled = FALSE;
  $contribution_id = 0;

  // Check for Contribution generated through Contribution Page

  if ($objectName == 'Contribution' && $op == 'create') {
    $result = civicrm_api3('Contribution', 'get', array(
      'return' => ['contribution_page_id'],
      'id' => $entity_id,
    ));
    $contrib_page_id = $result['values'][$entity_id]['contribution_page_id'];
    if (!empty($contrib_page_id)) {
      if (_foreigndonors_checkEnabled($contrib_page_id, 'contribution_page')) {
        $check_enabled = TRUE;
        $contribution_id = $entity_id;
      }
    }
  }
  elseif ($objectName == 'ParticipantPayment' && $op == 'create') {

    // Check for a Contribution generated through an event registration payment

    // Workaround for Civi core bug (see #13739)
    $entity_id = $params->id;

    // Get the participant ID linked to the payment
    $result = civicrm_api3('ParticipantPayment', 'get', [
      'return' => ['participant_id'],
      'id' => $entity_id,
    ]);

    // Get the event ID linked to the participant ID
    $participant_id = $result['values'][$entity_id]['participant_id'];
    $result = civicrm_api3('Participant', 'get', [
      'return' => ['event_id'],
      'id' => $participant_id,
    ]);
    $event_id = $result['values'][$participant_id]['event_id'];

    // Now check if event has foreign donor check set
    if (_foreigndonors_checkEnabled($event_id, 'event_fee')) {
      $check_enabled = TRUE;

      // Get the contribution ID linked to the payment
      $result = civicrm_api3('ParticipantPayment', 'get', [
        'return' => ['contribution_id'],
        'id' => $entity_id,
      ]);
      $contribution_id = $result['values'][$entity_id]['contribution_id'];
    }
  }

  if ($check_enabled) {
    foreigndonors_record_submission($contribution_id);
  }
}

/**
 * Record that the end user has ticketed the foreign donor check box and or the prohibited donor checkbox
 * @param int $contribution_id
 */
function foreigndonors_record_submission($contribution_id) {
  // Finally, if need be, update the Contribution record
  // to record foreign donor check
  $customFieldId = _foreigndonors_get_customFieldId();
  $params = [
    'id' => $contribution_id,
    'custom_' . $customFieldId => 1,
  ];
  $domainId = CRM_Core_Config::domainID();
  $finType = \Civi\Api4\Contribution::get(FALSE)
    ->addSelect('financial_type_id:label')
    ->addWhere('id', '=', $contribution_id)
    ->setLimit(1)
    ->execute();
  if ($domainId == 8 || substr($finType[0]['financial_type_id:label'], 0, 3) === 'NSW' ||
      $domainId == 9 || substr($finType[0]['financial_type_id:label'], 0, 3) === 'ACT') {
    $prohibitedCustomFieldId = _foreigndonors_get_prohibited_donor_customFieldId();
    if (!empty($prohibitedCustomFieldId)) {
      $params['custom_' . $prohibitedCustomFieldId] = 'No';
    }
  }
  $result = civicrm_api3('Contribution', 'create', $params);
}

function _foreigndonors_checkEnabled($formId, $type) {
  $result = civicrm_api3('entity_setting', 'get', array(
    'entity_id' => $formId,
    'entity_type' => $type,
    'key' => 'au.org.greens.foreigndonors',
    'name' => 'foreign_donors_check',
  ));
  if (!empty($result['values'][$formId]['foreign_donors_check'])) {
    return 1;
  }
  else {
    return 0;
  }
}

function _foreigndonors_get_customFieldId() {
  $result = civicrm_api3('CustomField', 'get', array(
    'name' => 'Foreign_donor_declaration_recorded',
  ));
  if (!empty($result['id'])) {
    return $result['id'];
  }
  else {
    return 0;
  }
}

function _foreigndonors_get_prohibited_donor_customFieldId() {
  $result = civicrm_api3('CustomField', 'get', [
    'name'  => 'Are_you_a_prohibited_donor_',
  ]);
  if (!empty($result['id'])) {
    return $result['id'];
  }
  else {
    return 0;
  }
}
