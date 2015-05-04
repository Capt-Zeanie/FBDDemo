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

/*
 * This file will insert basic data to database
 */
$PDO->exec("INSERT INTO ".TABLE_PREFIX."fbddemo_settings (fbddemoname) VALUES ('Fred')");
$PDO->exec("INSERT INTO ".TABLE_PREFIX."fbddemo_settings (fbddemoname) VALUES ('Jenson')");
$PDO->exec("INSERT INTO ".TABLE_PREFIX."fbddemo_settings (fbddemoname) VALUES ('Fernando')");
$PDO->exec("INSERT INTO ".TABLE_PREFIX."fbddemo_settings (fbddemoname) VALUES ('Seb')");
?>