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

if (!defined('PLUGIN_FBDDEMO_ROOT')) {
	define('PLUGIN_FBDDEMO_ROOT', PLUGINS_ROOT.'/fbddemo/');
}
/*
 * Any code below gets executed each time the plugin is enabled.
 */
 
// Grab the connection from Wolf.
$PDO    = Record::getConnection();
$driver = strtolower($PDO->getAttribute(Record::ATTR_DRIVER_NAME));
$sql_data_filename = PLUGIN_FBDDEMO_ROOT."sql_data.php";
// Setup fbddemo_settings table structure
if ($driver == 'mysql') {
	$sql_fbddemo_settings_table = "SELECT 1 FROM  ".TABLE_PREFIX."fbddemo_settings";
	$sql_fbddemo_settings_exists = False;
	$sql_fbddemo_settings_create = "CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."fbddemo_settings (
		id int(11) NOT NULL,
		fbddemoname varchar(50) NOT NULL DEFAULT '-'
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
	$sql_fbddemo_settings_created = False;
	$sql_fbddemo_settings_query = '';
	$sql_fbddemo_settings_queryed = False;
	$sql_fbddemo_settings_alter = "ALTER TABLE ".TABLE_PREFIX."fbddemo_settings	ADD PRIMARY KEY (id), ADD UNIQUE KEY id (id);";
	$sql_fbddemo_settings_altered = False;
	$sql_fbddemo_settings_modify = "ALTER TABLE ".TABLE_PREFIX."fbddemo_settings MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
	$sql_fbddemo_settings_modified = False;
	// Do an initial check to see if the database files already exist	
		$sql_index = "SELECT 1 FROM  ".TABLE_PREFIX."fbddemo_settings";
	if($PDO->query($sql_index) === False) {
		$sql_fbddemo_settings_exists = False;
	} else {
		$sql_fbddemo_settings_exists = True;
	}
		
	if ($sql_fbddemo_settings_exists === FALSE) {
		
		if($PDO->exec($sql_fbddemo_settings_create) === False) {
			$sql_fbddemo_settings_created = False;
		} else {
			$sql_fbddemo_settings_created = True;
		}
		
		if ($sql_fbddemo_settings_created) {
			if($PDO->exec($sql_fbddemo_settings_alter) === False) {
				$sql_fbddemo_settings_altered = False;
			} else {
				$sql_fbddemo_settings_altered = True;
			}

			if($PDO->exec($sql_fbddemo_settings_modify) === False) {
				$sql_fbddemo_settings_modified = False;
			} else {
				$sql_fbddemo_settings_modified = True;
			}
			if($sql_fbddemo_settings_created AND $sql_fbddemo_settings_altered AND $sql_fbddemo_settings_modified ) {		
				require_once PLUGIN_FBDDEMO_ROOT."sql_data.php";		
			}	
		}
	}

	if ($sql_fbddemo_settings_exists) {
		Flash::set('success', __('Plugin has been re-enabled'));    
	} else {
		if($sql_fbddemo_settings_created AND $sql_fbddemo_settings_altered AND $sql_fbddemo_settings_modified) {
			Flash::set('success', __('Plugin has successfully been installed'));    
		} else {
			Flash::set('error', __('Plugin has failed to be installed'));
		}
	}
} else {
	Flash::set('error', __('MySQL driver has not been installed on the server'));
}
exit();
