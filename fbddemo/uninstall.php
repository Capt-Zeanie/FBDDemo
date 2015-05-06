<?php
/**
 * FBDDemo plugin for Wolf CMS 
 *
 * Simple fbddemo functions for frontend and admin area.
 *
 * @author Sean Arrowsmith
 * @package Wolf
 * @subpackage plugin.fbddemo
 * @version 0.0.1
 */

// WolfCMS Security measure
if (!defined('IN_CMS')) { exit(); }

// Grab the connection from Wolf.
$PDO    = Record::getConnection();
$driver = strtolower($PDO->getAttribute(Record::ATTR_DRIVER_NAME));
// If driver == mysql then proceed with the DROP. I only use MySQL, so if you use another DB then you will have to add these yourself
if ($driver == 'mysql') {
	$sql_fbddemo_settings_delete = "DROP TABLE IF EXISTS ".TABLE_PREFIX."fbddemo_settings";
	$sql_fbddemo_settings_deleted = False;
	// Drop the table. If successful $sql_fbddemo_settings_deleted variable is set to TRUE else FALSE
	if($PDO->exec($sql_fbddemo_settings_delete) === False) {
		$sql_fbddemo_settings_deleted = False;
	} else {
		if (Plugin::deleteAllSettings('fbddemo') === false) {
			$sql_fbddemo_settings_deleted = False;
		} else {
			$sql_fbddemo_settings_deleted = True;
		}
	}
}

if ($sql_fbddemo_settings_deleted) {
	// $sql_fbddemo_settings_deleted variable == TRUE if Table has been DROPPED. Set the FLASH message as successful
	Flash::set('success', __('Plugin has been successfully uninstalled'));
} else {
	// $sql_fbddemo_settings_deleted variable == FALSE if Table has NOT been DROPPED. Set the FLASH message as error
	Flash::set('error', __('Plugin has not been uninstalled Unable to drop table :tablename', array(':tablename' => TABLE_PREFIX.'fbddemo_settings')));
}
exit();