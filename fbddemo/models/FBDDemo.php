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

class FBDDemo extends Record {
	const TABLE_NAME = 'fbddemo_settings';
	public $id;
	public $fbddemoname;

	public function getId() {
		return $this->id;
	}
	public function getFBDDemoName(){
		return $this->fbddemoname;
	}
}
