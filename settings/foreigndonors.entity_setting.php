<?php

/**
 * 
 * @package au.org.greens.foreigndonors
 * @copyright The Australian Greens
 *
 * Settings metadata file
 */

return array(
  array(
    'key' => 'au.org.greens.foreigndonors',
    'entity' => 'contribution_page',
    'name' => 'foreign_donors_check',
    'type' => 'CheckBox',
    'html_type' => 'CheckBox',
    'add' => '1.0',
    'title' => 'Foreign Donor check',
    'description' => 'Must contributors affirm they are not foreign donors?',
    'help_text' => 'If any contribution (or part thereof) against this page could be construed as a contribution to the federal party, you must enforce the Foreign Donor check', 
    'add_to_setting_form' => TRUE,
    'form_child_of_parents_parent' => 'is_confirm_enabled',
  ),
  array(
    'key' => 'au.org.greens.foreigndonors',
    'entity' => 'event_fee',
    'name' => 'foreign_donors_check',
    'type' => 'CheckBox',
    'html_type' => 'CheckBox',
    'add' => '1.0',
    'title' => 'Foreign Donor check',
    'description' => 'Must participants affirm they are not foreign donors?',
    'help_text' => 'If any payment (or part thereof) for this event could be construed as a contribution to the federal party, you must enforce the Foreign Donor check',
    'add_to_setting_form' => TRUE,
    'form_child_of_parents_parent' => 'fee_label',
  ),
);
